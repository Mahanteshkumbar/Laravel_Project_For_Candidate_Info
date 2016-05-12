<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Profile(){
       return $this->belongsTo('App\Profile','users_id');
    }

    public function Education(){
        return $this->belongsTo('App\Education','users_id');
    }

    public function Language(){
        return $this->belongsTo('App\Language','users_id');
    }

    public function Experience(){
        return $this->belongsTo('App\Education','users_id');
    }

    public function Skill(){
        return $this->belongsTo('App\Skill','users_id');
    }

    public function Jobpost(){
        return $this->belongsTo('App\Jobpost','users_id');
    }

    public function Images(){
        return $this->belongsTo('App\Images','users_id');
    }    
}
