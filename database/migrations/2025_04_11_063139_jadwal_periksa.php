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
        Schema::create('jadwal_antrian', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('jam_buka_pagi');
            $table->time('jam_buka_sore');
            $table->enum('status', ['buka', 'tutup']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_antrian');
    }
};
