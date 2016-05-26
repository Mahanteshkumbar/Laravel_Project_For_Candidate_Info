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
    
    protected function showTrashed($id)
    {
        $award_trashed_info = Awards::onlyTrashed()
                ->where('users_id', $id)
                ->get();
       return view('trashedaward',compact('award_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $experience_trashed_info = Awards::onlyTrashed()
                ->where('id', $id)
                ->restore();
                flash()->info('Award Restored!');
       return redirect('/');
    }

    public function store(AwardCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        $flash_message = 'Created successfully';
        Awards::create([
        'award' => $request->get('award'),
        'org' => $request->get('org'),
        'year' => $request->get('year'),
        'users_id' => Auth::user()->id]);
        flash()->success('New Award Added!');
        return redirect('/');

        //$inputs->save();
    }


     public function editlang($id, AwardCreateRequest $request){
        $task = Awards::findOrFail($id);        
        $input = $request->all();
        $task->fill($input)->save();
        flash()->info('Award Updated!');
        return redirect('/');
     }

     public function deletelang($id){
        $task = Awards::findOrFail($id);
        $task->delete();
        flash()->warning('Award Deleted!');
        return redirect('/');

     }

}
