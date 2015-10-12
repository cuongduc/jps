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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Authentication routes
 */
Route::group(['prefix' => 'auth', 'as' => 'auth::', 'namespace' => 'Auth'], function() {

	Route::get('register', ['as' => 'register', 'uses' => 'AuthController@getRegister']);

	Route::post('register', ['as' => 'register', 'uses'	=> 'AuthController@postRegister']);

	Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);

	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

	Route::get('activate/{code}', ['as' => 'activate', 'uses' => 'AuthController@activate']);
});