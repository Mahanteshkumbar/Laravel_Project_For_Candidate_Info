<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Awards extends Model
{
    //
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['award','org','year','users_id'];

     public function user(){
     return $this->belongsTo('App\User');
    }
}
