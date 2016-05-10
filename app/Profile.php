<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name','lname','uname','mnum','dob','status','country','email','addrno','state','city','users_id'
    ];	

    public function User(){
    	return $this->belongsTo('App\User','users_id');
    }

    public function Education(){
        return $this->belongsTo('App\Education','profiles_id');
    }

}
