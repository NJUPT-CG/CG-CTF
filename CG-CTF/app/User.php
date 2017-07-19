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
    return $this->belongsToMany('App\challenge');
    }

    //返回某用户解决的题目
    public function solvedchallenges($userid){
    $user = $this->find($userid);
    $challenges = $user->challenges;
    return $challenges;
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
