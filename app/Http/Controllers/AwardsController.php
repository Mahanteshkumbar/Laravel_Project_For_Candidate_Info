<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Awards;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\AwardCreateRequest;

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
       // $task = Awards::findOrFail($id);
        $task = $award;
        $tags = Tag::lists('Name','id');
        return view('updateAward',compact('task','tags'));
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
        
       // $client = Client::find(1);
        // $exists = $client->products->contains($product_id); 

        $awards = Auth::user()->Awards()->create($request->all());
        $awards->tags()->sync($request->input('tags'),false);
        flash()->success('New Award Added!');
        return redirect('/');
    }

     public function editlang($id, AwardCreateRequest $request){
        $task = Awards::findOrFail($id);
        $task->tags()->sync($request->input('tag_List'));       
        $task->update($request->all());
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
