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

Route::get('/', 'HomeController@index');

Route::get('/admin', 'HomeController@admin');

Route::get('/login', 'HomeController@login');

Route::get('/registration', 'HomeController@registration');




Route::get('/profile', 'MainController@profile' );




Route::get('/show/{id}', 'MainController@show');

Route::get('/edit/{id}', 'MainController@edit');

Route::post('/update/{id}', 'MainController@update');

Route::get('/delete/{id}', 'MainController@delete');

Route::post('/editprofile', 'MainController@editprofile');
