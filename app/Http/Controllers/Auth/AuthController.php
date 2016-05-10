<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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
            'password' => bcrypt($data['password']),
        ]);

        $profile = Profile::create([
           'name' => $data['name'],
           'lname' => $data['lname'],
           'uname' => $data['uname'],
           'mnum' => $data['mnum'],
           'dob' => $data['dob'],
           'status' => $data['status'],
           'country' => $data['country'],
           'email' => $data['email'],
           'state' => $data['state'],
           'city' => $data['city'],            
           'addrno' => $data['addrno'],           
           'users_id' => $user->id
        ]);

        //$profile->user()->sync([$user->id]);
        return $user;
    }

    // protected function createprofile(array $data)
    // {
    //     return Profile::create([            
    //         'state' => $data['state'],
    //         'city' => $data['city']
    //     ]);
    // }
}
