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
use App\Http\Controllers\EditPageController;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/api/news', [NewsController::class, 'getNews']);
Route::get('/landingpage', [LandingPageController::class, 'index']);
Route::get('/request', [RequestPageController::class, 'showRequestPage']);
Route::get('/booking', [BookingPageController::class, 'showBookingForm']);
Route::get('/login', [LoginPageController::class, 'showLoginPage']);
Route::get('/MeetingRoom', [MeetingRoomPageController::class, 'showMeetingRoomPage']);
Route::get('/Room', [RoomPageController::class, 'ShowRoomPage']);
Route::get('/Edit', [EditPageController::class, 'ShowEditPage']);

