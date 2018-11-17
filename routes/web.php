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

Route::get('/users', function () {
    return 'Users';
});

Route::get('/user/{id}', function($id) {
    return "User's detail: {$id}";
})->where('id','[0-9]+');

Route::get('/user/new', function() {
    return 'Create new user';
});

Route::get('/greeting/{name}/{nickname?}', function($name, $nickname = null) {
    // Convert "nAmE" to "Name"
    $name = ucfirst(strtolower($name));

    if ($nickname) {
        $nickname = ucfirst(strtolower($nickname));
        return "Welcome user {$name} your nickname is '{$nickname}'.";
    } else {
        return "Welcome user {$name} you have not nickname.";
    }
});
