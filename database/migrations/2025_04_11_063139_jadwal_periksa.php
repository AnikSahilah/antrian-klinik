<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_antrian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Ganti hari menjadi tanggal

            // Sesi pagi
            $table->time('jam_buka_pagi')->nullable();
            $table->time('jam_tutup_pagi')->nullable();
            $table->enum('status_pagi', ['buka', 'tutup'])->default('tutup');

            // Sesi sore
            $table->time('jam_buka_sore')->nullable();
            $table->time('jam_tutup_sore')->nullable();
            $table->enum('status_sore', ['buka', 'tutup'])->default('tutup');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_antrian');
    }
};
