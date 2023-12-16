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

Route::get('/','PostsController@index');
Route::post('/store','PostsController@store')->name('posts.store');
Route::delete('/delete/{id}', 'PostsController@destroy')->name('posts.delete');
Route::get('/download/{id}', 'PostsController@download')->name('posts.download');
