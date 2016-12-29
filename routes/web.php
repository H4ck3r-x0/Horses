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

// Auth Routes
Auth::routes();


// Home page
Route::get('/', 'HomeController@index');



// Ads Routing
Route::group(['namespace' => 'Ads', 'prefix' => 'ads'], function () {
  # All ads route
  Route::get('all', 'AdsController@index');

  # Create an Advertisement
  Route::get('create', 'AdsController@create');

});
