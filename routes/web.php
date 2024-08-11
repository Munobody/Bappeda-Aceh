<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RequestPageController;
use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\MeetingRoomPageController;
use App\Http\Controllers\RoomPageController;
use App\Http\Controllers\ViewRequestPageController;
use App\Http\Controllers\EditPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KomputerController;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/api/news', [NewsController::class, 'getNews']);
Route::get('/landingpage', [LandingPageController::class, 'index']);
Route::get('/request', [RequestPageController::class, 'showrequestpage']);
Route::get('/booking', [BookingPageController::class, 'showbookingform']);
Route::get('/login', [LoginPageController::class, 'showloginpage']);
Route::get('/MeetingRoom', [MeetingRoomPageController::class, 'showmeetingroompage']);
Route::get('/Room', [RoomPageController::class, 'showroompage']);
Route::get('/viewrequest', [ViewRequestPageController::class, 'showviewrequestpage']);
Route::get('/Edit', [EditPageController::class, 'showeditpage']);
Route::get('/home', [HomePageController::class, 'showhomepage']);
Route::get('/komputer', [KomputerController::class, 'index'])->name('komputer');