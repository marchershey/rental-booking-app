<?php

use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'frontend.index');
// Route::view('/reserve', 'frontend.reserve')->middleware('auth')->name('reserve');
Route::get('/reserve', function () {
    return 'test';
})->name('reserve')->middleware('auth');
Route::view('/login', 'frontend.login')->middleware('guest')->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
