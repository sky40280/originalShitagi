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

Route::post('auth/signUp', 'AuthController@signUp');
Route::post('auth/login', 'AuthController@login');
Route::get('auth/getUser', 'AuthController@getUser');
Route::get('user', 'AuthController@index');
Route::get('user/{id}', 'AuthController@show');
Route::post('user/{id}', 'AuthController@update');
Route::delete('user/{id}', 'AuthController@delete');