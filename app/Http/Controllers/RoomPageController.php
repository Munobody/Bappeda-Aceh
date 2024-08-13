<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomPageController extends Controller
{
    public function showroompage()
    {
        return view('Room');
    }
}
