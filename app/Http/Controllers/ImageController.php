<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Images;
use Auth;

//use App\Http\Controllers\Input;
use Input;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Images::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Images::findOrFail($id);
        return view('updatelang',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Images::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    public function store(Request $request){  
    	$imageName = Auth::user()->id . '.' . 
        $request->file('image')->getClientOriginalExtension();
	    $getpath = $request->file('image')->move(
	        base_path() . '/public/images/', $imageName
	    );

	    Images::create([        
        'imagepath' => $getpath,
        'users_id' => Auth::user()->id]);
	    return view('home');
    }


     public function editlang($id, Request $request){
        $task = Images::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Images::findOrFail($id);
        $task->delete();
        return view('home');

     }
}
