<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function _construct(){
    	//$this->middleware('auth');
    }

    public function login(){

    	return 'Welcome admin';
    }

    public function postLogin(){
    	return 'Post login process';

    }
    public function index(){
    	return 'Welcome index';
    }


}
