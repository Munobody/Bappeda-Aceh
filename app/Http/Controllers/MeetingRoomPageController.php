<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingRoomPageController extends Controller
{
    public function showMeetingRoomPage()
    {
        return view('MeetingRoom');
    }
}
