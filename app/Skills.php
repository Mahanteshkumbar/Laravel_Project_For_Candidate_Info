<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'skill','efficiency','yoe','users_id'
    ];	

    // public function Users(){
    // 	return $this->belongsTo('App\User','users_id');
    // }
}
