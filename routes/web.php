<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RequestPageController;
use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\MeetingRoomPageController;
use App\Http\Controllers\AdminPageController;

use App\Http\Controllers\ViewRequestPageController;

use App\Http\Controllers\HomePageController;

use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('app');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/landingpage', [LandingPageController::class, 'index']);
Route::get('/request', [RequestPageController::class, 'showrequestpage']);


Route::get('/booking', [BookingPageController::class, 'showbookingform']);
Route::get('/request', [BookingPageController::class, 'showrequestpage']);

Route::post('/submit-room-booking', [BookingPageController::class, 'handlerequestroom']);
Route::post('/booking/update-status', [BookingPageController::class, 'updateStatus'])->name('booking.updateStatus');




Route::get('/download', [ViewRequestPageController::class, 'downloadfile']);
Route::get('/Edit', [MeetingRoomPageController::class, 'showeditpage']);
Route::get('/home', [HomePageController::class, 'showhomepage']);


// admin
Route::get('/login', [LoginPageController::class, 'showloginpage']);
Route::post('/admin/logout', [AdminPageController::class, 'logout'])->name('admin.logout');
Route::post('/login', [AdminPageController::class, 'login'])->name('admin.login');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminPageController::class, 'showadminpage']);
    Route::post("/admin/update",[AdminPageController::class, 'updateAdmin']);
    Route::get('/MeetingRoom', [MeetingRoomPageController::class, 'showmeetingroompage']);
    Route::get('/Room', [MeetingRoomPageController::class, 'showroompage']);
    Route::post('/Room/Store', [MeetingRoomPageController::class, 'storeroom']);
    Route::post('/Room/Update', [MeetingRoomPageController::class, 'updateroom']);
    Route::post('/Room/Delete', [MeetingRoomPageController::class, 'deleteroom'])->name('room.delete');

    Route::get('/viewrequest', [ViewRequestPageController::class, 'showviewrequestpage'])->name('viewrequest');

});