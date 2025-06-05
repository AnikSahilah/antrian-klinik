<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Periksa_Models as JadwalAntrian;
use App\Models\Antrian_Pasien_Models as AntrianPasien;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $jadwals = JadwalAntrian::all();

        $lastAntrian = DB::table('antrian_pasien')
            ->orderBy('id', 'desc')
            ->first();

        $nextNomor = $lastAntrian ? intval($lastAntrian->nomor_antrian) + 1 : 1;
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

        $hariIni = strtolower(Carbon::now()->locale('id')->isoFormat('dddd'));

        $selectedSesi = $request->get('sesi');

        if (!$selectedSesi) {
            $jamSekarang = Carbon::now()->format('H:i');

            $selectedSesi = ($jamSekarang >= '16:00') ? 'sore' : 'pagi';
        }

        $antrians = AntrianPasien::where('hari_periksa', $hariIni)
            ->where('waktu_periksa', $selectedSesi)
            ->orderByRaw('CAST(nomor_antrian AS UNSIGNED)')
            ->get();

        return view('template1', compact('jadwals', 'nextNomorFormatted', 'antrians', 'selectedSesi'));
    }

    // Tambahkan ini di dalam LandingPageController
    public function createAntrian()
    {
        $jadwals = JadwalAntrian::all();

        $lastAntrian = DB::table('antrian_pasien')
            ->orderBy('id', 'desc')
            ->first();

        $nextNomor = $lastAntrian ? intval($lastAntrian->nomor_antrian) + 1 : 1;
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

        return view('template1', compact('jadwals', 'nextNomorFormatted'));
    }

    public function storeAntrian(Request $request)
    {
        $data = $request->all();
        $data['hari_periksa'] = Carbon::now()->locale('id')->isoFormat('dddd'); // otomatis isi hari sekarang

        AntrianPasien::create($data);

        return redirect()->route('landing.storeAntrian')->with('success', 'Pendaftaran antrian berhasil!');
    }
    // public function listAntrian()
    // {
    //     $jadwals = JadwalAntrian::all();

    //     $lastAntrian = DB::table('antrian_pasien')
    //         ->orderBy('id', 'desc')
    //         ->first();

    //     $nextNomor = $lastAntrian ? intval($lastAntrian->nomor_antrian) + 1 : 1;
    //     $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);

    //     $antrians = AntrianPasien::orderBy('created_at', 'desc')->get();

    //     return view('template1', compact('jadwals', 'nextNomorFormatted', 'antrians'));
    // }
}
