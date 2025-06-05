<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Periksa_Models as JadwalAntrian;

class Jadwal_Periksa_Controller extends Controller
{
    public function index()
    {
        $jadwals = JadwalAntrian::all();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        JadwalAntrian::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $jadwal = JadwalAntrian::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalAntrian::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JadwalAntrian::destroy($id);
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil dihapus');
    }
}
