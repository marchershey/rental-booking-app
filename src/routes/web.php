<?php

use Illuminate\Support\Facades\Hash;
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

Route::get('/test', function () {
    return Hash::make('password');
});

Route::view('/', 'pages.index');

// Dashboard
Route::name('dashboard.')->prefix('dashboard')->middleware('auth.basic')->group(function () {
    Route::view('/', 'pages.dashboard.index')->name('index');
    Route::view('/notifications', 'pages.dashboard.settings')->name('notifications');

    Route::name('properties.')->prefix('properties')->group(function () {
        Route::view('/', 'pages.dashboard.properties.index')->name('index');
        Route::view('//new', 'pages.dashboard.properties.new')->name('new');
    });

    Route::name('settings.')->prefix('settings')->group(function () {
        Route::view('/', 'pages.dashboard.settings')->name('settings');
        Route::view('/properties', 'pages.dashboard.settings')->name('index');
    });
});
