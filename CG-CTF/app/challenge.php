<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class challenge extends Model
{
    //
    protected $table='challenges';
    protected $fillable=['title','class','description','url','flag','info','score'];


}
