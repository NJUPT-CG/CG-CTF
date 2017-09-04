<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/challenge/{challenge}', function (\App\challenge $challenge) {
    return [
        'id' => $challenge->id,
        'title' => $challenge->title,
        'score' => $challenge->score
    ];
});

// 获取分类所有试题
Route::get('/challenges', function (Request $request) {
    return \App\challenge::where('class', $request->get('class'))
        ->select('id', 'title', 'score')
        ->get();
});
// 获取试题详细信息
Route::get('/challenge/detail/{challenge}', function (\App\challenge $challenge) {
    return [
        'description' => $challenge->description,
        'url' => $challenge->url,
        'class' => $challenge->class
    ];
});

Route::post('/challenge/{challenge}', function (\App\challenge $challenge, Request $request) {
    return $challenge->flag === $request->get('flag') ? 'true' : 'false';
})->middleware('auth:api');
