<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class challenge extends Model
{
    //
    protected $table = 'Challenges';
    protected $fillable = ['title', 'class', 'description', 'url', 'flag', 'info', 'score'];
    protected $hidden = ['flag'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'challenge_users', 'challengeid', 'userid')->withPivot('created_at');
    }

    //返回某题目解决的用户
    public static function solvedusers($challengeid)
    {
        $challenge = challenge::find($challengeid);
        $users = $challenge->users()->get();
        $sorted = $users->sortBy('pivot.created_at');
        return $sorted->values();
    }
}