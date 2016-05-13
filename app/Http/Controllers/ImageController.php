<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Images;
use Auth;
use App\Http\Requests\ImageCreateRequest;

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
        return view('updateimageupload',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Images::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    public function store(ImageCreateRequest $request){  
    	$imageName = Auth::user()->id . '.' . $request->file('image')->getClientOriginalExtension();
	    $getpath = $request->file('image')->move('images/',$imageName);
        //$task->fill($getpath)->save();

	    Images::create([        
        'imagepath' => $getpath,
        'users_id' => Auth::user()->id
        ]);
        return view('home');  
    }


     public function editlang($id, ImageCreateRequest $request){
        $task = Images::findOrFail($id); 
        $imageName = Auth::user()->id . '.' . $request->file('image')->getClientOriginalExtension();
        $getpath = $request->file('image')->move('images/',$imageName);               
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
