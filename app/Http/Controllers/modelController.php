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


    public function detail(Request $request){
    	$info=[];
    	$info['boat'] = \App\hull_style::find($request->get('target'));
    	return view('modelDetail')->with('info',$info);
    }
}
