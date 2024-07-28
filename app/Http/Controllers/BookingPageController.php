<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingPageController extends Controller
{
    public function showbookingform()
    {
        return view('booking');
    }
}
