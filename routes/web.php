<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::view ('register','register')->name ('register');


Route::view ('login', 'login')->name('login');