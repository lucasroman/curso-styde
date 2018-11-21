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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@index');

// This route work only request with the format "user/aNumber"
Route::get('/user/{id}', 'UserController@show')
    ->where('id','[0-9]+'); // Avoid enter to other route as "user/new"

Route::get('/user/new', 'UserController@create');

Route::get('/greeting/{name}/{nickname?}', 'WelcomeUserController');
