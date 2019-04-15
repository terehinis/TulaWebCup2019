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

Route::get('/', 'MainController@index')->name('main');
Route::get('/auth', 'UserController@index')->name('login')->middleware('guest');
Route::get('/auth/logout', 'UserController@logout')->name('logout');
Route::get('/auth/callback', 'UserController@callback')->middleware('guest');
