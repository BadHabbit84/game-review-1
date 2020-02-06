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

Route::post('get-games', 'APIController@getGames');
Route::post('get-users', 'APIController@getUsers');
Route::post('get-comments/{user_name}', 'APIController@getComments');