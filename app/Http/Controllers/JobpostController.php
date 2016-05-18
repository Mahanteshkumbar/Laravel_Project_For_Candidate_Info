<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jobpost;

use Auth;

class JobpostController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Jobpost::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Jobpost::findOrFail($id);
        return view('updatejobpost',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Jobpost::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }       

	//'Jobpost','efficiency','yoe',
    public function store(Request $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Jobpost::create([
            'Job_cmpny_name' => $request->get('Job_cmpny_name'),
            'location' => $request->get('location'),
        	'Job_title' => $request->get('Job_title'),
	        'Job_description' => $request->get('Job_description'),		
			'Job_post_date' => $request->get('Job_post_date'),
			'Job_expiry_date' => $request->get('Job_expiry_date'),
			'job_salary' => $request->get('job_salary'),
	       	'Employment_type' => $request->get('Employment_type'),
			'Contract_type' => $request->get('Contract_type'),
			'Industry' => $request->get('Industry'),
		    'Function' => $request->get('Function'),     	
			'Job_experience1' => $request->get('Job_experience1'),
			'Job_experience2' => $request->get('Job_experience2'),
	        'Job_type' => $request->get('Job_type'),
	        'Job_qualification' => $request->get('Job_qualification'),        
        	'users_id' => Auth::user()->id]);
        	return view('home');
    }


     public function editlang($id, Request $request){
        $task = Jobpost::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Jobpost::findOrFail($id);
        $task->delete();
        return view('home');

     }
}
