<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class HomePageController extends Controller
{
    public function showhomepage()
{
    // Ambil semua data booking
    $data = Booking::where('status', 'Disetujui')->get();
    
    // Format tanggal jadwal_mulai untuk setiap booking
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
            $selisih = intval($selisih);
            $formattedDate = $jadwalMulai->translatedFormat('l') . ' - ' . $jadwalAkhir->translatedFormat('l/') . $jadwalMulai->translatedFormat('d') . ' - ' .$jadwalAkhir->translatedFormat('d F Y');
            $formattedTime = $jamMulai . ' - ' . $jamAkhir . ' WIB'.' (' . $selisih .' hari)';
        }



        // Menambahkan variabel ke data
        $booking->jadwal_mulai_formatted = $formattedDate;
        $booking->jam = $formattedTime;
    }
    
    // Kirim data ke view
    return view('home', ["booking" => $data]);
}
}
