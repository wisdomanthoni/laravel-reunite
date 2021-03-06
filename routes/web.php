<?php

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
   return view('welcome');
});

Auth::routes();

Route::get('/films', 'FilmController@index')->name('home');
Route::get('/film/create', 'FilmController@create')->name('film-create');
Route::get('/film/{slug}', 'FilmController@show')->name('film-show');


Route::get('/coupons/{type}', 'EmailController@showCoupon');

Route::get('/coupons', 'EmailController@showCoupon');

Route::get('/participants', 'EmailController@participants');
