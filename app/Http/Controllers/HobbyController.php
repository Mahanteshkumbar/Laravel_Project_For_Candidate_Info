<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Requests\HobbyCreateRequest;
use App\Hobby;

class HobbyController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Hobby::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Hobby::findOrFail($id);
        return view('updateaward',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Hobby::findorFail($id);
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

    public function store(HobbyCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Hobby::create([
        'hname' => $request->get('hname'),
        'users_id' => Auth::user()->id]);
        return view('home');

        //$inputs->save();
    }


     public function editlang($id, HobbyCreateRequest $request){
        $task = Hobby::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Hobby::findOrFail($id);
        $task->delete();
        return view('home');

     }
}
