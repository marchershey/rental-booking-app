<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Pages\LandingController::class, 'index'])->name('landing');
Route::get('/reserve', [\App\Http\Controllers\Pages\ReservationPageController::class, 'index'])->name('reservation');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Pages\LandingController::class, 'index'])->name('admin');




    // Route::view('/', 'pages.dashboard.admin.index');
});


// //////////////////////////////////////////////






// Route::middleware('auth')->group(function () {
Route::view('/book', 'pages.book');
// });


// Auth
Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'view'])->name('login');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'signIn']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'view'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
