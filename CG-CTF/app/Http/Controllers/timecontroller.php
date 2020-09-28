<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\time;
use App\Jobs\gamestart;
use Carbon\Carbon;
use App\User;
use App\challenge;
class timecontroller extends Controller
{
    public function index(){
    	return view('manage');
    }
    public function over(){
    	if(User::isadmin()){
    	$challenges=challenge::where([])->update(['info' => 'over']);
    	DB::table('jobs')->truncate();
        return '比赛结束！！！';
    	}
    	else return redirect()->route('login');	
    }

    public function GameStartNow()
    {   
        if(User::isadmin()){
        $challenges=challenge::where([])->update(['info' => 'start']);
        DB::table('jobs')->truncate();
        return 'Game Start!';
        }
        else return redirect()->route('login'); 
    }
    public function gamestart(Request $data){
    	//$min=$data['min'];
        if(User::isadmin()){
        $starttime = Carbon::createFromFormat('Y-m-d H:i:s', $data->get('starttime'));
        $endtime = Carbon::createFromFormat('Y-m-d H:i:s', $data->get('endtime'));
        $now = Carbon::now();
        if($starttime < $now) $starttime = $now;
        if($endtime < $starttime) $endtime = $starttime; 

    	$startjob =(new gamestart())->delay($starttime);
    	$job = (new time())->delay($endtime);
        DB::table('jobs')->truncate();
        dispatch($startjob);
        dispatch($job);
        $mess = 'Game will start at '.$starttime->toDateTimeString().' end at '.$endtime->toDateTimeString();
        return $mess;


    	}
    	else return redirect()->route('login');
    }
}
