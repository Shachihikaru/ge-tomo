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
Route::get('/post/search', 'PostController@search');

Route::get('/post/profile', 'ProfileController@index');
Route::get('/profile/create', 'ProfileController@create');
Route::get('/profile/store', 'ProfileController@store');
Route::get('/profile/detail/{id}', 'ProfileController@detail');
Route::get('/profile/edit/{id}', 'ProfileController@edit');
Route::get('/profile/update/{id}', 'ProfileController@update');
Route::get('/profile/delete/{id}', 'ProfileController@delete');
Route::get('/profile/mypage', 'ProfileController@mypage');
Route::get('/profile/search', 'ProfileController@search');

Route::get('/message/{user_id}', 'MessageController@message');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/mypage', 'ProfileController@mypage');
    Route::get('/post', 'PostController@index');

});