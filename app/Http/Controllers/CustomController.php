<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class CustomController extends Controller
{
    //

    public function login(){
    	if(Auth::user()){
    		return redirect()->route('admin_dashboard');
    	}
    	else{

    	return view('login');	
    	}
    }


    public function login_do(Request $request){

    	$this->validate($request,[
    		'email'=>'required|max:191',
    		'password'=>'required',
    	]);


    	$credentials = [
    		'email'=>$request->email,
    		'password'=>$request->password
    	];

    	if(Auth::attempt($credentials,$request->remember)){
    		return redirect()->route('admin_dashboard');
    	}
    	else{
    		return redirect()->back()->withErrors(['invalid'=>'Invalid Email or Password']);
    	}


    }

    public function logout(Request $request){
    	Auth::logout();
    	return redirect()->back();
    }

    
}
