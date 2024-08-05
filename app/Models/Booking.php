<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan nama model secara default
    protected $table = 'bookings';

    // Jika Anda tidak ingin Eloquent mengelola kolom timestamps
    // protected $timestamps = false;

    // Definisikan atribut yang dapat diisi secara massal (fillable)
    protected $fillable = [
        'penanggung_jawab',
        'ruang_rapat_id',
        'nama_bidang',
        'agenda',
        'jadwal_mulai',
        'jadwal_akhir',
        'surat',
        'status',
    ];


    // Definisikan atribut yang harus di-cast ke tipe data tertentu
    protected $casts = [
        'jadwal_mulai' => 'datetime',
        'jadwal_akhir' => 'datetime',
    ];

    // Definisikan hubungan ke model RuangRapat (jika diperlukan)
    public function RuangRapat()
    {
        return $this->belongsTo(RuangRapat::class, 'ruang_rapat_id');
    }
}
