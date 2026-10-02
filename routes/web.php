<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\validUser;
use App\Http\Controllers\DaakController;

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
Route::get('budget/budget2',[UserController::class,'b2'])
->name('budget2.dashboard');
Route::get('budget/budget3',[UserController::class,'b3'])
->name('budget3.dashbord');
Route::get('budget/budget4',[UserController::class,'b4'])
->name('budget4.dashboard');
Route::get('budget/budget5',[UserController::class,'b5'])
->name('budget5.dashboard');
Route::get('budget/budget6',[UserController::class,'b6'])
->name('budget6.dashboard');

Route::get('audit/audit1',[UserController::class,'a1'])
->name('audit1.dashboard');
Route::get('audit/audit2',[UserController::class,'a2'])
->name('audit2.dashboard');
Route::get('audit/audit3',[UserController::class,'a3'])
->name('audit3.dashboard');


// Daily Daak

Route::get('/daak',[DaakController::class, 'index'])->name('daak.index');
Route::post('/daak/store',[DaakController::class,'store'])->name('daak.store');




// Route::get('budget/daakb1', function () {
//     return view('budget.daakb1');
// });
//Route::view('budget/daakb1', 'budget.daakb1')->name('budget.daakb1');

// Route::get('dashboard/daakb1',[UserController::class,'daakb1'])
// ->name('daakb1.dashboard');
Route::get('logout',[UserController::class,'logout'])->name('logout');//logout