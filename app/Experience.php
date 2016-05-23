<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Experience extends Model
{
    //
    use SoftDeletes;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'Company_name', 
		  'Start_year', 
		  'End_year', 		  
		  'Designation',
		  'Exp_summary',
          'users_id'
    ];

    // public function Users(){
    //  return $this->belongsTo('App\User','users_id');
    // }
}
