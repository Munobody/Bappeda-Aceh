<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ViewRequestPageController extends Controller
{
    public function showviewrequestpage()
    {

        $data = Booking::all();

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


        return view('viewrequest', ["booking" => $data]);
    }

    public function downloadfile(Request $request)
{
    $filename = $request->get('file');

    // Menggunakan path relatif untuk public storage
    $path = 'public/' . $filename;

    // Cek apakah file ada
    if (Storage::exists($path)) {
        return Storage::download($path);
    }

    // Jika file tidak ditemukan, return response error
    return abort(404, 'File not found');
}
}
