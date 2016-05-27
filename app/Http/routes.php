<?php
use App\Profile;
use App\Hobby;
use App\Experience;
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

Route::auth();
 Route::get('/', function () {	
	if(Auth::user()){
		$candidate_details = Profile::findorFail(Auth::user()->id);

		/*
		* One To Many relationships
		*/
		$languages_info =  Auth::user()->Language;
		$education_info = Auth::user()->Education;
		$experience_info = Auth::user()->Experience;//Experience::where('users_id', '=', Auth::user()->id)->get();
		$skills_info = Auth::user()->Skills;//Skills::where('users_id', '=', Auth::user()->id)->get();
		$Jobpost_info = Auth::user()->Jobpost;//Jobpost::where('users_id', '=', Auth::user()->id)->get();
		$Image_path = Auth::user()->Images;//Images::where('users_id', '=', Auth::user()->id)->get();
		$File_path = Auth::user()->Filemodel;//Filemodel::where('users_id','=', Auth::user()->id)->get();
		$hobby_info = Auth::user()->Hobby;//Hobby::where('users_id','=', Auth::user()->id)->get();
		$award_info = Auth::user()->Awards;//Awards::where('users_id','=', Auth::user()->id)->get();
    	return view('welcome',compact('candidate_details','languages_info','experience_info','education_info','skills_info','Jobpost_info','Image_path','File_path','hobby_info','award_info'));
	}else{
		return view('welcome');
	}
});
//protecting route from direct access for web users multiple user login
Route::group(['middleware' => 'admin'], function () {

	Route::group(['middleware' => 'auth:admin'], function () {	
		Route::get('/admin','AdminController@index');	
	});
	Route::get('/admin/login','AdminController@login');
	Route::post('/admin/login','AdminController@postlogin');

 	// Registration Routes...
    Route::get('/admin/register', 'AdminController@showRegistrationForm');
    Route::post('/admin/register', 'AdminController@register');

    Route::get('/admin/logout', 'AdminController@logout');
});

//protecting route from direct access for auth users
Route::group(['middleware' => 'auth'], function () {  
   

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
Route::put('/candidate/profile/{id}', 'HomeController@editlang');
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
Route::get('/candidate/education/trashed/{id}','EducationController@showTrashed');
Route::get('/candidate/education/restoretrashed/{id}','EducationController@restoreTrashed');


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
Route::get('/candidate/languages/trashed/{id}','LangaugeController@showTrashed');
Route::get('/candidate/languages/restoretrashed/{id}','LangaugeController@restoreTrashed');



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
Route::get('/candidate/experience/trashed/{id}','ExperienceController@showTrashed');
Route::get('/candidate/experience/restoretrashed/{id}','ExperienceController@restoreTrashed');


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
Route::get('/candidate/skill/trashed/{id}','SkillController@showTrashed');
Route::get('/candidate/skill/restoretrashed/{id}','SkillController@restoreTrashed');

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
Route::get('/candidate/jobpost/trashed/{id}','JobpostController@showTrashed');
Route::get('/candidate/jobpost/restoretrashed/{id}','JobpostController@restoreTrashed');


//Hobby
//Route::get('/candidate/hobby', 'HobbyController@show');
Route::get('/candidate/hobbyview', function(){
	$hobby_info = Hobby::where('users_id', '=', Auth::user()->id)->get();	
	return view('hobby',compact('hobby_info'));	
});
Route::get('/candidate/hobby/{id}', 'HobbyController@edit');
Route::put('/candidate/hobby/{id}', 'HobbyController@editlang');
Route::delete('/candidate/del/hobby/{id}', 'HobbyController@deletelang');
Route::post('/candidate/hobby', 'HobbyController@store');
Route::get('/candidate/hobby/trashed/{id}','HobbyController@showTrashed');
Route::get('/candidate/hobby/restoretrashed/{id}','HobbyController@restoreTrashed');
Route::get('/candidate/deleteall/hobby','HobbyController@deletepermanently');
Route::get('/candidate/getRequest',function(){
	if(Request::Ajax()){
		return "Ajax request on the floor";
	}
});
Route::post('/candidate/register',function(){
	if(Request::Ajax()){
		return Response::json(Request::all());
	}
});


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
Route::get('/file/download/{id}','FilemodelController@getDownload');

//Hobby
Route::get('/candidate/award', 'AwardsController@show');
Route::get('/candidate/awardview', function(){
	return view('award');
});
Route::get('/candidate/award/{id}', 'AwardsController@edit');
Route::put('/candidate/award/{id}', 'AwardsController@editlang');
Route::delete('/candidate/del/award/{id}', 'AwardsController@deletelang');
Route::post('/candidate/award', 'AwardsController@store');
Route::get('/candidate/award/trashed/{id}','AwardsController@showTrashed');
Route::get('/candidate/award/restoretrashed/{id}','AwardsController@restoreTrashed');


});//close middleware auth


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



//middleware demo this url access only if isMan set to true in User class
//this works only when user login its decalred in limited access
/* 
    * middleware may be assigned to groups or used individually.
*/
//if using route
Route::get('/dashboard',['middleware'=> 'isMan', 'uses' => 'DependecyInjectionCtrl@dashboard']);

//** if not usin route **
// Route::get('/dashboard',['middleware'=> 'isMan', function(){
// 	return 'All right!!! welcome Man!!';
// }]);
