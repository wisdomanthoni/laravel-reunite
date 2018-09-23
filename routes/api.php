<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/films', 'FilmController@store');
Route::post('/films/{id}', 'FilmController@update');
Route::post('/films/comment/{id}','FilmController@comment');
Route::post('/upload','FilmController@uploadImage');
Route::post('/comment','FilmController@comment');

Route::middleware('cors')->get('/sendmail', 'EmailController@send');
Route::middleware('cors')->get('/attendees','EmailController@show');