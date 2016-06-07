<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jobpost;
use Auth;

class JobpostController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
      
    }

    public function edit(Jobpost $jobpost) {
        return view('updatejobpost',compact('jobpost'));
    }

    public function show($id){
        $regUserInfo = Jobpost::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }  

    protected function showTrashed()
    {
        $jobpost_trashed_info = Auth::user()->Jobpost()->onlyTrashed()->get();
        return view('trashedjobpost',compact('jobpost_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $hobby_trashed_info = Jobpost::onlyTrashed()
                ->where('id', $id)
                ->restore();
                flash()->success('Jobpost Restored');
       return redirect('/');
    }

     
    public function store(Request $request){
        Auth::user()->Jobpost()->create($request->All());
        flash()->success('New Jobpost Added');
        return redirect('/');
    }

    public function editlang(Jobpost $jobpost, Request $request){
        $jobpost->update($request->All());
        flash()->info('Jobpost Updated');
        return redirect('/');
     }

    public function deletelang(Jobpost $jobpost){
        $jobpost->delete();
        flash()->warning('Jobpost Deleted!');
        return redirect('/');
    }

    public function deletepermanently(){   
        if(Auth::user()->Jobpost()->onlyTrashed()->get()->count() > 0){
            Auth::user()->Jobpost()->onlyTrashed()->forceDelete();
            flash()->warning('All Experience are Deleted permanently!');
            return redirect('/'); 
        }else{
            flash()->warning('Nothing to delete!');
            return redirect('/');
        }
    }
}
