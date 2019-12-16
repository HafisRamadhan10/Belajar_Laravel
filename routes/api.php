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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/','CobaController@gombal');

Route::get('users','UsersController@all');

Route::post('users','UsersController@store');

Route::get('users/{id}','UsersController@find');

Route::delete('users/{id}','UsersController@delete');

Route::post('users/registration','UsersController@registration');

Route::post('users/login','UsersController@login');


