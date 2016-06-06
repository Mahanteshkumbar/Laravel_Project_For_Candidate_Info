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

    /*
    * One To Many relationships
    */

    public function Profile(){
       return $this->hasMany('App\Profile','users_id');
    }

    public function Education(){
        return $this->hasMany('App\Education','users_id');
    }

    public function Language(){
        return $this->hasMany('App\Language','users_id');
    }

    public function Experience(){
        return $this->hasMany('App\Experience','users_id');
    }

    public function Skills(){
        return $this->hasMany('App\Skills','users_id');
    }

    public function Jobpost(){
        return $this->hasMany('App\Jobpost','users_id');
    }

    public function Images(){
        return $this->hasMany('App\Images','users_id');
    }

    public function Awards(){
        return $this->hasMany('App\Awards','users_id');
    }

    public function Hobby(){
        return $this->hasMany('App\Hobby','users_id');
    }

    public function Filemodel(){
        return $this->hasMany('App\Filemodel','users_id');
    } 
    
    public function Tag(){
        return $this->belongsToMany('App\Tag');
    } 

    public function Admin(){
        return $this->belongsToMany('App\Admin');
    }    
}
