<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class challenge extends Model
{
    //
    protected $table='Challenges';
    protected $fillable=['title','class','description','url','flag','info','score'];

    public function users()
    {
    return $this->belongsToMany('App\User');
    }

    //返回某题目解决的用户
    public function solvedusers($challengeid){
    $challenge = $this->find($challengeid);
	$users = $challenge->users;
	return $users;
	}
}
