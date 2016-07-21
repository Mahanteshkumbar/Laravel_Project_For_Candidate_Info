<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Hobby extends Model
{
    //
    use AuditingTrait;
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    // Disables the log record after 10 records.
    //protected $historyLimit = 10;

    /*
    * Tracking changes hobbies table and updating views
    * depending on the changes in the database
    *
    */
    //Custom message for hobbiies
    public static $logCustomMessage = '{user.name|Anonymous} {type} a hobby {elapsed_time}'; // with default value
    
    public static $logCustomFields = [
        'type' => '{type}',
        'name'  => 'The name was defined as {owner.hname}', // with callback method       
    ];

    protected $dates = ['deleted_at'];

    protected $fillable = ['hname','users_id'];

    public function user(){
     return $this->belongsTo('App\User');
    }
}
