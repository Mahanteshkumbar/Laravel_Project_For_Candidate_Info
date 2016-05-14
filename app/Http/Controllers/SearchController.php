<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SearchCreateRequest;
use App\Jobpost;

class SearchController extends Controller
{
    //
     public function show(SearchCreateRequest $request){     	
     	$jobList = Jobpost::where('Job_title', '=', $request->get('keywords'))->get();
        return view('shome',compact('jobList')); 
    }
}
