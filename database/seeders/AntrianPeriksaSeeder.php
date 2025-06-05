<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AntrianPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $waktus = ['pagi', 'sore'];

        $namaIndonesia = [
            'Ahmad Fadli',
            'Putri Ayu',
            'Rizky Ramadhan',
            'Siti Aminah',
            'Budi Santoso',
            'Dewi Lestari',
            'Andi Pratama',
            'Fitriani Nurhaliza',
            'Agus Salim',
            'Lina Marlina',
            'Yusuf Maulana',
            'Rina Kartika',
            'Fajar Nugroho',
            'Maya Sari',
            'Doni Saputra',
            'Tiara Wulandari',
            'Fikri Hidayat',
            'Nina Zahra',
            'Hendra Kurniawan',
            'Citra Dewi'
        ];

        $keluhan = [
            'Demam dan sakit kepala',
            'Batuk dan pilek',
            'Mual dan muntah',
            'Sakit perut',
            'Pusing dan lemas',
            'Sesak napas',
            'Nyeri sendi',
            'Kehilangan nafsu makan',
            'Radang tenggorokan',
            'Diare'
        ];

        $data = [];

        foreach ($hari as $h) {
            foreach ($waktus as $waktu) {
                // Reset counter tiap hari & waktu
                $counter = 1;
                for ($i = 0; $i < 5; $i++) {
                    $data[] = [
                        'nomor_antrian' => str_pad($counter, 3, '0', STR_PAD_LEFT),
                        'nama' => $namaIndonesia[array_rand($namaIndonesia)],
                        'keluhan' => $keluhan[array_rand($keluhan)],
                        'hari_periksa' => $h,
                        'waktu_periksa' => $waktu,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $counter++;
                }
            }
        }

        DB::table('antrian_pasien')->insert($data);
    }
}
