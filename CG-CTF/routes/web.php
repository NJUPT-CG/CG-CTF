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
    return redirect()->route('login');
});
Route::get('/user', 'UserController@index');
//Route::post('/user/login','UserController@login');
Route::get('/user/logout', 'UserController@logout');

Auth::routes();
Route::get('/create', 'ChallengeController@index');
Route::post('/newchallenge', 'ChallengeController@newchallenge');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit/{id}', 'ChallengeController@edit');
Route::post('/editchallenge/{id}', 'ChallengeController@editchallenge');
Route::get('/profile','UserController@profile');
Route::post('/ProfileEdit','UserController@ProfileEdit');
Route::delete('/delete/{id}','ChallengeController@delete');
Route::get('/userDetail/{id}','ChallengeController@userDetail');

// 计分板测试
Route::get('/scoreboard', 'ChallengeController@ShowScoreBoard');

Route::get('/score', 'ChallengeController@ShowScore');

Route::get('about',function(){return view('about');});

Route::get('publishNotice','NoticeController@index');

Route::post('newNotice','NoticeController@newnotice');

Route::get('notice','NoticeController@showNotice')->name('notice');

Route::get('notice/edit/{id}','NoticeController@editIndex');

Route::post('editNotice/{id}','NoticeController@edit');

Route::delete('deleteNotice/{id}','NoticeController@delete');

Route::get('challenges', 'ChallengeController@showChallenges')->name('challenge');   //展示对应版块题目

Route::post('submitflag/{id}', 'ChallengeController@submitFlag');

Route::get('/test', 'ChallengeController@getQuestionsBelongsToClass');