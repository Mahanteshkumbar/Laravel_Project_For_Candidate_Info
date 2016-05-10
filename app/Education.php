<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name_of_university','course','aggregate','profiles_id'
    ];	

    public function Profile(){
    	return $this->belongsTo('App\Profile','profiles_id');
    }
}
