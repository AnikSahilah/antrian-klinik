<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal_Periksa_Models extends Model
{
    use HasFactory;

    protected $table = 'jadwal_antrian';

    protected $fillable = [
        'hari',
        'jam_buka_pagi',
        'jam_buka_sore',
        'status',
    ];
}
