<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingPageController extends Controller
{
    public function showBookingForm()
    {
        return view('Booking');
    }
}
