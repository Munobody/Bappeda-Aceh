<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ViewRequestPageController extends Controller
{
    public function showviewrequestpage(Request $request)
{
    // Ambil parameter filter dari request
    $status = $request->input('status');
    $namaBidang = $request->input('nama_bidang');
    $tanggal = $request->input('tanggal');

    // Buat query untuk mengambil data peminjaman
    $query = Booking::query();

    if ($status) {
        $query->where('status', $status);
    }

    if ($namaBidang) {
        $query->where('nama_bidang', 'like', '%' . $namaBidang . '%');
    }

    if ($tanggal) {
        $query->whereDate('jadwal_mulai', $tanggal);
    }

    $data = $query->get();

    // Pemformatan tanggal dan waktu
    foreach ($data as $booking) {
        $jadwalMulai = Carbon::parse($booking->jadwal_mulai)->locale("id");
        $jadwalAkhir = Carbon::parse($booking->jadwal_akhir)->locale("id");

        // Format waktu
        $jamMulai = $jadwalMulai->format('H:i');
        $jamAkhir = $jadwalAkhir->format('H:i');
        
        // Format tanggal
        if ($jadwalMulai->isSameDay($jadwalAkhir)) {
            // Jika tanggal mulai dan akhir sama
            $formattedDate = $jadwalMulai->translatedFormat('l, d F Y');
            $formattedTime = $jamMulai . ' - ' . $jamAkhir;
        } else {
            // Jika tanggal mulai dan akhir berbeda
            $selisih = $jadwalMulai->diffInDays($jadwalAkhir);
            $selisih = intval($selisih);
            $formattedDate = $jadwalMulai->translatedFormat('l, d F Y') . ' - ' . $jadwalAkhir->translatedFormat('l, d F Y');
            $formattedTime = $jamMulai . ' - ' . $jamAkhir . ' WIB (' . $selisih . ' hari)';
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

public function filter(Request $request)
{
    $query = Booking::query();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('nama_bidang')) {
        $query->where('nama_bidang', 'like', '%' . $request->nama_bidang . '%');
    }

    if ($request->filled('tanggal')) {
        $query->whereDate('date', $request->tanggal);
    }

    $booking = $query->orderBy('updated_at', 'desc')->get();

    return view('viewrequest', compact('booking'));
}

}
