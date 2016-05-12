<?php

use App\User;
use App\Profile;
use App\Language;
use App\Experience;
use App\Education;
use App\Skills;
use App\Jobpost;
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

		$languages_info = Language::where('users_id', '=', Auth::user()->id)->get();

		$experience_info = Experience::where('users_id', '=', Auth::user()->id)->get();
		
		$education_info = Education::where('users_id', '=', Auth::user()->id)->get();

		$skills_info = Skills::where('users_id', '=', Auth::user()->id)->get();

		$Jobpost_info = Jobpost::where('users_id', '=', Auth::user()->id)->get();

    	return view('welcome',compact('candidate_details','languages_info','experience_info','education_info','skills_info','Jobpost_info'));
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
Route::get('/candidate/educationview', function(){
	//$candidate_details = Reguser::All();
	return view('education');
});
Route::get('/candidate/education', 'EducationController@show');
//Route::get('/candidate/education', 'EducationController@show');
Route::get('/candidate/education/{id}', 'EducationController@edit');
Route::put('/candidate/education/{id}', 'EducationController@editlang');
Route::delete('/candidate/del/education/{id}', 'EducationController@deletelang');
Route::post('/candidate/education', 'EducationController@store');


//langauges
Route::get('/candidate/languagesview', function(){
	//$candidate_details = Reguser::All();
	return view('language');
});
Route::get('/candidate/languages', 'LangaugeController@show');
Route::get('/candidate/languages/{id}', 'LangaugeController@edit');
Route::put('/candidate/languages/{id}', 'LangaugeController@editlang');
Route::delete('/candidate/del/languages/{id}', 'LangaugeController@deletelang');
Route::post('/candidate/languages', 'LangaugeController@store');



//Experience
Route::get('/candidate/experience', 'ExperienceController@show');
Route::get('/candidate/experienceview', function(){
	//$candidate_details = Reguser::All();
	return view('workexperience');
});
//Route::get('/candidate/experience', 'ExperienceController@show');
Route::get('/candidate/experience/{id}', 'ExperienceController@edit');
Route::put('/candidate/experience/{id}', 'ExperienceController@editlang');
Route::delete('/candidate/del/experience/{id}', 'ExperienceController@deletelang');
Route::post('/candidate/experience', 'ExperienceController@store');


//Skills
Route::get('/candidate/skill', 'SkillController@show');
Route::get('/candidate/skillview', function(){
	//$candidate_details = Reguser::All();
	return view('skill');
});
Route::get('/candidate/skill/{id}', 'SkillController@edit');
Route::put('/candidate/skill/{id}', 'SkillController@editlang');
Route::delete('/candidate/del/skill/{id}', 'SkillController@deletelang');
Route::post('/candidate/skill', 'SkillController@store');

//Jobpost
Route::get('/candidate/jobpost', 'JobpostController@show');
Route::get('/candidate/jobpostview', function(){
	//$candidate_details = Reguser::All();
	return view('jobpost');
});
Route::get('/candidate/jobpost/{id}', 'JobpostController@edit');
Route::put('/candidate/jobpost/{id}', 'JobpostController@editlang');
Route::delete('/candidate/del/jobpost/{id}', 'JobpostController@deletelang');
Route::post('/candidate/jobpost', 'JobpostController@store');


//Image upload
//Route::get('/candidate/imageupload', 'ImageController@show');
Route::get('/candidate/imageuplview', function(){
	//$candidate_details = Reguser::All();
	return view('imageupload');
});
// Route::get('/candidate/imageupload/{id}', 'ImageController@edit');
// Route::put('/candidate/imageupload/{id}', 'ImageController@editlang');
//Route::delete('/candidate/del/imageupload/{id}', 'ImageController@deletelang');
Route::post('/candidate/imageupload', 'ImageController@store');