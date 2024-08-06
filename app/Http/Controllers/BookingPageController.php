<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BookingPageController extends Controller
{
    
    public function showbookingform()
    {
        $data = Booking::where('status', 'Menunggu', 'Disetujui')->get();
        $disabledDates = [];

        foreach ($data as $booking) {
            $jadwalMulai = Carbon::parse($booking->jadwal_mulai)->locale("id");
            $jadwalAkhir = Carbon::parse($booking->jadwal_akhir)->locale("id");
             // Format waktu
             $jamMulai = $jadwalMulai->format('H:i');
             $jamAkhir = $jadwalAkhir->format('H:i');
                                  
            // Format tanggal
            if ($jadwalMulai->isSameDay($jadwalAkhir)) {
                // Jika tanggal mulai dan akhir sama
                $formattedDate = $jadwalMulai->translatedFormat('l/ d F Y');
                $formattedTime = $jamMulai . ' - ' . $jamAkhir;
            } else {
                // Jika tanggal mulai dan akhir berbeda
                $selisih = $jadwalMulai->diffInDays($jadwalAkhir);
                $formattedDate = $jadwalMulai->translatedFormat('l') . ' - ' . $jadwalAkhir->translatedFormat('l/') . $jadwalMulai->translatedFormat('d') . ' - ' .$jadwalAkhir->translatedFormat('d F Y');
                $formattedTime = $jamMulai . ' - ' . $jamAkhir . ' WIB'.' (' . $selisih .' hari)';
            }

            
    
    
    
            // Menambahkan variabel ke data
            $booking->jadwal_mulai_formatted = $formattedDate;
            $booking->jam = $formattedTime;
        }

        foreach ($data as $booking) {
            $jadwalMulai = Carbon::parse($booking->jadwal_mulai);
            $jadwalAkhir = Carbon::parse($booking->jadwal_akhir);
    
            // Ambil semua tanggal antara jadwalMulai dan jadwalAkhir
            $period = Carbon::parse($jadwalMulai)->daysUntil($jadwalAkhir);
            foreach ($period as $date) {
                $disabledDates[] = $date->toDateString();
            }
        }
        
        // Menghapus duplikasi
        $disabledDates = array_unique($disabledDates);
        return view('booking', ["booking" => $data, "disabledDates" => $disabledDates]);
        
    }
}
