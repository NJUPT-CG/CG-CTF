<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','power','finishedchallenge'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function isadmin(){
        if(Auth::check()){
            if(Hash::check('admin',Auth::user()->power)) return true;
            else return false;
            }
        else return false;
    }

    public function challenges()
    {
    return $this->belongsToMany('App\challenge','challenge_users','userid','challengeid')->withPivot('created_at');
    }

    //返回某用户解决的题目
    public static function solvedchallenges($userid){
    $user = User::find($userid);
    $challenges = $user->challenges()->get();
    $sorted = $challenges->sortByDesc('pivot.created_at');
    return $sorted->values();
    #return $challenges;
    }

    //用户得分
    public static function userscore($id){
            $solveds=User::solvedchallenges($id);
            #echo $solveds;
            $totalScore=0;
            foreach ($solveds as $solved ) {
                 $totalScore+=$solved->score;
            }   
            return $totalScore;
    }

    //计分板
    public static function scoreboard(){
        $scores=collect([]);
        $users = User::all();
        foreach ($users as $user ) {
            #echo $user;
            $id = $user->id;
            $name = $user->name;
            $totalScore = User::userscore($id); 
            $subs = User::solvedchallenges($id)->first();
            #$subs = collect([$subs]);
            #$time = $subs->first();
            $lastsubtime = $subs['pivot']['created_at'];
            #pivot['created_at'];
            $scores->push(array('id'=>$id,'name'=>$name,'totalScore'=>$totalScore,'lastsubtime'=>$lastsubtime));
            #echo $totalScore;
            #echo '<br>';
            #$user->put('totalScore',$totalScore);
        }
        //echo $scores;
        //$sorted = $scores->sortBy('lastsubtime')->sortByDesc('totalScore');
        $sorted = $scores->sort(
                    function ($a, $b) {
                    return strcmp($b['totalScore'], $a['totalScore']) ?:strcmp($a['lastsubtime'], $b['lastsubtime']);
                     }
        );
        
        return $sorted->values();
    }
/*
    public function finishChallenge($id){
        if (Auth::check())
        {
            Auth::user()->finishedchallenge;
        }
        else return false;
    }
*/
}
