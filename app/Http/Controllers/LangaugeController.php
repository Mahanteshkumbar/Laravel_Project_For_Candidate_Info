<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Language;
use Auth;
use App\Http\Controllers\Controller;

class LangaugeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Language::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Language::findOrFail($id);
        return view('updatelang',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Language::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'Language' => 'required|max:255',
    //         'Level_of_fluency' => 'required',
           
    //     ]);
    // }

    public function store(Request $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Language::create([
        'Language' => $request->get('Language'),
        'Level_of_fluency' => $request->get('Level_of_fluency'),
        'users_id' => Auth::user()->id]);
        return view('language',compact('flash_message'));

        //$inputs->save();
    }


     public function editlang($id, Request $request){
        $task = Language::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Language::findOrFail($id);
        $task->delete();
        return view('home');

     }
      
}
