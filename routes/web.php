<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RequestPageController;
use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\LoginPageController;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/api/news', [NewsController::class, 'getNews']);
Route::get('/landingpage', [LandingPageController::class, 'index']);
Route::get('/request', [RequestPageController::class, 'showRequestPage']);
Route::get('/booking', [BookingPageController::class, 'showBookingForm']);
Route::get('/login', [LoginPageController::class, 'showLoginPage']);

