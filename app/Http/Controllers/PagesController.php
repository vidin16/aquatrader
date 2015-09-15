<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function showAbout(){

    	return view('about');

    }

    public function showContact(){

    	return view('contact');

    }
}
