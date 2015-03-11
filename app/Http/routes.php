<?php

use App\Models\Dvd;

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

Route::get('/', 'WelcomeController@index');
Route::get('/about', 'WelcomeController@about');
Route::get('/dvds/search', 'DvdController@search');
Route::get('/dvds/create', 'DvdController@create');
Route::post('/dvds', 'DvdController@store');
Route::get('/dvds', 'DvdController@results');
Route::get('/dvds/{id}', 'ReviewController@create');
Route::post('/dvds/{id}', 'ReviewController@store');
Route::get('/genres/{genre_name?}/dvds', 'GenreController@results')
	->where('genre_name', '(.*)');
Route::get('/eager-loading', 'LoadingController@eagerLoading');