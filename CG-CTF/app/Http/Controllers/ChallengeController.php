<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\challenge;
use App\User;
class ChallengeController extends Controller
{
    //
    public function index(){
    	if(User::isadmin()){
    		return view('create');
    	}
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
    							]);
    	}
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
    		$challenge->info=$request['info'];

    		return $challenge->save();

    	}
    }
}
