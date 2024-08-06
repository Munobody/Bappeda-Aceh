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
        Schema::create('ruang_rapats', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('nama'); // Kolom Nama
            $table->string('lokasi'); // Kolom Lokasi
            $table->string('fasilitas'); // Kolom Fasilitas
            $table->integer('kapasitas'); // Kolom Kapasitas
            $table->string('operator'); // Kolom Operator
            $table->string('cs'); // Kolom CS
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_rapats');
    }
};
