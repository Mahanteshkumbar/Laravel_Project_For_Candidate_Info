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
       
    }

    public function edit(Language $language) {
        return view('updatelang',compact('language'));
    }

    public function show($id){
        $regUserInfo = Language::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    protected function showTrashed(Language $language)
    {
        $language_trashed_info = Auth::user()->Language()->onlyTrashed()->get();
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
        Auth::user()->Language()->create($request->All());
         flash()->success('New Language Added!');
        return redirect('/');
    }


     public function editlang(Language $language, Request $request){      
        $language->update($request->All());
         flash()->info('Language Updated!');
        return redirect('/');
     }

     public function deletelang(Language $language){
        $language->delete();
         flash()->warning('Language Deleted!');
        return redirect('/');

     }

     public function deletepermanently(){   
        if(Auth::user()->Language()->onlyTrashed()->get()->count() > 0){
            Auth::user()->Language()->onlyTrashed()->forceDelete();
            flash()->warning('All Experience are Deleted permanently!');
            return redirect('/'); 
        }else{
            flash()->warning('Nothing to delete!');
            return redirect('/');
        }
    }
      
}
