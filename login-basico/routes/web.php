<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Cliente;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
 * Clientes
 */
Route::get('/', 'ClienteControlador@index');
Route::get('/clientesjs', 'ClienteControlador@clientesjs');
Route::get('/clientes/json', 'ClienteControlador@clientesjson');

/**
 * Clientes
 */

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/produtos', 'ProdutoControlador@index');
// ->middleware('auth');
Route::get('/departamentos', 'DepartamentoControlador@index');

Route::get('/usuario', function(){
    return view('usuario');
});