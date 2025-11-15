<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalPeriksaSeeder extends Seeder
{
    public function run()
    {
        $start = Carbon::create(2025, 7, 1);
        $end = Carbon::create(2025, 8, 31);
        $data = [];

        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $isWeekend = $date->isWeekend();

            $data[] = [
                'tanggal' => $date->toDateString(),
                'jam_buka_pagi' => $isWeekend ? null : '08:00:00',
                'jam_tutup_pagi' => $isWeekend ? null : '10:00:00',
                'status_pagi' => $isWeekend ? 'tutup' : 'buka',

                'jam_buka_sore' => $isWeekend ? null : '14:00:00',
                'jam_tutup_sore' => $isWeekend ? null : '17:00:00',
                'status_sore' => $isWeekend ? 'tutup' : 'buka',

                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('jadwal_antrian')->insert($data);
    }
}
