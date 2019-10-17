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



// Rotas não protegidas
Route::post('/user/login', 'Api\UserController@login');
Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::name('user::')->prefix('user')->group(function () {
        Route::post('/quotation', 'UserController@createQuotation');
    });
});
