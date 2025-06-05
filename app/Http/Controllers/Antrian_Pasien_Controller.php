<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian_Pasien_Models as AntrianPasien;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Antrian_Pasien_Controller extends Controller
{
    public function index(Request $request)
    {
        // Hari ini dalam format nama hari (Senin, Selasa, dll)
        $hariIni = Carbon::now()->locale('id')->dayName;

        // Ambil waktu dari query string (misalnya ?waktu=pagi), default = pagi
        $waktu = $request->get('waktu', 'pagi');

        // Ambil data antrian yang sesuai
        $antrians = AntrianPasien::where('hari_periksa', strtolower($hariIni))
            ->where('waktu_periksa', $waktu)
            ->get();

        return view('admin.antrian.index', compact('antrians', 'waktu'));
    }

    public function create()
    {
        // Contoh ambil nomor antrian terakhir (bisa kamu sesuaikan query-nya)
        $lastAntrian = DB::table('antrian_pasien')
            ->orderBy('id', 'desc')
            ->first();

        // Jika ada data, nomor antrian selanjutnya +1, kalau tidak mulai dari 1
        $nextNomor = $lastAntrian ? intval($lastAntrian->nomor_antrian) + 1 : 1;

        // Format nomor antrian dengan leading zeros (misal 001)
        $nextNomorFormatted = str_pad($nextNomor, 3, '0', STR_PAD_LEFT);
        return view('admin.antrian.create', compact('nextNomorFormatted'));
    }

    public function store(Request $request)
    {
        AntrianPasien::create($request->all());
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
        $antrian->update($request->all());
        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil diperbarui');
    }

    public function destroy($id)
    {
        AntrianPasien::destroy($id);
        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dihapus');
    }
}
