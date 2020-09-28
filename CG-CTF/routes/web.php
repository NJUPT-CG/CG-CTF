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

Auth::routes(['verify' => true]);
Route::get('/create', 'ChallengeController@index');
Route::post('/newchallenge', 'ChallengeController@newchallenge');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit/{id}', 'ChallengeController@edit');
Route::post('/editchallenge/{id}', 'ChallengeController@editchallenge');
Route::get('/profile','UserController@profile')->middleware('verified');
Route::post('/ProfileEdit','UserController@ProfileEdit')->middleware('verified');
Route::delete('/delete/{id}','ChallengeController@delete');
Route::get('/userDetail','UserController@detailIndex')->middleware('verified');
Route::get('/history','ChallengeController@historyIndex');
Route::get('/gamemanage','timecontroller@index');
Route::get('gameover','timecontroller@over');
Route::post('time','timecontroller@gamestart');
Route::get('gamestartnow','timecontroller@GameStartNow');
// 计分板测试
Route::get('/scoreboard', 'ChallengeController@scoreboardIndex');

Route::get('/score', 'ChallengeController@ShowScore')->middleware('verified');

Route::get('about',function(){return view('about');});

Route::get('rules',function(){return view('rules');});

Route::get('rules_en',function(){return view('rulesen');});

Route::get('publishNotice','NoticeController@index');

Route::post('newNotice','NoticeController@newnotice');

Route::get('notice','NoticeController@showNotice')->name('notice');

Route::get('notice/edit/{id}','NoticeController@editIndex');

Route::post('editNotice/{id}','NoticeController@edit');

Route::delete('deleteNotice/{id}','NoticeController@delete');

Route::get('challenges', 'ChallengeController@showChallenges')->name('challenge')->middleware('verified'); //展示对应版块题目

Route::post('submitflag/{id}', 'ChallengeController@submitFlag')->middleware('verified');

#Route::get('/test', 'ChallengeController@getQuestionsBelongsToClass');

Route::get('IN1t4dmin_Cg_c7f_X1c_+1s',function(){return view('regadmin');});

Route::post('regadmin','UserController@regadmin');
Route::get('scoreboardupdateall','UserController@updateAll');
//Route::get('scoretest',function(){
	// 	$challenges=App\challenge::all();
	// 	foreach ($challenges as $challenge => $value) {
	// 		//$challenges[$challenge]->solversCount = $challenges[$challenge]->users()->count();
	// 		$cont=$challenges[$challenge]->users()->count();
	// 		if($cont){
	// 		$challenges[$challenge]->score=10000/($cont+9);
	// 		$challenges[$challenge]->save();
	// 		}
	// 	}
	// });

