<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

// admin
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::get('test', function () {
    });
    Route::resource('vehicles', VehicleController::class);

});






//users

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
