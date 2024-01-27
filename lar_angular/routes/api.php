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

Route::get('/', 'PostControlador@index');
Route::post('/', 'PostControlador@store')->middleware('auth:api');
Route::delete('/destroy/{id}', 'PostControlador@destroy')->middleware('auth:api');
Route::get('/like/{id}', 'PostControlador@like')->middleware('auth:api');

Route::prefix('auth')->group(function () {
    Route::post('registro', 'AutenticadorControlador@registro');
    Route::get('registro/ativar/{id}/{token}', 'AutenticadorControlador@ativaregistro');
    Route::post('login', 'AutenticadorControlador@login');
    // Route::post('registro', 'AutenticadorControlador@logout');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'AutenticadorControlador@logout');
    });
});

Route::get('produtos', 'ProdutosController@index')->middleware('auth:api');

