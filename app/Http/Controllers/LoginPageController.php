<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPageController extends Controller
{
    public function showloginpage()
    {
        return view('login');
    }
}
