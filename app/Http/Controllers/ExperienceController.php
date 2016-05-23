<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\WorkexpCreateRequest;
use App\Experience;
use Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       // $regUserInfo = Experience::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id = null) {
        $task = Experience::findOrFail($id);
        return view('updateexp',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Experience::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    protected function showTrashed($id)
    {
        $experience_trashed_info = Experience::onlyTrashed()
                ->where('users_id', $id)
                ->get();
       return view('trashedexperience',compact('experience_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $experience_trashed_info = Experience::onlyTrashed()
                ->where('id', $id)
                ->restore();
       return view('home');
    }

    public function store(WorkexpCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Experience::create([
        'Company_name' => $request->get('Company_name'),
        'Start_year' => $request->get('Start_year'),
        'End_year' => $request->get('End_year'),        
        'Designation' => $request->get('Designation'),
        'Exp_summary' => $request->get('Exp_summary'),      
        'users_id' => Auth::user()->id]);
        
        return view('home');

        //$inputs->save();
    }


     public function editlang($id, WorkexpCreateRequest $request){
        $task = Experience::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return view('home');
     }

     public function deletelang($id){
        $task = Experience::findOrFail($id);
        $task->delete();
        return view('home');

     }
}
