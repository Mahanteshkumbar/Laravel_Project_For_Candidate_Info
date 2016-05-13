<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    //
    protected $fillable = ['award','org','year','users_id'];
}
