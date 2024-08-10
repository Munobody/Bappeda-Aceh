<?php

namespace App\Http\Controllers;
use App\Models\RuangRapat;

use Illuminate\Http\Request;

class MeetingRoomPageController extends Controller
{
    public function showmeetingroompage()
    {   
        $data= RuangRapat::all();
        return view('MeetingRoom', ["ruang_rapat" => $data]);
    }

    public function showroompage()
    {
        return view('Room');
    }

    public function storeroom(Request $request)
    {
        // mengambil data inputan
        $room_name=$request->input("room_name");
        $location=$request->input("location");
        $facilities=$request->input("facilities");
        $capacity=$request->input("capacity");
        $operator=$request->input("operator");
        $cs=$request->input("cs");

        // simpan ke database
        $ruang_rapat = new RuangRapat;
        $ruang_rapat->nama = $room_name;
        $ruang_rapat->lokasi = $location;
        $ruang_rapat->fasilitas = $facilities;
        $ruang_rapat->kapasitas = $capacity;
        $ruang_rapat->operator = $operator;
        $ruang_rapat->cs = $cs;
        $ruang_rapat->save();

        return redirect('/MeetingRoom');
    }

    public function showeditpage(Request $request)
    {
        $id=$request->get('id');
        $data=RuangRapat::where('id',$id)->first();
        return view('edit', ["ruang_rapat" => $data]);
    }

    public function updateroom(Request $request)
    {
        // mengambil data inputan
        $room_name=$request->input("room_name");
        $location=$request->input("location");
        $facilities=$request->input("facilities");
        $capacity=$request->input("capacity");
        $operator=$request->input("operator");
        $cs=$request->input("cs");

        // simpan ke database
        $ruang_rapat =  RuangRapat::where('id',$request->id )->first();
        $ruang_rapat->nama = $room_name;
        $ruang_rapat->lokasi = $location;
        $ruang_rapat->fasilitas = $facilities;
        $ruang_rapat->kapasitas = $capacity;
        $ruang_rapat->operator = $operator;
        $ruang_rapat->cs = $cs;
        $ruang_rapat->save();

        return redirect('/MeetingRoom');
    }

    public function deleteroom(Request $request)
    {
        $id = $request->input('id'); // Menggunakan input() untuk mengambil nilai
        $ruang_rapat = RuangRapat::find($id); // Menggunakan find() lebih ringkas untuk pencarian berdasarkan ID
    
        if ($ruang_rapat) {
            $ruang_rapat->delete();
        }
    
        return redirect('/MeetingRoom')->with('success', 'Meeting room deleted successfully.');
    }
}
