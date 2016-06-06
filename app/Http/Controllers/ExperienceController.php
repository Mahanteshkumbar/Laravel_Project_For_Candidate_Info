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
       
    }

    public function edit(Experience $experience) {
        return view('updateexp',compact('experience'));
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
                flash()->info('Experience Restored!');
       return redirect('/');
    }

    public function store(WorkexpCreateRequest $request){        
        Auth::user()->Experience()->create($request->All());
        flash()->success('New Experience Added!');
        return redirect('/');
    }


     public function editlang(Experience $experience, WorkexpCreateRequest $request){
        $experience->update($request->All());
        flash()->info('Experience Updated!');
        return redirect('/');
     }

     public function deletelang(Experience $experience){
        $experience->delete();
        flash()->warning('Experience Deleted!');
        return redirect('/');

     }
}
