<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobpost extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'Job_cmpny_name',
        'location',
		'Job_title',
        'Job_description',		
		'Job_post_date',
		'Job_expiry_date',
		'job_salary',
       	'Employment_type',
		'Contract_type',
		'Industry',
	    'Function',     	
		'Job_experience1',
		'Job_experience2',
        'Job_type',
        'Job_qualification',
        'users_id'
    ];


    public function user(){
     return $this->belongsTo('App\User');
    }
}
