<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal_Periksa_Models extends Model
{
    use HasFactory;

    protected $table = 'jadwal_antrian';

    protected $fillable = [
        'tanggal',
        'jam_buka_pagi',
        'jam_tutup_pagi',
        'status_pagi',
        'jam_buka_sore',
        'jam_tutup_sore',
        'status_sore',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jam_buka_pagi' => 'datetime',
        'jam_tutup_pagi' => 'datetime',
        'status_pagi' => 'string',
        'status_sore' => 'string',
        'jam_buka_sore' => 'datetime',
        'jam_tutup_sore' => 'datetime',
    ];

    public function antrian()
    {
        return $this->hasMany(Antrian_Pasien_Models::class, 'jadwal_id');
    }
}
