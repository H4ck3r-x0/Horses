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
  Route::get('create', 'AdsController@createAd')->middleware('auth');

  # show single ad route
  Route::get('/{slug}', 'AdsController@showAd')->name('showSingleAd');

  # store an Advertisement
  Route::post('store', 'AdsController@storeAd')
        ->name('storeAd')
        ->middleware('auth');

  # show upload media to an Advertisement
  Route::get('media/{ad_id}', 'AdsController@media')
        ->name('AdMedia')
        ->middleware('auth');

  # store upload media to an Advertisement
  Route::post('storeMedia', 'AdsController@storeMedia')
        ->name('storeMedia')
        ->middleware('auth');

});
