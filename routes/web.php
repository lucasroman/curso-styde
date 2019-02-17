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

// // Index --------------------------------------------
// Route::get('/users', 'UserController@index')
//     ->name('users.index');
//
// // Create -------------------------------------------
// Route::get('/users/create', 'UserController@create')
// ->name('users.create');
//
// // Store --------------------------------------------
// Route::post('/users', 'UserController@store')
// ->name('users.store');
//
// // Show ---------------------------------------------
// // This route work only request with the format "user/aNumber"
// Route::get('/users/{user}', 'UserController@show')
//     ->where('user','[0-9]+') // Avoid enter to other route as "user/new"
//     ->name('users.show');
// --------------------------------------------------

// Short way to do the same thing above
// Route::resource('users', 'UserController')
//     ->only(['index', 'create', 'store', 'show']);

Route::resource('users', 'UserController')
    ->except(['update', 'destroy']);

// --------------------------------------------------
Route::get('/greeting/{name}/{nickname?}', 'WelcomeUserController')
    ->name('user.welcome');
