<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Filemodel;
use Auth;
use App\Http\Requests;
use App\Http\Requests\FilemodelCreateRequest;

class FilemodelController extends Controller
{
    //
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Filemodel::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Filemodel::findOrFail($id);
        return view('updatefileupload',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Filemodel::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    public function store(Request $request){  
     // return pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);


    	$imageName = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $request->file('file')->getClientOriginalExtension();
	    $getpath = $request->file('file')->move('files/',$imageName);
        //$task->fill($getpath)->save();
	    //->getClientOrginalName(); get file name
	    Filemodel::create([        
        'filepath' => $getpath,
        'users_id' => Auth::user()->id
        ]);
        flash()->success('Resume uploaded successfully!');
        return redirect('/');  
    }


     public function editlang($id, Request $request){
        $task = Filemodel::findOrFail($id); 
        $imageName = Auth::user()->id . '.' . $request->file('file')->getClientOriginalExtension();
        $getpath = $request->file('file')->move('files/',$imageName);               
        $input = $request->all();
        $task->fill($input)->save();
        flash()->info('Resume updated successfully!');
        return redirect('/');
     }

     public function deletelang($id){
        $task = Filemodel::findOrFail($id);
        $task->delete();
        flash()->warning('Resume Deleted!');
        return redirect('/');

     }

    public function getDownload($id){       
        $file = Filemodel::findOrFail($id); 
        return response()->download($file->filepath);
	}    
}
