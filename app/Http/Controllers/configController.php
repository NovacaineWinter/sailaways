<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\fitout_level;
use App\hull_style;
use App\configuration;
use App\length;
use App\width;




class configController extends Controller
{
	public function index(Request $request){
		return view('configure');
	}


	public function configAjax(Request $request){

		$info=[
		    "hull"=>false,
		    "fitout"=>false,
		    "width"=>false,
		    "length"=>false,
		    "hulls" => hull_style::all(),
		    "fitouts"=>'',
		    "lengths"=>'',
		    "widths"=>'',
		    "hull_selected"=>0,
		    "fitout_selected"=>0,
		    "length_selected"=>0,
		    "width_selected"=>0,
		    "target"=>0,
		    "complete"=>false
		];




			if($request->has('hull')){

				$info['hull']=true;
				$info['hull_selected'] = $request->get('hull');

			    $fits = configuration::where('hull_style_id','=',$request->get('hull'))
			        ->pluck('fitout_level_id')
			        ->toArray();

			    $info['fitouts'] = fitout_level::whereIn('id',array_unique($fits))->get();

			    if($request->has('fitout')){

			    	$info['fitout'] = true;
			    	$info['fitout_selected'] = $request->get('fitout');
			        //length and width can be set at the same time

			        $lens = configuration::where('hull_style_id','=',$request->get('hull'))
			            ->where('fitout_level_id','=',$request->get('fitout'))
			            ->pluck('length_id')
			            ->toArray();
			        $info['lengths'] = length::whereIn('id',array_unique($lens))->get();

			        $wids = configuration::where('hull_style_id','=',$request->get('hull'))
			            ->where('fitout_level_id','=',$request->get('fitout'))
			            ->pluck('width_id')
			            ->toArray();
			        $info['widths'] = width::whereIn('id',array_unique($wids))->get();

			        if($request->has('length')){
			        	$info['length_selected'] = $request->get('length');
			        	$info['length'] = true;
			        }

			        if($request->has('width')){
						$info['width_selected'] = $request->get('width');
						$info['width'] = true;
			        }


			    }
			}

			if($request->has('hull') && $request->has('fitout') && $request->has('length') && $request->has('width')){
				$info['complete'] = true;
				$info['target'] = configuration::where('hull_style_id','=',$request->get('hull'))
					->where('fitout_level_id','=',$request->get('fitout'))
					->where('length_id','=',$request->get('length'))					
					->where('width_id','=',$request->get('width'))
					->get()
					->first();
			}

		return view('configurator.startConfig')->with('info',$info);
	}
}
