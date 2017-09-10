<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// 获取分类所有试题
Route::get('/challenges', 'ChallengeController@getQuestionsBelongsToClass');

// 获取试题详细信息
Route::get('/challenge/detail/{challenge}', 'ChallengeController@getQuestionDetail');

// 验证flag
Route::post('/challenge/{challenge}', 'ChallengeController@submitFlag')->middleware('auth:api');

// 删除challenge
Route::delete('/challenge/{challenge}', 'ChallengeController@deleteChallenge')->middleware('auth:api');

// 获取已解决的用户信息
Route::get('/challenge/solvers/{challenge}', 'ChallengeController@getSolvers');