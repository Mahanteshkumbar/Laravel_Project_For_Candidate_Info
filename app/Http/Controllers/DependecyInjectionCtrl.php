<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\DependecyInjection;

class DependecyInjectionCtrl extends Controller
{
    //
    private $dp;
    public function dashboard(DependecyInjection $dp){
    	dd($dp);    	
    }

    //create constructor function and inject the Model Object
    // public function __construct(DependecyInjection $dp){
    //  	//$dp->mm();
    //  	$this->dp = $dp;    	
    // }
}
