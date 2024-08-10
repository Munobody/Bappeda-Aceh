<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RequestPageController;
use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\MeetingRoomPageController;

use App\Http\Controllers\ViewRequestPageController;

use App\Http\Controllers\HomePageController;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/api/news', [NewsController::class, 'getNews']);
Route::get('/landingpage', [LandingPageController::class, 'index']);
Route::get('/request', [RequestPageController::class, 'showrequestpage']);

Route::get('/booking', [BookingPageController::class, 'showbookingform']);
Route::get('/request', [BookingPageController::class, 'showrequestpage']);

Route::post('/submit-room-booking', [BookingPageController::class, 'handlerequestroom']);
Route::post('/booking/update-status', [BookingPageController::class, 'updateStatus'])->name('booking.updateStatus');


Route::get('/login', [LoginPageController::class, 'showloginpage']);
Route::get('/MeetingRoom', [MeetingRoomPageController::class, 'showmeetingroompage']);
Route::get('/Room', [MeetingRoomPageController::class, 'showroompage']);
Route::post('/Room/Store', [MeetingRoomPageController::class, 'storeroom']);
Route::get('/viewrequest', [ViewRequestPageController::class, 'showviewrequestpage']);
Route::get('/Edit', [MeetingRoomPageController::class, 'showeditpage']);
Route::get('/home', [HomePageController::class, 'showhomepage']);