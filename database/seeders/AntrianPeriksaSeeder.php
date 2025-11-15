<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Jadwal_Periksa_Models;

class AntrianPeriksaSeeder extends Seeder
{
    public function run()
    {
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

        $hasilPemeriksaanList = [
            'Infeksi saluran pernapasan ringan',
            'Gejala tifus awal',
            'Dehidrasi ringan',
            'Gangguan pencernaan',
            'Observasi demam dengue'
        ];

        $resepObatList = [
            'Paracetamol, Vitamin C',
            'Antasida, Oralit',
            'Amoxicillin, Ibuprofen',
            'Loperamide, Zinc',
            'Salbutamol, Ambroxol'
        ];

        $today = Carbon::now()->startOfDay();
        $data = [];

        $jadwals = Jadwal_Periksa_Models::all();

        foreach ($jadwals as $jadwal) {
            $tanggal = Carbon::parse($jadwal->tanggal);
            $status = $tanggal->lt($today) ? 'selesai' : 'menunggu';

            foreach ($waktus as $waktu) {
                $statusSesi = $waktu === 'pagi' ? $jadwal->status_pagi : $jadwal->status_sore;
                if ($statusSesi !== 'buka') {
                    continue;
                }

                for ($i = 1; $i <= 5; $i++) {
                    $data[] = [
                        'jadwal_id'         => $jadwal->id,
                        'sesi'              => $waktu,
                        'nomor_antrian'     => str_pad($i, 3, '0', STR_PAD_LEFT),
                        'nama'              => $namaIndonesia[array_rand($namaIndonesia)],
                        'keluhan'           => $keluhan[array_rand($keluhan)],
                        'status'            => $status,
                        'hasil_pemeriksaan' => $status === 'selesai' ? $hasilPemeriksaanList[array_rand($hasilPemeriksaanList)] : null,
                        'resep_obat'        => $status === 'selesai' ? $resepObatList[array_rand($resepObatList)] : null,
                        'created_at'        => now(),
                        'updated_at'        => now(),
                    ];
                }
            }
        }

        DB::table('antrian_pasien')->insert($data);
    }
}
