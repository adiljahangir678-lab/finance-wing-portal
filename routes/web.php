<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\validUser;

Route::get('/', function () {
    return view('index');
});
Route::get('/user', function () {
    return view('user');
})->name('user');

Route::view ('register','register')->name ('register');// ye index page se register button par yahan aye ga
Route::post('registersave',[UserController::class,'register'])->name('registersave');// ye register page se data save kry ga.


Route::view ('login','login')->name('login');
Route::post('loginMatch',[UserController::class,'login'])->name('loginMatch');

Route::get('dashboard',[UserController::class,'dashboard'])
->name('dashboard');//->Middleware(validUser::class . ':admin');//dashboard Middleware


Route::get('budget/budget1',[UserController::class,'b1'])
->name('budget1.dashboard');


Route::get('logout',[UserController::class,'logout'])->name('logout');//logout