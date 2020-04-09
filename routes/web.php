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
    'prefix' => 'account'
], function () {
    Route::get('signup', 'AccountsController@signup')->name('signup');
    Route::get('login', 'AccountsController@login')->name('login');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('', 'AccountsController@account')->name('account');
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

