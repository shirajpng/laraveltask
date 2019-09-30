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

//get list of user
Route::get('/', 'UserController@index');

//add new user
Route::get('/add','UserController@create');

//store users
Route::post('/store','UserController@store')->name('store');

//get each user info
Route::get('/user/{id}','UserController@show');
