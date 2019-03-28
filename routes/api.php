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

// Route::get('user/{email}', 'API\UserController@show');
// Route::post('login', 'API\UserController@login');

Route::apiResources([
    'usuario' => 'UsersController',
    'pulso' => 'HeartbeatController',
    // 'login' => 'UsersController'
]);

Route::get('/miPulso/{id}', 'HeartbeatController@getpulsos');
Route::post('login', 'UsersController@login');
Route::get('/user/{id}','UsersController@ggg');
