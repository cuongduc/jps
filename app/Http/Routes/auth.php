<?php

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