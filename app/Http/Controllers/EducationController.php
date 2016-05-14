<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EducationCreateRequest;
use App\Education;
use Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Education::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Education::findOrFail($id);
        return view('updatelang',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Education::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name_of_university' => 'required|max:255',
    //         'course' => 'required',
                //'aggregate' => 'required',
           
    //     ]);
    // }

    public function store(EducationCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Education::create([
        'name_of_university' => $request->get('name_of_university'),
        'course' => $request->get('course'),
        'aggregate' => $request->get('aggregate'),
        'users_id' => Auth::user()->id]);
        return view('home');

        //$inputs->save();
    }


     public function editlang($id, EducationCreateRequest $request){
        $task = Education::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Education::findOrFail($id);
        $task->delete();
        return view('home');

     }
}
