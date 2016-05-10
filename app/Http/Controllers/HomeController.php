<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Profile;

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
        $candidate_details = Profile::findorFail($id);
        return view('profileform',compact('candidate_details'));

        // $user =  User::create([            
        //     'name' => $data['name'],
        //     'email' => $data['email'],            
        //     'password' => bcrypt($data['password']),
        // ]);

        // $profile =  Profile::create([
        //    'name' => $data['name'],
        //    'lname' => $data['lname'],
        //    'uname' => $data['uname'],
        //    'mnum' => $data['mnum'],
        //    'dob' => $data['dob'],
        //    'status' => $data['status'],
        //    'country' => $data['country'],
        //     'email' => $data['email'],
        //     'state' => $data['state'],
        //     'city' => $data['city'],            
        //    'addrno' => $data['addrno'],           
        //     'users_id' => $user->id
        // ]);

        // //$profile->user()->sync([$user->id]);
        // return $id;


    }

    public function edit(Request $request, $id){
        
        return $id;

        // $user =  User::create([            
        //     'name' => $data['name'],
        //     'email' => $data['email'],            
        //     'password' => bcrypt($data['password']),
        // ]);

        // $profile =  Profile::create([
        //    'name' => $data['name'],
        //    'lname' => $data['lname'],
        //    'uname' => $data['uname'],
        //    'mnum' => $data['mnum'],
        //    'dob' => $data['dob'],
        //    'status' => $data['status'],
        //    'country' => $data['country'],
        //     'email' => $data['email'],
        //     'state' => $data['state'],
        //     'city' => $data['city'],            
        //    'addrno' => $data['addrno'],           
        //     'users_id' => $user->id
        // ]);

        // //$profile->user()->sync([$user->id]);
        // return $id;


    }
    
}
