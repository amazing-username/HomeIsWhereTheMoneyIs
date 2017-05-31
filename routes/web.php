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
Route::post('register/post', 'HomeController@registerUser');
Route::post('login/post', 'HomeController@loginUser');
Route::post('userhome/maxipad', 'HomeController@home');
Route::post('userhome/maxipad/create', 'BillController@create');
Route::post('userhome/maxipad/create/done', 'BillController@createbill');
Route::post('userhome/maxiad/manage', 'BillController@manage');
Route::post('userhome/maxipad/managebill', 'BillController@managebill');
Route::post('userhome/maxipad/managebilluser', 'BillController@addpeople');
Route::post('userhome/maxipad/yup/managebilluser', 'BillController@calcbill');
Route::post('userhome/maxipad/gasmaskgrasp/manage', 'BillController@debt');
Route::post('userhome/maxipad/view', 'BillController@view');
Route::post('userhome/maxi[ad/viewbill', 'BillController@viewbill');
Route::get('laravel', function () {
    return view('welcome');
});
Route::get('hotboy', function () {
	return 'I\'m iced up, ugly corner where we\'re from we don\'t really like ya';
});
Route::get('stunt', function () {
	return "Check the database, I think someone was created";
});
Route::get('paycheck', 'PaycheckController@display');
Route::post('paycheck/biweekly', 'PaycheckController@results');
