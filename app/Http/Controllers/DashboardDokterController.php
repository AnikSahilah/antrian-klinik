<?php

namespace App\Http\Controllers;

use App\Models\Antrian_Pasien_Models as AntrianPasien;
use App\Models\Jadwal_Periksa_Models as JadwalAntrian;

use Illuminate\Http\Request;

class DashboardDokterController extends Controller
{
    public function index()
    {
        $totalAntrian = AntrianPasien::count();
        $jadwal = JadwalAntrian::all()->sortBy('id'); // sort by order in a week

        return view('superadmin.dashboard', compact('totalAntrian', 'jadwal'));
    }
}
