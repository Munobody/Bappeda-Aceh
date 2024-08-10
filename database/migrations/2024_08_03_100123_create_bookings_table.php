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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('penanggung_jawab'); // Kolom Penanggung Jawab
            $table->unsignedBigInteger('ruang_rapat_id');
            $table->string('nama_bidang'); // Kolom Nama Bidang
            $table->string('agenda'); // Kolom Agenda
            $table->string('deskripsi')->nullable; // Kolom deskripsi
            $table->dateTime('jadwal_mulai'); // Kolom Jadwal Mulai
            $table->dateTime('jadwal_akhir'); // Kolom Jadwal Akhir
            $table->string('surat'); // Kolom Surat
            $table->string('status'); // Kolom Status
            $table->timestamps(); // Kolom created_at dan updated_at

            $table->foreign('ruang_rapat_id')->references('id')->on('ruang_rapats')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
