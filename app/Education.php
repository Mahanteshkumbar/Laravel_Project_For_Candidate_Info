<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
         'name_of_university','course','aggregate','users_id'
    ];	

    public function user(){
     return $this->belongsTo('App\User');
    }
}
