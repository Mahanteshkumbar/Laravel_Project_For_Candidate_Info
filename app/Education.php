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
         'name_of_university','course','aggregate','users_id'
    ];	

    // public function Users(){
    //  return $this->belongsTo('App\Users','users_id');
    // }
}