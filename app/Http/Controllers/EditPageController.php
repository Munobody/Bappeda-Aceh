<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditPageController extends Controller
{
    public function showEditPage()
    {
        return view('Edit');
    }
}
