<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EducationCreateRequest;
use App\Education;
use Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       
    }

    public function edit(Education $education) {
       // $task = $education;
        return view('updateedu',compact('education'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Education::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    protected function showTrashed($id) {
        $education_trashed_info = Education::onlyTrashed()
                ->where('users_id', $id)
                ->get();
       return view('trashededucation',compact('education_trashed_info'));
    }

    protected function restoreTrashed($id) {
        $education_trashed_info = Education::onlyTrashed()
                ->where('id', $id)
                ->restore();
                flash()->info('Education Restored!');
       return redirect('/');
    }
    
    public function store(EducationCreateRequest $request){                
        Auth::user()->Education()->create($request->All());
        flash()->success('New Education Added!');
        return redirect('/');
    }


     public function editlang(Education $education, EducationCreateRequest $request){
        $education->update($request->All());
        flash()->info('Education Updated!');
        return redirect('/');
     }

    public function deletelang(Education $education){
        $education->delete();
        flash()->warning('Education Deleted!');
        return redirect('/');
    }
}
