<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //
    protected $fillable = [
    	'imagepath','users_id'
    ];

    public function user(){
     return $this->belongsTo('App\User');
    }
}
