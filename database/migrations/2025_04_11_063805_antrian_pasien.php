<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('antrian_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_antrian');
            $table->string('nama');
            $table->text('keluhan');
            $table->string('hari_periksa');
            $table->enum('waktu_periksa', ['pagi', 'sore']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian_pasien');
    }
};
