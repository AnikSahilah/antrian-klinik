<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antrian_Pasien_Models extends Model
{
    use HasFactory;

    protected $table = 'antrian_pasien';

    protected $fillable = [
        'nomor_antrian',
        'nama',
        'keluhan',
        'hari_periksa',
        'waktu_periksa',
    ];
}
