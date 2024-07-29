<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewRequestPageController extends Controller
{
    public function showviewrequestpage()
    {
        return view('viewrequest');
    }
}
