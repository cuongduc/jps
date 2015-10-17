<?php

/**
 * Routes that required admin rights
 * or related to admin functionalities
 */
Route::group(['middleware' => ['auth', 'roles:admin'], 
			  'prefix' => 'admin', 
			  'as' => 'admin::', 
			  'namespace' => 'Admin'], 
function() {

	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);

	Route::get('categories', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
});