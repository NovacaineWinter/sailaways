<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stockBoatController extends Controller
{
    public function index(Request $request){
    	$info=[];
    	$info['boats']=\App\stock_boats::all()->sortBy('sold');
    	return view('stock')->with('info',$info);
    }

    public function detail(Request $request){
    	$info=[];
    	$info['boat'] = \App\stock_boats::find($request->get('target'));
    	return view('stockDetail')->with('info',$info);
    }

}
