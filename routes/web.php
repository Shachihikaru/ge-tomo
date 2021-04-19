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

Route::get('/post', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::get('/post/store', 'PostController@store');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::get('/post/update/{id}', 'PostController@update');
Route::get('/post/delete/{id}', 'PostController@delete');
Route::get('/post/message', 'MessageController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
