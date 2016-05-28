<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminCreateRequest;
use App\Admin;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\User;
use App\Profile;

class AdminController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    //protected $guard = 'admin';

    public function __construct(){
        $this->middleware('admin');
    }
    
    public function login(){
    	return view('admins.login');
    }

    public function postLogin(AdminCreateRequest $request){

        $credentials = ['email'=>$request->get('email'),'password'=>$request->get('password')];

        if(auth()->guard('admin')->attempt($credentials)){
           return redirect('/admin');
        }else{
            return redirect('/admin/login')
                    ->withErrors(['errors' => 'Login invalid'])
                    ->withInput();
        }    	
    }

    public function index(){
    	return view('admins.index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required',
            'addrno' => 'required',
            'password' => 'required',
            'city' => 'required',
            'dob' => 'required',
            'mnum' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([            
            'name' => $data['name'],
            'email' => $data['email'],  
            'state' => $data['state'],
           'city' => $data['city'],             
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegistrationForm(){          
        return view('admins.register');
    }

    public function register(Request $request){
        $admin = Admin::create([            
            'name' => $request->get('name'),
            'email' => $request->get('email'),            
            'password' => bcrypt($request->get('password')),
           'state' => $request->get('state'),
           'city' => $request->get('city')          
        ]);
        return redirect('/admin');
    }

    public function logout(){          
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
}
