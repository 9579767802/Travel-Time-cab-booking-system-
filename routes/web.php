<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;

// admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('test', function () {
    });
    Route::resource('vehicles', VehicleController::class);
    Route::resource('drivers', DriverController::class);
    Route::get('drivers/delete/{id}', [DriverController::class, 'destroy'])->name('drivers.delete');
    Route::get('vehicles/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicles.delete');
    Route::get('getDriversData', [DriverController::class, 'getDriversData'])->name('getDriversData');

});

Route::resource('bookings', BookingController::class)->middleware('auth');

Route::post('/bookings/search', [BookingController::class, 'searchByDateRange'])->name('bookings.searchByDateRange');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bookings/search', [BookingController::class, 'search'])->name('bookings.search');
Route::get('/bookings/book-user/{vehicle_id}/{driver_id}', [BookingController::class, 'bookUser']);
Route::get('/get-booking', [BookingController::class, 'allBookings'])->name('bookings.get-booking');
Route::get('/get-booking', [BookingController::class, 'bookingData'])->name('bookings.get-booking');
Route::get('/get-booking', [BookingController::class, 'bookingData'])->name('bookings.get-booking');
Route::get('bookings/delete/{id}', [BookingController::class, 'destroy'])->name('bookings.delete');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 