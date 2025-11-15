<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Periksa_Models as JadwalPeriksa;

class Jadwal_Periksa_Controller extends Controller
{
    public function index()
    {
        $jadwals = JadwalPeriksa::orderBy('tanggal')->paginate(7);
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:jadwal_antrian,tanggal',
            'jam_buka_pagi' => 'required|date_format:H:i',
            'jam_tutup_pagi' => 'required|date_format:H:i|after:jam_buka_pagi',
            'status_pagi' => 'required|in:buka,tutup',
            'jam_buka_sore' => 'required|date_format:H:i',
            'jam_tutup_sore' => 'required|date_format:H:i|after:jam_buka_sore',
            'status_sore' => 'required|in:buka,tutup',
        ]);

        JadwalPeriksa::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date|unique:jadwal_antrian,tanggal,' . $id,
            'jam_buka_pagi' => 'required|date_format:H:i',
            'jam_tutup_pagi' => 'required|date_format:H:i|after:jam_buka_pagi',
            'status_pagi' => 'required|in:buka,tutup',
            'jam_buka_sore' => 'required|date_format:H:i',
            'jam_tutup_sore' => 'required|date_format:H:i|after:jam_buka_sore',
            'status_sore' => 'required|in:buka,tutup',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JadwalPeriksa::destroy($id);
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil dihapus');
    }
}
