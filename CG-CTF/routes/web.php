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
    return redirect()->route('login');
});
Route::get('/user','UserController@index');
//Route::post('/user/login','UserController@login');
Route::get('/user/logout','UserController@logout');

Auth::routes();
Route::get('/create','ChallengeController@index');
Route::post('/newchallenge','ChallengeController@newchallenge');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit/{id}','ChallengeController@edit');
Route::post('/editchallenge/{id}','ChallengeController@editchallenge');

// 计分板测试
Route::get('/scoreboard',function(){

	$users=App\User::scoreboard();
	
	$rank=0;
	foreach ($users as $user ) {

		$rank++;
		echo $rank.' :   ';
		echo $user['name'];
		echo '   ';
		echo $user['totalScore'];
		echo '    ';
		echo $user['lastsubtime'];
		echo '<br>';

		# code...
	}
});

Route::get('/score',function(){
	if(Auth::check()){
		$id=Auth::id();
		echo Auth::user()->name;
		echo '<br>';
		$score = App\User::userscore($id);
		echo "Score: ";
		echo $score;
		echo '<br>';
		echo 'Solved Challenges:';
		echo '<br>';
		$challenges = App\User::solvedchallenges($id);
		foreach ($challenges as $challenge) {
			echo $challenge['title'];
			echo '  ';
			echo $challenge['score'];
			echo '  ';
			echo $challenge['pivot']['created_at'];
			echo '<br>';
		}
	}
	else return redirect()->route('login');

});


//用于临时创建管理员,测试用的.
Route::get('/createadmin',function(){
       return App\User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('12345678'),
            'power' => bcrypt('admin'),
        ]);
});

Route::get('challenges/{fields}','ChallengeController@showChallenges');   //展示对应版块题目


Route::post('submitflag/{id}', 'ChallengeController@submitFlag');