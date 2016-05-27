<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    
    protected $fillable = [
         'skill','efficiency','yoe','users_id'
    ];	

    public function user(){
     return $this->belongsTo('App\User');
    }
}
