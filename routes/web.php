<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    Route::get('/completesignup', 'AccountsController@completeSignup')->name('myAccount.completeSignup');
    Route::post('/completesignup', 'AccountsController@validateCompleteSignup')->name('myAccount.validateCompleteSignup');
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
    Route::get('', function () {
        return redirect()->route('booking.showFrom');
    })->name("booking");
    Route::get('/from', 'BookingsController@showFrom')->name('booking.showFrom');
    Route::post('/from', 'BookingsController@validateFrom')->name('booking.validateFrom');
    Route::get('/to', 'BookingsController@showTo')->name('booking.showTo');
    Route::post('/to', 'BookingsController@validateTo')->name('booking.validateTo');
    Route::get('/details', 'BookingsController@showDetails')->name('booking.showDetails');
    Route::post('/details', 'BookingsController@validateDetails')->name('booking.validateDetails');
    Route::get('/confirm', 'BookingsController@showConfirm')->name('booking.showConfirm');
    Route::post('/confirm', 'BookingsController@validateConfirm')->name('booking.validateConfirm');
    Route::get('/complete', 'BookingsController@showComplete')->name('booking.showComplete');
});

Route::group([
    'prefix' => 'quote'
], function () {
    Route::get('', function () {
        return redirect()->route('quote.showFrom');
    })->name("quote");
    Route::get('/from', 'QuotesController@showFrom')->name('quote.showFrom');
    Route::post('/from', 'QuotesController@validateFrom')->name('quote.validateFrom');
    Route::get('/to', 'QuotesController@showTo')->name('quote.showTo');
    Route::post('/to', 'QuotesController@validateTo')->name('quote.validateTo');
    Route::get('/details', 'QuotesController@showDetails')->name('quote.showDetails');
    Route::post('/details', 'QuotesController@validateDetails')->name('quote.validateDetails');
    Route::get('/confirm', 'QuotesController@showConfirm')->name('quote.showConfirm');
    Route::post('/confirm', 'QuotesController@validateConfirm')->name('quote.validateConfirm');
    Route::get('/complete', 'QuotesController@showComplete')->name('quote.showComplete');
});

Route::get('/farecalculator', 'FareCalculatorController@index')->name('fareCalculator.index');
Route::post('/farecalculator', 'FareCalculatorController@calculate')->name('fareCalculator.calculate');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('account');

