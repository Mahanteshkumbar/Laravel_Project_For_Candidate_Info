<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Skills;
use Auth;
use App\Http\Requests\SkillCreateRequest;

class SkillController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Skills::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Skills::findOrFail($id);
        return view('updateskill',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Skills::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'Skills' => 'required|max:255',
    //         'efficiency' => 'required',
    // 			'yeo' => 'required',
           
    //     ]);
    // }

//'Skills','efficiency','yoe',
    public function store(SkillCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Skills::create([
        'skill' => $request->get('skill'),
        'efficiency' => $request->get('efficiency'),
        'yoe' => $request->get('yoe'),
        'users_id' => Auth::user()->id]);
        return view('home');

        //$inputs->save();
    }


     public function editlang($id, SkillCreateRequest $request){
        $task = Skills::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Skills::findOrFail($id);
        $task->delete();
        return view('home');

     }
}
