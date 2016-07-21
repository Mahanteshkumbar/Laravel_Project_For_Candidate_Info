<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Events\SomeEvent;
use Auth;
use App\Awards;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\AwardCreateRequest;
use Event;
use App\User;

class AwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
       
    }

    //implicite binding /candidate/award/{award} name of the function parameter should be same($award).
    public function edit(Awards $award) {
        $tags = Tag::lists('Name','id');
        return view('updateAward',compact('award','tags'));
    }

    public function show($id){
        $regUserInfo = Awards::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }
    
    protected function showTrashed(Awards $award)
    {
        $award_trashed_info = Auth::user()->Awards()->onlyTrashed()->get();
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
        
       // $client = Client::find(1);
        // $exists = $client->products->contains($product_id); 

        $awards = Auth::user()->Awards()->create($request->all());
        $awards->tags()->sync($request->input('tags'),false);
        $response = Event::fire(new SomeEvent(Auth::user()));
        flash()->success('New Award Added!');
        return redirect('/');
    }

     public function editlang(Awards $award, AwardCreateRequest $request){
        $task = $award;
        $task->tags()->sync($request->input('tag_List'));       
        $task->update($request->all());
        flash()->info('Award Updated!');
        return redirect('/');
     }

     //implicite binding
     public function deletelang(Awards $award){
        $award->delete();
        flash()->warning('Award Deleted!');
        return redirect('/');
     }

     public function deletepermanently(){   
        if(Auth::user()->Awards()->onlyTrashed()->get()->count() > 0){
            Auth::user()->Awards()->onlyTrashed()->forceDelete();
            flash()->warning('All Experience are Deleted permanently!');
            return redirect('/'); 
        }else{
            flash()->warning('Nothing to delete!');
            return redirect('/');
        }
    }

}
