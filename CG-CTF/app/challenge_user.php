<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class challenge_user extends Model
{
    //
    protected $table='challenge_users';
    protected $fillable=['userid','challengeid','rank'];
}
