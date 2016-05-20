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
     	
     	if(count($vl)> 1){
	     	foreach ($vl as $key => $value) {
	     		$jobList = Jobpost::where('Job_cmpny_name', 'like', '%'.$value.'%')
                ->orWhere('Job_title', 'like', '%'.$value.'%')
                ->orWhere('location', 'like','%'.$value.'%')
                        ->orWhere('Job_description', 'like','%'.$value.'%')
                         ->orWhere('Job_post_date', 'like', '%'.$value.'%')
                         ->orWhere('job_salary', 'like', '%'.$value.'%')
                         ->orWhere('Employment_type', 'like', '%'.$value.'%')
                         ->orWhere('Contract_type', 'like', '%'.$value.'%')
                         ->orWhere('Industry', 'like', '%'.$value.'%')
                         ->orWhere('Function', 'like', '%'.$value.'%')
                         ->orWhere('Job_experience1', 'like', '%'.$value.'%')
                         ->orWhere('Job_experience2', 'like', '%'.$value.'%')
                         ->orWhere('Job_type', 'like', '%'.$value.'%')
                         ->orWhere('Job_qualification', 'like', '%'.$value.'%')
            ->get();
            	//array_push($temp_array,$jobList);
            	//print_r($jobList);
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

    public function advanceshow(Request $request){
    	//split values of mutiple location and give a search
        $jobList = [];
        $res1 = explode(" ", $request->get('location'));
        $jobList = Jobpost::whereIn('location', $res1)
                             ->Where('job_salary', 'like', '%'.$request->get('job_salary').'%')
                           ->where('Job_title', '=', $request->get('Job_title'))
                            ->where('Contract_type', '=', $request->get('Contract_type'))
                            ->get();

        return view('shome',compact('jobList'));

        //Optional search
    	if($request->get('location') || $request->get('Job_title') || $request->get('job_salary') || $request->get('Contract_type')){
    		
    		$res1 = explode(" ", $request->get('location'));
    		$res2 = explode(" ", $request->get('Job_title'));

            if($request->get('location')){
        		if(count($res1)==1){
    	    		//foreach ($res1 as $key => $value) {
    	    			# code...
    	    		$jobs = Jobpost::where('location', '=', $request->get('location'))
                            ->orWhere(function ($query) use ($request) {
                                $query->where('location', '=', $request->get('location'))
                                ->where('Job_title', '=', $request->get('Job_title'));
                            })->get();

                                //return $jobs;
    			    foreach ($jobs as $key => $value) {
    					array_push($jobList, $value);
    	    		}
    	    	}
                if(count($res1)>1){
    	    		$jobs = Jobpost::whereIn('location', $res1)
                    ->orWhere(function ($query) use ($request) {
                                $query->where('location', '=', $request->get('location'))
                                ->where('Job_title', '=', $request->get('Job_title'));
                            })
    			    			->get();
                                //return $jobs;
    				foreach ($jobs as $key => $value) {                        
    					array_push($jobList, $value);
    	    		}
    	    		//return $jobList;
    	    	}
            }

           if ($request->get('Job_title')) {
    	    	if(count($res2)==1){
    	    		//foreach ($res1 as $key => $value) {
    	    			# code...
    	    		$jobs = Jobpost::where('Job_title', 'like', '%'.$request->get('Job_title').'%')
    			    			->get();
    			    foreach ($jobs as $key => $value) {
    					array_push($jobList, $value);
    	    		}
    	    	}
                if(count($res2)>1){   
    	    		$jobs = Jobpost::whereIn('Job_title', $res2)
    			    			->get();
    				foreach ($jobs as $key => $value) {
    					array_push($jobList, $value);
    	    		}
    	    		//return $jobList;
    	    	}
            }

    		if($request->get('job_salary')){
    			//echo "string";
    			$jobs = Jobpost::where('job_salary','=',$request->get('job_salary'))->get();

    			foreach ($jobs as $key => $value) {
					array_push($jobList, $value);
	    		}
    		}

    		if($request->get('Contract_type')){
    			$jobs = Jobpost::where('Contract_type','like','%'.$request->get('Contract_type').'%')->get();
                foreach ($jobs as $key => $value) {
                    array_push($jobList, $value);
                }
    		}

    		
    		//return view('shome',compact('jobList'));
    		//return compact('jobList');
    	}
        $jobList = array_unique($jobList);
    	return view('shome',compact('jobList'));
    }
}
