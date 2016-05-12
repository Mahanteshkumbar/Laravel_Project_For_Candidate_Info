<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{
    //
    protected $fillable = [
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

    // public function Users(){
    // 	return $this->belongsTo('App\Users','users_id');
    // }
}
