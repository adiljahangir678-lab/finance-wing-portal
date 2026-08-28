<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});

Route::view ('register','register')->name ('register');// ye index page se register button par yahan aye ga
Route::post('registersave',[UserController::class,'register'])->name('registersave');// ye register page se data save kry ga.


Route::view ('login','login')->name('login');
Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');

Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');//dashboard

Route::get('logout',[UserController::class,'logout'])->name('logout');//logout