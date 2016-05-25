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

    
    protected function showTrashed($id)
    {
        $skills_trashed_info = Skills::onlyTrashed()
                ->where('users_id', $id)
                ->get();
       return view('trashedskill',compact('skills_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $hobby_trashed_info = Skills::onlyTrashed()
                ->where('id', $id)
                ->restore();
       return redirect('/');
    }

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
        return redirect('/');

        //$inputs->save();
    }


     public function editlang($id, SkillCreateRequest $request){
        $task = Skills::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        return redirect('/');
     }

     public function deletelang($id){
        $task = Skills::findOrFail($id);
        $task->delete();
        return redirect('/');

     }
}
