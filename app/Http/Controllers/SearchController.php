<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SearchCreateRequest;
use App\Jobpost;

class SearchController extends Controller
{
    //
     public function show(SearchCreateRequest $request){     	
     	//$jobList = Jobpost::where('Job_title', '=', $request->get('keywords'))->get();
     	$keywordss = $request->get('keywords');

     	$vl = explode(' ',$keywordss);
     	$temp_array = [];
     	
     	if(count($vl)> 2){
	     	foreach ($vl as $key => $value) {
	     		$jobList = Jobpost::orWhere('Job_description', 'like','%'.$value.'%')
                        ->orWhere('Job_qualification', 'like', '%'.$value.'%')
            ->get();
            	array_push($temp_array,$jobList);
            	print_r($jobList);
	     	}
	     	//var_dump($temp_array);
	     }else{
	     	$jobList = Jobpost::where('Job_cmpny_name', 'like', '%'.$request->get('keywords').'%')
	            ->orWhere('Job_title', 'like', '%'.$request->get('keywords').'%')
	            ->orWhere('location', 'like','%'.$request->get('keywords').'%')
	                    ->orWhere('Job_description', 'like','%'.$request->get('keywords').'%')
	                     ->orWhere('Job_post_date', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('job_salary', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Employment_type', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Contract_type', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Industry', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Function', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Job_experience1', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Job_experience2', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Job_type', 'like', '%'.$request->get('keywords').'%')
	                     ->orWhere('Job_qualification', 'like', '%'.$request->get('keywords').'%')
	            ->get();
        }

        return view('shome',compact('jobList')); 
    }
}
