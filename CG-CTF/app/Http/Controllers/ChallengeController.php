<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\challenge;
use App\User;


class ChallengeController extends Controller
{
    //
    public function index(){
    	if(User::isadmin()){
    		return view('create');
    	}
    	else return redirect()->route('login');
    }


    public function newchallenge(Request $data){
    	if(User::isadmin()) {
    		$data->flash();
    		$request=$data->all();

    		$add=new challenge;

    		return $add->create([ 'title'=>$request['title'],
    							  'class'=>$request['class'],
    							  'description'=>$request['description'],
    							  'url'=>$request['url'],
    							  'flag'=>$request['flag'],
    							  //'info'=>$request['info'],
                                  'score'=>$request['score'],
    							]);
    	}
    }
   
    public function edit($id){
        if(User::isadmin()){
        	$challenge=challenge::find($id);
        	return view('edit',['challenge'=>$challenge]);

        }
        else return redirect()->route('login');

    }

    public function editchallenge($id,Request $data){
    	if(User::isadmin()){
    		$data->flash();
            $request=$data->all();
    		$challenge=challenge::find($id);

    		$challenge->title=$request['title'];
    		$challenge->class=$request['class'];
    		$challenge->description=$request['description'];
    		$challenge->url=$request['url'];
    		$challenge->flag=$request['flag'];
    		//$challenge->info=$request['info'];
            $challenge->score=$request['score'];

    	   if($challenge->save()) return view('CG-CTF');
    	   else return view('edit',['status'=>'出现错误']);

    	}
    }

    public function showChallenges($fields){             //显示对应板块的题目
        $challengeInfo = challenge::where('class', $fields)->get(['id','title','description','url','info','score']);             //根据传递的板块搜索题目信息
        return view('challenge', compact('challengeInfo'));


    }
/*
    public function showChallengeDetail($id)
    {
        if (Auth::check()){
            $challengeInfo = challenge::find($id);
            return view('challengedetail', ['challenge'=>$challengeInfo]);
        }
        else return redirect()->route('login');
    }
*/
    public function submitFlag($id, Request $flag)
    {
        if (Auth::check()){             //whether login
            if (Auth::user()->where()){                      //whether finished
                $correctFlag = challenge::find($id)->flag;
                if ($flag === $correctFlag){        //whether correct

                }
                else;
            }
        }
        else return redirect()->route('login');
    }
}
