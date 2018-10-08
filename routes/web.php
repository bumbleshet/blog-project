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

Route::get('/', function () {
    return view('welcome');
});

// Route Group for post
Route::group(['prefix' => 'post', 'middleware' => 'auth'], function(){

	Route::get('add', 'PostController@index')->name('add post');
	Route::post('add', 'PostController@addNewPost');
	Route::get('edit/{id}', 'PostController@edit')->name('edit post')->middleware('user_auth');
	Route::post('edit/{id}', 'PostController@updatePost');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
