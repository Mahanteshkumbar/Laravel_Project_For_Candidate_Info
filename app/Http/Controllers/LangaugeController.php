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

    protected function showTrashed($id)
    {
        $language_trashed_info = Language::onlyTrashed()
                ->where('users_id', $id)
                ->get();
       return view('trashedlanguage',compact('language_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $language_trashed_info = Language::onlyTrashed()
                ->where('id', $id)
                ->restore();
                 flash()->success('Language Restored!');
       return redirect('/');
    }

    public function store(Request $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Language::create([
        'Language' => $request->get('Language'),
        'Level_of_fluency' => $request->get('Level_of_fluency'),
        'users_id' => Auth::user()->id]);

         flash()->success('New Language Added!');
        return redirect('/');

        //$inputs->save();
    }


     public function editlang($id, Request $request){
        $task = Language::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
         flash()->info('Language Updated!');
        return redirect('/');
     }

     public function deletelang($id){
        $task = Language::findOrFail($id);
        $task->delete();
         flash()->warning('Language Deleted!');
        return redirect('/');

     }
      
}
