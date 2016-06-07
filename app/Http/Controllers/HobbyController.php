<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Http\Requests\HobbyCreateRequest;
use App\Hobby;
use App\Http\Controllers\session;

class HobbyController extends Controller
{
    //
    //use session;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       
    }

    public function edit(Hobby $hobby) {
        return view('updatehobby',compact('hobby'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Hobby::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    protected function showTrashed(Hobby $hobby) {
        $hobby_trashed_info = Auth::user()->Hobby()->onlyTrashed()->get();
        return view('trashed',compact('hobby_trashed_info'));
    }

    protected function restoreTrashed($id) {
        $hobby_trashed_info = Hobby::onlyTrashed()
            ->where('id', $id)
            ->restore();
        flash()->success('Hobby Restored!');
        return redirect('/');
    }

    public function store(HobbyCreateRequest $request){        
        //return Auth::user()->id;
        Auth::user()->Hobby()->create($request->All());
        //laracasts flash messages
        flash()->success('New Hobby Added!');
        //session()->flash('flash_message','New Hobyy Added');
        return redirect('/');
        //$inputs->save();
    }

    public function editlang(Hobby $hobby, HobbyCreateRequest $request){
        $hobby->update($request->All());
        flash()->info('Hobby Updated!');
        return redirect('/');       
    }

    public function deletelang(Hobby $hobby){
        $hobby->delete();
        flash()->warning('Hobby Deleted!');
        return redirect('/');
    }

    public function deletepermanently(){   
        if(Auth::user()->Hobby()->onlyTrashed()->get()->count() > 0){
            Auth::user()->Hobby()->onlyTrashed()->forceDelete();
            flash()->warning('All Hobbies are Deleted permanently!');
            return redirect('/'); 
        }else{
            flash()->warning('Nothing to delete!');
            return redirect('/');
        }
    }

}
