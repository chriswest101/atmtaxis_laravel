<?php

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

Route::get('/', function () {
    return view('index')->with("page", "homepage");
})->name("index");

Route::group([
    'prefix' => 'myaccount'
], function () {
    Route::group([
        'middleware' => 'auth:web'
    ], function() {
        Route::get('', 'AccountsController@index')->name('myAccount.index');
        Route::get('/details', 'AccountsController@details')->name('myAccount.details');
        Route::get('/password', 'AccountsController@password')->name('myAccount.password');
        Route::get('/bookings', 'AccountsController@bookings')->name('myAccount.bookings');
        Route::get('/quotes', 'AccountsController@quotes')->name('myAccount.quotes');
        Route::post('/details', 'AccountsController@updateDetails')->name('myAccount.updateDetails');
        Route::post('/password', 'AccountsController@updatePassword')->name('myAccount.updatePassword');
    });
});

Route::group([
    'prefix' => 'booking'
], function () {
    Route::get('', 'BookingsController@handleGet')->name('bookingsGet');
    Route::post('', 'BookingsController@handlePost')->name('bookingsPost');
});

Route::group([
    'prefix' => 'quote'
], function () {
    Route::get('', 'QuotesController@handleGet')->name('quoteGet');
    Route::post('', 'QuotesController@handlePost')->name('quotePost');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('account');

