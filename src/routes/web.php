<?php

use Illuminate\Http\Request;
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

Route::redirect('/home', '/admin')->name('home');

Route::name('frontend.')->group(function () {
    Route::view('/' , 'pages.frontend.welcome');
    Route::get('/property/{property_id}', \App\Http\Pages\Frontend\PropertyPage::class)->name('property')->whereNumber('id');
    Route::get('/checkout/{reservationSlug}', \App\Http\Pages\Frontend\CheckoutPage::class)->name('checkout')->middleware('auth');
});


Route::name('admin.')->prefix('admin')->middleware('auth.admin')->group(function () {
    Route::view('/', 'pages.admin.index')->name('index');
    Route::name('guests.')->prefix('guests')->group(function () {
        Route::get('/', \App\Http\Pages\Admin\Guests\ViewGuestsPage::class)->name('view');
    });
    Route::name('properties.')->prefix('properties')->group(function () {
        Route::view('/all', 'pages.admin.properties.list')->name('list');
        Route::view('/new', 'pages.admin.properties.create')->name('create');
        Route::get('/{id}', function ($id) {
            return view('pages.admin.properties.edit', ['property_id' => $id]);
        })->name('edit')->whereNumber('id');
    });

    Route::view('/settings', 'pages.admin.settings')->name('settings');
});

Route::get('/logout', function (){
    auth()->logout();
    return redirect('/property/1');
});

Route::get('/charge-checkout', function (Request $request) {
    return $request->user()->checkoutCharge(1200, 'T-Shirt', 5);
});

Route::get('/success', function (Request $request) {
    return $request;
});

Route::get('/test', function (Request $request) {
    return auth()->user()->paymentMethods();
});

require __DIR__.'/auth.php';
