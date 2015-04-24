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

Route::model('biblios', 'App\Biblio');
Route::model('copies', 'App\Copy');

Route::get('/', 'WelcomeController@index');
Route::controller('api','ApiController');
Route::get('biblios/results','BiblioController@results');

Route::get('circ','CirculationController@index');

Route::resource('biblios','BiblioController');
Route::controller('ac','AutoCompleteController');


Route::resource('biblios.copies','CopyController');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);