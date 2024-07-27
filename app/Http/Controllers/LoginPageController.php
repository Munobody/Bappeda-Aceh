<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPageController extends Controller
{
    public function showLoginPage()
    {
        return view('Login');
    }
}
