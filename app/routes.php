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
	return View::make('home');
});
Route::resource('home', 'pageController');

Route::resource('profile', 'ProfilePageController');

Route::resource('profiles', 'ProfilePageController@listUsers');

Route::resource('createUserTable', 'ProfilePageController@createTable');

Route::resource('newUser', 'ProfilePageController@createUser');

Route::resource('updateUser', 'ProfilePageController@updateUser');

Route::resource('project', 'ProjectAPIController');

Route::resource('projects', 'ProjectAPIController@listProjects');

Route::resource('createProjectTable', 'ProjectAPIController@createProjectTable');

Route::resource('newProject', 'ProjectAPIController@createProject');

Route::resource('updateProject', 'ProjectAPIController@updateProject');

