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
Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::get('register', 'HomeController@register');
Route::get('laravel', function () {
    return view('welcome');
});
Route::get('hotboy', function () {
	return 'I\'m iced up, ugly corner where we\'re from we don\'t really like ya';
});
Route::get('stunt', function () {
	/**
	$user = new User;

	user->firstname = "John";
	user->lastname = "Doe";
	user->username = "Bigboy69420";
	user->password = "Swish";

	user->save();
	 */

	return "Check the database, I think someone was created";
});
//Route::resource('user', 'UserController');
//Route::get('user/index', 'App\Http\Controllers\UserController@index');
