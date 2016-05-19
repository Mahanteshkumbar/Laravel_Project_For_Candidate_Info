<?php
use App\User;
use App\Profile;
use App\Language;
use App\Experience;
use App\Education;
use App\Skills;
use App\Jobpost;
use App\Images;
use App\Hobby;
use App\Filemodel;
use App\Awards;

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

		//Eloquent relationships one to many
		// $edu = Education::all();
		// // Blade template
		// foreach($edu as $e){
		// 	return $e->users;
		// }

		$skills_info = Skills::where('users_id', '=', Auth::user()->id)->get();

		$Jobpost_info = Jobpost::where('users_id', '=', Auth::user()->id)->get();

		$Image_path = Images::where('users_id', '=', Auth::user()->id)->get();

		$File_path = Filemodel::where('users_id','=', Auth::user()->id)->get();

		$hobby_info = Hobby::where('users_id','=', Auth::user()->id)->get();

		$award_info = Awards::where('users_id','=', Auth::user()->id)->get();

    	return view('welcome',compact('candidate_details','languages_info','experience_info','education_info','skills_info','Jobpost_info','Image_path','File_path','hobby_info','award_info'));
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
	$experience_info = Experience::where('users_id', '=', Auth::user()->id)->get();
		
	return view('workexperience',compact('experience_info'));
});
//Route::get('/candidate/experience', 'ExperienceController@show');
Route::get('/candidate/experience/{id}', 'ExperienceController@edit');
Route::put('/candidate/experience/{id}', 'ExperienceController@editlang');
Route::delete('/candidate/del/experience/{id?}', 'ExperienceController@deletelang');
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

//Hobby
Route::get('/candidate/hobby', 'HobbyController@show');
Route::get('/candidate/hobbyview', function(){
	//$candidate_details = Reguser::All();
	//$candidate_details = Reguser::All();	
	return view('hobby');
});
Route::get('/candidate/hobby/{id}', 'HobbyController@edit');
Route::put('/candidate/hobby/{id}', 'HobbyController@editlang');
Route::delete('/candidate/del/hobby/{id}', 'HobbyController@deletelang');
Route::post('/candidate/hobby', 'HobbyController@store');

//Image upload
//Route::get('/candidate/imageupload', 'ImageController@show');
Route::get('/candidate/imageuplview', function(){
	//$candidate_details = Reguser::All();
	return view('imageupload');
});
Route::get('/candidate/imageupload/{id}', 'ImageController@edit');
Route::put('/candidate/imageupload/{id}', 'ImageController@editlang');
Route::delete('/candidate/del/imageupload/{id}', 'ImageController@deletelang');
Route::post('/candidate/imageupload', 'ImageController@store');

//File upload
//Route::get('/candidate/imageupload', 'ImageController@show');
Route::get('/candidate/fileuplview', function(){
	//$candidate_details = Reguser::All();
	return view('fileupload');
});
Route::get('/candidate/fileupload/{id}', 'FilemodelController@edit');
Route::put('/candidate/fileupload/{id}', 'FilemodelController@editlang');
Route::delete('/candidate/del/fileupload/{id}', 'FilemodelController@deletelang');
Route::post('/candidate/fileupload', 'FilemodelController@store');

//Hobby
Route::get('/candidate/award', 'AwardsController@show');
Route::get('/candidate/awardview', function(){
	return view('award');
});
Route::get('/candidate/award/{id}', 'AwardsController@edit');
Route::put('/candidate/award/{id}', 'AwardsController@editlang');
Route::delete('/candidate/del/award/{id}', 'AwardsController@deletelang');
Route::post('/candidate/award', 'AwardsController@store');


//Search Job
Route::post('/candidate/searchjob', 'SearchController@show');
Route::post('/candidate/advancejobsearch', 'SearchController@advanceshow');
Route::get('/candidate/searchjobview', function(){
	$jobList = Jobpost::All();		
	return view('search',compact('jobList'));
});

Route::get('/jobview/{id?}', function($id){
	$jobLists = Jobpost::findorFail($id);		
	return view('viewjob',compact('jobLists'));
	//return $jobList;
});