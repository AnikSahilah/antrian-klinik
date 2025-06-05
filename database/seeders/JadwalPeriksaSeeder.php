<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('jadwal_antrian')->insert([
            [
                'hari' => 'Senin',
                'jam_buka_pagi' => '08:00:00',
                'jam_buka_sore' => '16:00:00',
                'status' => 'buka',
            ],
            [
                'hari' => 'Selasa',
                'jam_buka_pagi' => '08:00:00',
                'jam_buka_sore' => '16:00:00',
                'status' => 'buka',
            ],
            [
                'hari' => 'Rabu',
                'jam_buka_pagi' => '08:00:00',
                'jam_buka_sore' => '16:00:00',
                'status' => 'buka',
            ],
            [
                'hari' => 'Kamis',
                'jam_buka_pagi' => '08:00:00',
                'jam_buka_sore' => '16:00:00',
                'status' => 'buka',
            ],
            [
                'hari' => 'Jumat',
                'jam_buka_pagi' => '08:00:00',
                'jam_buka_sore' => '16:00:00',
                'status' => 'buka',
            ],
            [
                'hari' => 'Sabtu',
                'jam_buka_pagi' => '08:00:00',
                'jam_buka_sore' => '12:00:00',
                'status' => 'buka',
            ],
            [
                'hari' => 'Minggu',
                'jam_buka_pagi' => '09:00:00',
                'jam_buka_sore' => '12:00:00',
                'status' => 'tutup',
            ]
        ]);
    }
}
