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
Route::get('/new','HomeController@newDrawing');
Route::post('/newFormAction','HomeController@newFormAction');


Route::get('/draw/{drawing_id?}','HomeController@draw');

Route::post('/locationPost', 'HomeController@locationPost');