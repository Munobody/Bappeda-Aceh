<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Carbon\Carbon;
use App\Models\RuangRapat;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                $selisih = intval($selisih);
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

    public function showrequestpage (){
        $data= RuangRapat::all();
        return view('request', ["ruang_rapat" => $data]);
    }

    public function handlerequestroom ( Request $request ){
        // mengambil data inputan
        $penanggung_jawab=$request->input("penanggung_jawab");
        $ruang_rapat_id=$request->input("ruang_rapat_id");
        $nama_bidang=$request->input("nama_bidang");
        $agenda=$request->input("agenda");
        $deskripsi=$request->input("deskripsi");
        $tanggal_mulai=$request->input("tanggal_mulai");
        $tanggal_akhir=$request->input("tanggal_akhir");
        $file=$request->file("file");
        $status="Menunggu";
        $filename=time() .'.'.$file->getClientOriginalExtension();
        
        // menguploads file
        $path = $file->storeAs('public/uploads', $filename);
        $relativePath = str_replace('public/', '', $path);
        
        // simpan ke database
        $booking = new Booking;
        $booking->penanggung_jawab = $penanggung_jawab;
        $booking->ruang_rapat_id = $ruang_rapat_id;
        $booking->nama_bidang = $nama_bidang;
        $booking->agenda = $agenda;
        $booking->deskripsi = $deskripsi;
        $booking->jadwal_mulai = $tanggal_mulai;
        $booking->jadwal_akhir = $tanggal_akhir;
        $booking->status = $status;
        $booking->surat = $relativePath;
        $booking->save();

        return back()->with('success', 'File uploaded successfully!');
    }
    public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer|exists:bookings,id',
        'status' => 'required|string|in:Disetujui,Ditolak'
    ]);

    $booking = Booking::find($request->id);
    $booking->status = $request->status;
    $booking->save();
        return response()->json(['success' => true]);
    }
}


 

