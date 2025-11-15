<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antrian_pasien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id'); // Relasi ke jadwal_antrian
            $table->enum('sesi', ['pagi', 'sore']);  // 🆕 Tambahkan kolom sesi
            $table->string('nomor_antrian');
            $table->string('nama');
            $table->text('keluhan');
            $table->enum('status', ['menunggu', 'diperiksa', 'selesai'])->default('menunggu');
            $table->text('hasil_pemeriksaan')->nullable();
            $table->text('resep_obat')->nullable();
            $table->timestamps();

            $table->foreign('jadwal_id')->references('id')->on('jadwal_antrian')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antrian_pasien');
    }
};
