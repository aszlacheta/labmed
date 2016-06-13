<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Authentication routes...
Route::get('auth/login', 'UsersController@create');
Route::post('auth/login', 'UsersController@show');
Route::get('auth/logout', 'UsersController@destroy');

// Registration routes...
Route::post('/register', 'UsersController@store');


Route::get('/', [
    'as' => 'home',
    'middleware' => 'auth',
    'uses' => 'PagesController@home'
]);

Route::get('odczynniki/closeToExpirationDate', [
    'middleware' => 'auth',
    'uses' => 'OdczynnikiController@getCloseToExpirationDate'
]);

Route::get('urzadzenia/closeToExpirationDate', [
    'middleware' => 'auth',
    'uses' => 'UrzadzeniaController@getCloseToExpirationDate'
]);

Route::get('sprzet_jednorazowy/closeToExpirationDate', [
    'middleware' => 'auth',
    'uses' => 'SprzetJednorazowyController@getCloseToExpirationDate'
]);

Route::group(['middleware' => 'auth'], function(){
    Route::resource('odczynniki', 'OdczynnikiController');
    Route::resource('urzadzenia', 'UrzadzeniaController');
    Route::resource('material_biologiczny', 'MaterialBiologicznyController');
    Route::resource('sprzet_jednorazowy', 'SprzetJednorazowyController');
    Route::resource('kalkulator', 'KalkulatorController');
});




















