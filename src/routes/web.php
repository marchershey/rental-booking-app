<?php

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

Route::name('frontend.')->group(function () {
    Route::view('/' , 'pages.frontend.welcome');
    Route::get('/property/{property_id}', \App\Http\Pages\Frontend\PropertyPage::class)->name('property')->whereNumber('id');
});


Route::name('admin.')->prefix('admin')->middleware('auth.admin')->group(function () {
    Route::view('/', 'pages.admin.index')->name('index');
    Route::name('properties.')->prefix('properties')->group(function () {
        Route::view('/all', 'pages.admin.properties.list')->name('list');
        Route::view('/new', 'pages.admin.properties.create')->name('create');
        Route::get('/{id}', function ($id) {
            return view('pages.admin.properties.edit', ['property_id' => $id]);
        })->name('edit')->whereNumber('id');
    });
    Route::view('/settings', 'pages.admin.settings')->name('settings');
});

require __DIR__.'/auth.php';
