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

Route::get('/', 'Controller@login')->name('login');
Route::post('/login', 'Controller@authenticateUser');
Route::get('/logout', 'Controller@logout');
Route::get('/user/create', 'UserController@create');
Route::post('/user', 'UserController@store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/{id}', 'UserController@show');
    Route::put('/user/{id}', 'UserController@update');
    Route::get('/home', 'PostController@index');
    Route::resource('post', 'PostController');
});


