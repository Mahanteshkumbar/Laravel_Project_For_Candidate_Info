<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Company_name', 
		  'Start_year', 
		  'End_year', 		  
		  'Designation',
		  'Exp_summary',
          'users_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    // public function Users(){
    //  return $this->belongsTo('App\User','users_id');
    // }
}
