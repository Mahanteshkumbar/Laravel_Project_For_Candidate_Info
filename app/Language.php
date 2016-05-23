<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Language extends Model
{
    //
    use SoftDeletes;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Language',
  		'Level_of_fluency',
        'users_id'
    ];

    protected $dates = ['deleted_at'];
    // public function Users(){
    //  return $this->belongsTo('App\Users','users_id');
    // }
}
