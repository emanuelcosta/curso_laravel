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
Route::post('/', 'PostControlador@store');
Route::delete('/destroy/{id}', 'PostControlador@destroy');
Route::get('/like/{id}', 'PostControlador@like');

Route::prefix('auth')->group(function () {
    Route::post('registro', 'AutenticadorControlador@registro');
    Route::post('registro', 'AutenticadorControlador@login');
    // Route::post('registro', 'AutenticadorControlador@logout');

    Route::middleware('auth:api')->group(function () {
        Route::post('registro', 'AutenticadorControlador@logout');
    });
});


Route::get('/produtos', 'ProdutosController@index'); 