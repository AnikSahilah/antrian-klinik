<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Jadwal_Periksa_Models  as Jadwal;      // tabel jadwal_antrian
use App\Models\Antrian_Pasien_Models  as Antrian;     // tabel antrian_pasien

class LandingPageController extends Controller
{
    /* -----------------------------------------------
       1)  HALAMAN UTAMA (jadwal + daftar antrian)
    ------------------------------------------------ */
    public function index(Request $request)
    {
        $today      = Carbon::today();
        $tanggal    = $request->get('tanggal', $today->toDateString());

        /* sesi otomatis -> jam ≥ 13:00 = sore, selain itu pagi */
        $sesi = $request->get('sesi');
        if (!$sesi) {
            $sesi = Carbon::now()->hour >= 13 ? 'sore' : 'pagi';
        }

        /* jadwal hari‑ini (atau tanggal yg dipilih) */
        $jadwal = Jadwal::whereDate('tanggal', $tanggal)->first();
        $jadwals = Jadwal::whereDate('tanggal', $tanggal)->get(); // hanya jadwal hari ini

        /* default: tutup */
        $isBuka = false;
        $antrians = collect();

        if ($jadwal) {
            $statusSesi = $sesi === 'pagi' ? $jadwal->status_pagi : $jadwal->status_sore;
            $jamBuka    = $sesi === 'pagi' ? $jadwal->jam_buka_pagi : $jadwal->jam_buka_sore;
            $jamTutup   = $sesi === 'pagi' ? $jadwal->jam_tutup_pagi : $jadwal->jam_tutup_sore;

            /* buka jika status = 'buka' & waktu sekarang berada di range jam buka */
            if (
                $statusSesi === 'buka' &&
                $jamBuka && $jamTutup &&
                Carbon::now()->between(Carbon::parse($jamBuka), Carbon::parse($jamTutup))
            ) {
                $isBuka = true;

                /* ambil semua antrian sesi ini – urut: diperiksa ▸ menunggu ▸ selesai + nomor */
                $antrians = Antrian::where('jadwal_id', $jadwal->id)
                    ->where('sesi', $sesi)
                    ->orderByRaw("FIELD(status,'diperiksa','menunggu','selesai')")
                    ->orderByRaw('CAST(nomor_antrian AS UNSIGNED)')
                    ->get([
                        'nomor_antrian',   // hanya kolom yg dibutuhkan di frontend pasien
                        'nama',
                        'status',
                        'sesi',
                        'jadwal_id'
                    ]);
            }
        }

        /* cari nomor antrian selanjutnya (khusus sesi & tanggal aktif) */
        $last = Antrian::where('jadwal_id', $jadwal?->id)
            ->where('sesi', $sesi)
            ->orderByRaw('CAST(nomor_antrian AS UNSIGNED) DESC')
            ->first();

        $nextNomor = $last ? intval($last->nomor_antrian) + 1 : 1;
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

        return view('template1', compact(
            'jadwals',
            'jadwal',
            'isBuka',
            'antrians',
            'sesi',
            'tanggal',
            'nextNomorFormatted'
        ));
    }

    /* -----------------------------------------------
       2)  FORM PENDAFTARAN PASIEN
       (hanya nama & keluhan – nomor antrian otomatis)
    ------------------------------------------------ */
    public function createAntrian(Request $request)
    {
        /* supaya form tahu sesi yg dipakai */
        $jam = Carbon::now()->hour;
        $sesi = $request->get('sesi', $jam >= 13 ? 'sore' : 'pagi');

        return $this->index($request->merge([
            'sesi' => $sesi,          // pakai fungsi index utk data jadwal & nomor
            'tanggal' => Carbon::today()->toDateString()
        ]));
    }

    /* -----------------------------------------------
       3)  SIMPAN PENDAFTARAN DARI PASIEN
    ------------------------------------------------ */
    public function storeAntrian(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'keluhan'  => 'required|string',
            'sesi'     => 'required|in:pagi,sore',
        ]);

        $today   = Carbon::today()->toDateString();
        $sesi    = $request->sesi;

        /* cari jadwal hari ini */
        $jadwal = Jadwal::whereDate('tanggal', $today)->first();

        /* gagal jika jadwal tak ada / sesi tutup / di luar jam buka */
        if (!$jadwal) {
            return back()->with('error', 'Belum ada jadwal hari ini.');
        }

        $statusSesi = $sesi === 'pagi' ? $jadwal->status_pagi : $jadwal->status_sore;
        $jamBuka    = $sesi === 'pagi' ? $jadwal->jam_buka_pagi : $jadwal->jam_buka_sore;
        $jamTutup   = $sesi === 'pagi' ? $jadwal->jam_tutup_pagi : $jadwal->jam_tutup_sore;
        $now        = Carbon::now();

        if (
            $statusSesi !== 'buka' ||
            !$jamBuka || !$jamTutup ||
            !$now->between(Carbon::parse($jamBuka), Carbon::parse($jamTutup))
        ) {
            return back()->with('error', 'Pendaftaran sesi ini sedang tutup.');
        }

        /* hitung nomor antrian berikutnya */
        $last = Antrian::where('jadwal_id', $jadwal->id)
            ->where('sesi', $sesi)
            ->orderByRaw('CAST(nomor_antrian AS UNSIGNED) DESC')
            ->first();

        $nextNomor = $last ? intval($last->nomor_antrian) + 1 : 1;
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

        /* simpan */
        Antrian::create([
            'jadwal_id'       => $jadwal->id,
            'sesi'            => $sesi,
            'nomor_antrian'   => $nextNomorFormatted, // <--- pakai yang sudah diformat
            'nama'            => $request->nama,
            'keluhan'         => $request->keluhan,
            'status'          => 'menunggu',
        ]);

        return redirect()->route('landing.index')
            ->with('success', 'Pendaftaran berhasil! Nomor antrian Anda: ' . $nextNomorFormatted);
    }
}
