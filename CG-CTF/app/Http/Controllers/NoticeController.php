<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\notice;

class NoticeController extends Controller
{
	public function index()
    {
        if (User::isadmin()) {
            return view('publishNotice');
        } else return redirect()->route('login');
    }

    public function newnotice(Request $data)
    {
        if (User::isadmin()) {
            $data->flash();
            $request = $data->all();
            $add = new notice;
            $r=$add->create(['content' => $request['content'],
            				 'remember_token' => str_random(60),
            				  ]);
            if($r) return redirect()->route('home');
            else return view('publishNotice', ['status' => '出现错误']);
        }
        else return redirect()->route('login');
    }
    public function showNotice(){
    	$notices=notice::where([])->orderBy('created_at','desc')->paginate(20);
    	return view('notice',['notices'=>$notices]);
    }
}
