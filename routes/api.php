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

Route::group(['prefix' => 'v1'], function () {

    Route::any('login', "ApiAuthController@login");
    Route::any('login', "ApiAuthController@logout");

    Route::group(['prefix' => 'users'], function () {
        Route::get('{id}/','Api\UserController@get_user');
        Route::post('/','Api\UserController@new_user');
    });
});
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
