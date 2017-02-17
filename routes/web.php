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

Route::group(['middleware' => ['web']], function() {

	Auth::routes();

	Route::get('/', 'PagesController@index');
	Route::get('home', function() {
	    Session::flash("loggedin_status", 'You are logged in, ');
	    return redirect('dashboard');
	});
	Route::get('dashboard', 'PagesController@home');
	Route::get('about', 'PagesController@about');
	Route::get('contact', 'PagesController@contact');
	Route::post('contact', 'PagesController@postcontact');

	Route::post('category', 'CategoryController@store');
	Route::get('category/{category}/edit', 'CategoryController@edit');
	Route::patch('category/{category}', 'CategoryController@update');
	Route::get('category/{category}/delete', 'CategoryController@delete');
	
	Route::post('category/{category}/words', 'WordsController@store');
	Route::get('words/{word}/edit', 'WordsController@edit');
	Route::patch('words/{word}', 'WordsController@update');
	Route::get('words/{word}/delete', 'WordsController@delete');
	Route::get('words/train', 'WordsController@train');

});
