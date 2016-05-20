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

    //related to middleware Demo
    public function isMan(){
        return true;
    }

    public function Profile(){
       return $this->belongsTo('App\Profile');
    }

    public function education(){
        return $this->belongsTo('App\Education');
    }

    public function Language(){
        return $this->belongsTo('App\Language');
    }

    public function Experience(){
        return $this->belongsTo('App\Experience');
    }

    public function Skill(){
        return $this->belongsTo('App\Skill');
    }

    public function Jobpost(){
        return $this->belongsTo('App\Jobpost');
    }

    public function Images(){
        return $this->belongsTo('App\Images');
    }    
}
