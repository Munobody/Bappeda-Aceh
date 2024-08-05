<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangRapat extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan nama model secara default
    protected $table = 'ruang_rapats';

    // Definisikan atribut yang dapat diisi secara massal (fillable)
    protected $fillable = [
        'nama',
        'lokasi',
        'fasilitas',
        'kapasitas',
        'operator',
        'cs',
    ];

    // Jika Anda ingin mengatur hubungan dari model ini ke model Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'ruang_rapat_id');
    }
}
