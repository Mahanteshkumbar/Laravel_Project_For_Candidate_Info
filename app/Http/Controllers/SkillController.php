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
    public function index($id) {
        $article = Skills::find($id);
        //return $article;
        $logs = $article->revisionHistory;
        //return $logs;
       //$logs = revisions::orderBy('created_at', 'desc')->get();
        return view('skillhistory',compact('logs'));
    }

    public function edit(Skills $skill) {
        return view('updateskill',compact('skill'));
    }

    public function show($id){
        $regUserInfo = Skills::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }
    
    protected function showTrashed(Skills $skill)
    {
        $skills_trashed_info = Auth::user()->Skills()->onlyTrashed()->get();
        return view('trashedskill',compact('skills_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $hobby_trashed_info = Skills::onlyTrashed()
                ->where('id', $id)
                ->restore();
                 flash()->success('Skill restored!');
       return redirect('/');
    }

    public function store(SkillCreateRequest $request){        
        Auth::user()->Skills()->create($request->All());
         flash()->success('New Skill Addedd!');
        return redirect('/');
    }

     public function editlang(Skills $skill, SkillCreateRequest $request){
        $skill->update($request->All());
         flash()->info('Skill Updated!');
        return redirect('/');
     }

     public function deletelang(Skills $skill){
        $skill->delete();
        flash()->warning('Skill Deleted!');
        return redirect('/');
     }

     public function deletepermanently(){   
        if(Auth::user()->Skills()->onlyTrashed()->get()->count() > 0){
            Auth::user()->Skills()->onlyTrashed()->forceDelete();
            flash()->warning('All Experience are Deleted permanently!');
            return redirect('/'); 
        }else{
            flash()->warning('Nothing to delete!');
            return redirect('/');
        }
    }
}
