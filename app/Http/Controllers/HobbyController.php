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
       // $regUserInfo = Hobby::All();
        //return view('getuser',compact('regUserInfo'));
        //return $regUserInfo;
        // if ($id == null) {
        //     return RegisterController::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
    }

    public function edit($id) {
        $task = Hobby::findOrFail($id);
        return view('updatehobby',compact('task'));
       //return 'Hiiiii';
    }

    public function show($id){
        $regUserInfo = Hobby::findorFail($id);
        return view('showusers',compact('regUserInfo')); 
    }

    protected function showTrashed($id)
    {
        $hobby_trashed_info = Hobby::onlyTrashed()
                ->where('users_id', $id)
                ->get();
       return view('trashed',compact('hobby_trashed_info'));
    }

    protected function restoreTrashed($id)
    {
        $hobby_trashed_info = Hobby::onlyTrashed()
                ->where('id', $id)
                ->restore();
                flash()->success('Hobby Restored!');
                return redirect('/');
       //return view('home');
    }



    public function store(HobbyCreateRequest $request){        
        //return Auth::user()->id;
        $values = $request->All();
        Hobby::create([
        'hname' => $request->get('hname'),
        'users_id' => Auth::user()->id]);

        //laracasts flash messages
        flash()->success('New Hobby Added!');
        //session()->flash('flash_message','New Hobyy Added');
        return redirect('/');

        //$inputs->save();
    }


     public function editlang($id, HobbyCreateRequest $request){
        $task = Hobby::findOrFail($id);  
       // return $hobby;      
        $input = $request->All();
        $task->fill($input)->save();
         flash()->info('Hobby Updated!');
        return redirect('/');       
        //return view('home');
     }

     public function deletelang($id){
        $task = Hobby::findOrFail($id);
        $task->delete();
        flash()->warning('Hobby Deleted!');
        return redirect('/');
        //return view('home');

     }
}
