<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filemodel extends Model
{
    //
    protected $fillable = [
    	'filepath','users_id'
    ];
}
