<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Verification routes...
Route::get('auth/verify/{confirmation_code?}', 'Auth\AuthController@verify');

// Password reset...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Admin routes...
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {

	// Admin Pages...
	Route::get('/', 'AdminPagesController@index');

	// Admin Users routes...
	Route::get('/users/{users}/changepassword', 'AdminUsersController@getChangePassword');
	Route::post('/users/{users}/changepassword', 'AdminUsersController@postChangePassword');
	Route::resource('/users', 'AdminUsersController');
});

// Regions routes...
Route::resource('regions', 'RegionsController');
Route::get('{zip}/{street}', 'RegionsController@show');
Route::post('{zip}/{street}/photos', 'RegionsPhotosController@store');
Route::delete('photos/{id}', 'RegionsPhotosController@destroy');