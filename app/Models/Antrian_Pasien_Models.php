<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Jadwal_Periksa_Models;

class Antrian_Pasien_Models extends Model
{
    use HasFactory;

    protected $table = 'antrian_pasien';

    protected $fillable = [
        'jadwal_id',
        'sesi', // 🆕 tambahkan sesi
        'nomor_antrian',
        'nama',
        'keluhan',
        'status',
        'hasil_pemeriksaan',
        'resep_obat',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal_Periksa_Models::class, 'jadwal_id');
    }
}
