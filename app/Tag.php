<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['Name'];

    /**
    * Awards and Tag model = awards_tag pivot table 
    *
    */

    public function Awards(){
     	return $this->belongsToMany('App\Awards')->withTimestamps();
    }
}
