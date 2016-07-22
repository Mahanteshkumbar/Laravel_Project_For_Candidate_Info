<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    /*
    * For any model that you want to keep a revision history for, 
    * include the revisionable namespace and use the RevisionableTrait in your model,
    * e.g., If you are using another bootable trait the be sure to 
    * override the boot method in your mode
    */
    use \Venturecraft\Revisionable\RevisionableTrait;
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
