<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class challenge extends Model
{
    //
    protected $table='Challenges';
    protected $fillable=['title','class','description','url','flag','info'];
}
