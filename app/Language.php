<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Language',
  		'Level_of_fluency'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
