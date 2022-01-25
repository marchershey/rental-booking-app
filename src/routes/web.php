<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::name('frontend.')->group(function () {
    Route::view('/', 'pages.frontend.index')->name('index');
    Route::view('/properties', 'pages.frontend.properties')->name('properties');
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
        Route::post('/new', [App\Http\Controllers\PropertiesController::class, 'createProperty'])->name('post');
        Route::get('/{property}', [App\Http\Controllers\PropertiesController::class, 'editProperty'])->name('edit');
    });

    // Settings
    Route::name('settings.')->prefix('settings')->group(function () {
        Route::view('/', 'pages.dashboard.settings')->name('settings');
        Route::view('/properties', 'pages.dashboard.settings')->name('index');
    });
});

// Resources
// Route::post('/upload', [App\Http\Controllers\UploadController::class, 'upload'])->name('upload');
