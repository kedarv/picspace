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

Route::any('/', array( 'as' => 'home', 'uses' => 'HomeController@home' ));
Route::get('/test','HomeController@test');
Route::get('/map','HomeController@map');

Route::get('/raphael', 'HomeController@raphael');
Route::get('/draw1/{drawing_id?}','HomeController@draw1');
Route::get('/draw2', 'HomeController@draw2');

Route::post('/locationPost', 'HomeController@locationPost');