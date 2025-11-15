<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian_Pasien_Models as AntrianPasien;
use App\Models\Jadwal_Periksa_Models;
use Carbon\Carbon;

class Antrian_Pasien_Controller extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', Carbon::today()->toDateString());
        $jamSekarang = Carbon::now()->format('H:i');

        $sesi = $request->get('sesi');
        if (!$sesi) {
            $sesi = ($jamSekarang >= '13:00') ? 'sore' : 'pagi';
        }

        $jadwal = Jadwal_Periksa_Models::whereDate('tanggal', $tanggal)->first();

        if (!$jadwal || ($sesi === 'pagi' && $jadwal->status_pagi !== 'buka') || ($sesi === 'sore' && $jadwal->status_sore !== 'buka')) {
            $antrians = collect(); // Kosongkan jika sesi tutup
        } else {
            $antrians = AntrianPasien::where('jadwal_id', $jadwal->id)
                ->where('sesi', $sesi)
                // ->orderByRaw('CAST(nomor_antrian AS UNSIGNED)')
                ->orderByRaw("FIELD(status, 'diperiksa', 'menunggu', 'selesai')") // urutkan berdasarkan status
                ->orderByRaw("CAST(nomor_antrian AS UNSIGNED)") // lalu berdasarkan nomor antrian
                ->get();
        }

        return view('admin.antrian.index', compact('antrians', 'sesi', 'tanggal'));
    }

    public function create(Request $request)
    {
        $tanggal = Carbon::today()->toDateString();
        $sesi = $request->get('sesi', Carbon::now()->hour >= 13 ? 'sore' : 'pagi');
        $now = Carbon::now();

        $jadwal = Jadwal_Periksa_Models::where('tanggal', $tanggal)->first();

        if (!$jadwal) {
            return redirect()->back()->with('error', 'Jadwal belum tersedia untuk hari ini');
        }

        // Ambil jam buka dan tutup sesuai sesi
        $jamBuka = $sesi === 'pagi' ? $jadwal->jam_buka_pagi : $jadwal->jam_buka_sore;
        $jamTutup = $sesi === 'pagi' ? $jadwal->jam_tutup_pagi : $jadwal->jam_tutup_sore;
        $statusSesi = $sesi === 'pagi' ? $jadwal->status_pagi : $jadwal->status_sore;

        // Cek status sesi dan jam
        if (
            $statusSesi !== 'buka' ||
            !$jamBuka || !$jamTutup ||
            $now->lt(Carbon::parse($jamBuka)) ||
            $now->gt(Carbon::parse($jamTutup))
        ) {
            return redirect()->back()->with('error', "Sesi $sesi sedang tutup atau di luar jam layanan.");
        }

        $lastAntrian = AntrianPasien::where('jadwal_id', $jadwal->id)
            ->where('sesi', $sesi)
            ->orderByRaw('CAST(nomor_antrian AS UNSIGNED) DESC')
            ->first();

        $nextNomor = $lastAntrian ? intval($lastAntrian->nomor_antrian) + 1 : 1;
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

        return view('admin.antrian.create', compact('nextNomorFormatted', 'sesi', 'jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal_antrian,id',
            'sesi' => 'required|in:pagi,sore',
            'nama' => 'required|string|max:255',
            'keluhan' => 'required|string',
        ]);

        // Hitung nomor antrian otomatis berdasarkan jadwal dan sesi
        $lastAntrian = AntrianPasien::where('jadwal_id', $request->jadwal_id)
            ->where('sesi', $request->sesi)
            ->orderByRaw('CAST(nomor_antrian AS UNSIGNED) DESC')
            ->first();

        $nextNomor = $lastAntrian ? intval($lastAntrian->nomor_antrian) + 1 : 1;
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

        // Simpan data
        AntrianPasien::create([
            'jadwal_id' => $request->jadwal_id,
            'sesi' => $request->sesi,
            'nomor_antrian' => $nextNomorFormatted,
            'nama' => $request->nama,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu',
            'hasil_pemeriksaan' => null,
            'resep_obat' => null,
        ]);

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $antrian = AntrianPasien::findOrFail($id);
        return view('admin.antrian.edit', compact('antrian'));
    }

    public function update(Request $request, $id)
    {
        $antrian = AntrianPasien::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'status' => 'required|in:menunggu,diperiksa,selesai',
            'hasil_pemeriksaan' => 'nullable|string',
            'resep_obat' => 'nullable|string',
        ]);

        $antrian->update($request->all());

        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil diperbarui');
    }

    public function destroy($id)
    {
        AntrianPasien::destroy($id);
        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dihapus');
    }
}
