<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Awards;
use App\Http\Requests;
use App\Http\Requests\AwardCreateRequest;

class AwardsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Awards::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Awards::findOrFail($id);
        return view('updateAward',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Awards::findorFail($id);
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

    public function store(AwardCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Awards::create([
        'award' => $request->get('award'),
        'org' => $request->get('org'),
        'year' => $request->get('year'),
        'users_id' => Auth::user()->id]);
        return view('home');

        //$inputs->save();
    }


     public function editlang($id, AwardCreateRequest $request){
        $task = Awards::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Awards::findOrFail($id);
        $task->delete();
        return view('home');

     }

}
