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
Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('user', 'AuthController@getAuthUser');

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