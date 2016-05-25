<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Profile;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }


    public function accessEdit(Request $request, $id){
        $task = Profile::findorFail($id);
        return view('profileform',compact('task'));
    }

    public function editlang($id, Request $request){
        $task1 = User::findOrFail($id);  
        $task2 = Profile::findorFail($id);     
        $input = $request->all();
        $task1->fill($input)->save();
        $task2->fill($input)->save();
        return view('home');
     }

    public function edit(Request $request, $id){        
        return $id;
    }
    
}
