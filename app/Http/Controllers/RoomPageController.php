<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomPageController extends Controller
{
    public function showRoomPage()
    {
        return view('Room');
    }
}
