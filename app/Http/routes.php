<?php

use App\User;
use App\Profile;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {	
	if(Auth::user()){
		$candidate_details = Profile::findorFail(Auth::user()->id);
    	return view('welcome',compact('candidate_details'));
	}else{
		return view('welcome');
	}
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/register/candidate', function () {
    return view('candreg');
});

Route::get('/candidate/profile', function(){
	//$candidate_details = Reguser::All();
	return view('profileform');
});

//profile
Route::get('/candidate/profile/{id}', 'HomeController@accessEdit');
////Route::post('/candidate/profile/{id}', 'HomeController@edit');
//Route::put('/candidate/profile/{id}', 'HomeController@edit');
//Route::delete('/candidate/profile/{id}', 'HomeController@edit');

//education
Route::get('/candidate/education', 'EducationController@show');

//langauges
Route::get('/candidate/languages', 'LangaugesController@show');


//Experience
Route::get('/candidate/experience', 'ExperienceController@show');
Route::get('/candidate/experienceview', function(){
	//$candidate_details = Reguser::All();
	return view('workexperience');
});

//Skills
Route::get('/candidate/skill', 'SkillController@show');