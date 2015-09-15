<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
  	public function  showLoginForm(){ //can add validation
  		return view("login");
    }

    public function  processLogin(Request $request,\Illuminate\Contracts\Auth\Guard $auth){
	    //dd($auth);

    	$credential = $request->only("username","password");
	    if ($auth->attempt($credential)) {
	    	//can login
	    	return "Yeah!";
	    }else{
	    	return "Nope!";
	    }

    }

    public function  logout(){

    }

}
