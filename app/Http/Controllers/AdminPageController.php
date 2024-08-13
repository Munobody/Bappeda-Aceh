<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Models\User; 
class AdminPageController extends Controller
{
    public function showadminpage()
    {
        $data = User::where('username', Auth::user()->username)->first();
        return view('admin.index', compact('data'));

    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Jika login berhasil
            // dd("berhasil");
            return redirect()->intended('/MeetingRoom'); // Ganti dengan route dashboard admin Anda
        }
        
        // Jika login gagal
        // dd("tidak berhasil");
        return redirect()->back()->withErrors([
            'username' => 'Maaf username atau password anda salah!',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
    
    public function updateAdmin(Request $request){
        $current = User::where('username', Auth::user()->username)->first();
        $current->username = $request->username;
        if($request->filled('password')){
            $current->password = Hash::make($request->password);
        }
        $current->save();
        Auth::user()->username = $request->username;
        return redirect('/admin')->with('status', 'Profile updated successfully.');
    }
}