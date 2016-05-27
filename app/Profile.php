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

    public function user(){
     return $this->belongsTo('App\User');
    }
}
