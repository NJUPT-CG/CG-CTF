<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    protected $table = 'notice';
    protected $fillable = ['content','remember_token'];
    protected $hidden = ['remember_token'];
}
