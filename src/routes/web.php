<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

Route::name('frontend.')->group(function () {
    Route::view('/', 'pages.frontend.index')->name('index');
    Route::view('/properties', 'pages.frontend.properties')->name('properties');
    Route::get('/property/{property}/reserve', [\App\Http\Controllers\RouteController::class, 'reserveProperty'])->name('reserve');
    Route::get('/checkout/{code}', [\App\Http\Controllers\RouteController::class, 'checkout'])->name('trip.checkout');
});

// Dashboard
Route::name('dashboard.')->prefix('dashboard')->middleware('auth.basic')->group(function () {

    // Dashboard Index
    Route::view('/', 'pages.dashboard.index')->name('index');
    Route::view('/notifications', 'pages.dashboard.settings')->name('notifications');

    // Properties
    Route::name('properties.')->prefix('properties')->group(function () {
        Route::view('/', 'pages.dashboard.properties.index')->name('index');
        Route::view('/new', 'pages.dashboard.properties.new')->name('new');
        Route::post('/new', [App\Http\Controllers\RouteController::class, 'createProperty'])->name('post');
        Route::get('/{property}', [App\Http\Controllers\RouteController::class, 'editProperty'])->name('edit');
    });

    // Settings
    Route::name('settings.')->prefix('settings')->group(function () {
        Route::view('/', 'pages.dashboard.settings')->name('settings');
        Route::view('/properties', 'pages.dashboard.settings')->name('index');
    });
});

Route::get('/test', function (Request $request) {
    return $request;
    return Str::random(40);
});

Route::get('/billing-portal', function () {
    // $user = auth()->user()->createOrGetStripeCustomer();
    return auth()->user()->checkoutCharge(1200, 'T-Shirt', 5);
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->back();
});

// Resources
// Route::post('/upload', [App\Http\Controllers\UploadController::class, 'upload'])->name('upload');
