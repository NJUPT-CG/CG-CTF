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

Route::get('/', function(){
    return view('CG-CTF');
});
Route::get('/user','UserController@index');
//Route::post('/user/login','UserController@login');
Route::get('/user/logout','UserController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
