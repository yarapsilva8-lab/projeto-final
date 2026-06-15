<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/sobre', 'sobre')->name('sobre');

Route::middleware('auth')->group(function() {
   Route::resource('animais', AnimalController::class)->parameters([
        'animais' => 'animal'
   ]);
});
