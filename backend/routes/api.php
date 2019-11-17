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
Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');


Route::middleware('jwt.auth')->group(function () {
/**
 * Categories
 */
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@create');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');


/**
 * Songs
 */
Route::get('/songs', 'SongsController@index');
Route::get('/songs/{id}', 'SongsController@show');
Route::post('/songs', 'SongsController@create');
Route::put('/songs/{id}', 'SongsController@update');
Route::delete('/songs/{id}', 'SongsController@destroy');

/**
 * Favorite Songs
 */
Route::get('/favorites', 'FavoritesController@index');
Route::get('/favorites/{id}', 'FavoritesController@show');
Route::post('favorites', 'FavoritesController@create');
Route::put('/favorites/{id}', 'FavoritesController@update');
Route::delete('/favorites/{id}', 'FavoritesController@destroy');
});

