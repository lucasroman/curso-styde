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

Route::get('/user/index', 'UserController@index')
    ->name('user.index');

// This route work only request with the format "user/aNumber"
Route::get('/user/show/{user}', 'UserController@show')
    ->where('user','[0-9]+') // Avoid enter to other route as "user/new"
    ->name('user.show');

Route::get('/user/new', 'UserController@new')
    ->name('user.new');

Route::post('/user/create', 'UserController@create');


Route::get('/greeting/{name}/{nickname?}', 'WelcomeUserController')
    ->name('user.welcome');
