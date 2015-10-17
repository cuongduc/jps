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

foreach (File::allFiles(__DIR__ . '/Routes') as $file) {

  require $file->getPathname();
  
}

// Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);