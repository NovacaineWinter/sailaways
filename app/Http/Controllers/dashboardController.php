<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\configuration;
use App\length;
use App\hull_style;
use App\fitout_level;
use App\width;
use App\option;

class dashboardController extends Controller
{


    public function listOptionalExtras(Request $request){
        $extras = option::all();
        return view('inside.listOptionalExtras')->with('extras',$extras);
    }

    public function baseprice(Request $request){
    	$info = [
			"lengths"=> length::all(),
			"hulls"	=> hull_style::all(),	
			"fitouts"=> fitout_level::all(),
			"widths"=> width::all(),

		];
    	return view('inside.setBasePrices')->with('info',$info);
    }

	public function manageExtra(Request $request){
    	$info = [
			"lengths"=> length::all(),
			"hulls"	=> hull_style::all(),	
			"fitouts"=> fitout_level::all(),
			"widths"=> width::all(),
			"request"=>$request,
            "item"=> option::find($request->get('targetextra')),
		];
    	return view('inside.manageOptionalExtra')->with('info',$info);
    }

    public function ajax(Request $request){
    	if($request->has('ajaxmethod')){

    		switch($request->get('ajaxmethod')){

    			case 'updateBasePrice':
    				if($request->has('targetID') && $request->has('value')){
    					$target = configuration::find($request->get('targetID'));
    					$target->baseprice = $request->get('value');
    					$target->save();
    					return $target->baseprice;
    				}
    				break;

                case 'createNewOptionalExtra':
                    $extra = new option;
                    $extra->name = 'New Optional Extra';
                    $extra->title ='';
                    $extra->description ='';
                    $extra->price_ex_vat =0;
                    $extra->highlighted = true;
                    $extra->save();
                    return $extra->id;
                    break;


    		}
    	}
    }
}
