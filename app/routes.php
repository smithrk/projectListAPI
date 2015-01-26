<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('profile', 'ProfilePageController');

Route::resource('profiles', 'ProfilePageController@listUsers');

Route::resource('profile/create', 'ProfilePageController@createTable');

Route::resource('profile/user', 'ProfilePageController@createUser');

Route::resource('newuser', 'ProfilePageController@createUser');

Route::resource('updateuser', 'ProfilePageController@updateUser');

