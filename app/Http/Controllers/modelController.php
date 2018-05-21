<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modelController extends Controller
{
    public function index(Request $request){
    	$info=[];
    	$info['boats']=\App\hull_style::all();
    	return view('models')->with('info',$info);
    }
}
