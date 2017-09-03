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

// 计分板测试
Route::get('/scoreboard', 'ChallengeController@ShowScoreBoard');

Route::get('/score', 'ChallengeController@ShowScore');


//用于临时创建管理员,测试用的.
Route::get('/createadmin', function () {
    return App\User::create([
        'name' => 'test',
        'email' => 'test@test.com',
        'password' => bcrypt('12345678'),
        'power' => bcrypt('admin'),
    ]);
});

Route::get('challenges/{fields}', 'ChallengeController@showChallenges')->name('challenge');   //展示对应版块题目

Route::post('submitflag/{id}', 'ChallengeController@submitFlag');

Route::get('/test', function () {
    return factory(App\User::class, 100)->create();
});

Route::get('/createChallenges', function () {
    return factory(App\challenge::class, 100)->create();
});
