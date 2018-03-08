<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Illuminate\Http\Request;

use App\configuration;
use App\length;
use App\hull_style;
use App\fitout_level;
use App\width;
use App\option;
use App\option_category;
use App\configuration_options;

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
        if($request->hasFile('fileToUpload')){
            return 'Ok';
        }else{

            if($request->has('targetextra') && option::find($request->get('targetextra'))){
            	$info = [
        			"lengths"=> length::all(),
        			"hulls"	=> hull_style::all(),	
        			"fitouts"=> fitout_level::all(),
        			"widths"=> width::all(),
        			"request"=>$request,
                    "item"=> option::find($request->get('targetextra')),
                    "categories"=>option_category::all(),
        		];
            	return view('inside.manageOptionalExtra')->with('info',$info);
            }else{
                return redirect('extras');
            }
        }
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
                    $extra->title =' ';
                    $extra->description =' ';
                    $extra->option_category_id = 0;
                    $extra->price_ex_vat =0;
                    $extra->highlighted = true;
                    $extra->save();
                    return $extra->id;
                    break;



                case 'updateOptionName':
                    if($request->has('targetID') && $request->has('value')){
                        $option = option::find($request->get('targetID'));
                        $option->name = $request->get('value');
                        $option->highlighted =0;
                        $option->save();
                        return 'ok';
                    }
                    break;

                case 'updateOptionTitle':
                    if($request->has('targetID') && $request->has('value')){
                        $option = option::find($request->get('targetID'));
                        $option->highlighted =0;
                        $option->title = $request->get('value');
                        $option->save();
                        return 'ok';
                    }
                    break;

                case 'changeOptionCategory':
                    if($request->has('targetID') && $request->has('value')){
                        $option = option::find($request->get('targetID'));
                        $option->highlighted =0;
                        $option->option_category_id = $request->get('value');
                        $option->save();
                        return 'ok';
                    }
                    break;

                case 'updateOptionPrice':
                    if($request->has('targetID') && $request->has('value')){
                        $option = option::find($request->get('targetID'));
                        $option->highlighted =0;
                        $option->price_ex_vat = $request->get('value');
                        $option->save();
                        return 'ok';
                    }
                    break;

                case 'updateOptionDescription':
                    if($request->has('targetID') && $request->has('value')){
                        $option = option::find($request->get('targetID'));
                        $option->highlighted =0;
                        $option->description = $request->get('value');
                        $option->save();
                        return 'ok';
                    }
                    break;  

                case 'updateBosunCatalogueID':
                    if($request->has('targetID') && $request->has('value')){
                        $option = option::find($request->get('targetID'));
                        $option->highlighted =0;
                        $option->catalogue_id = $request->get('value');
                        $option->save();
                        return 'ok';
                    }
                    break;                                                                                                



                case 'setOptionConfigPivot':
                    if($request->has('config') && $request->has('option') && $request->has('value')){

                        $option = configuration_options::where('option_id','=',$request->get('option'))->where('configuration_id','=',$request->get('config'))->get();

                        if($request->get('value')==1){
                            //needs option - check if it exists and create it if it doesnt
                            
                            if($option->count()==1){
                                //it exists, do nothing

                            }else{

                                if($option->count()>1){
                                    //it exists multiple times - delete all 
                                    foreach($option as $opt){
                                        $opt->delete();
                                    }
                                }

                                //now create the record
                                $optionOnConfig = new configuration_options;
                                $optionOnConfig->option_id = $request->get('option');
                                $optionOnConfig->configuration_id = $request->get('config');
                                $optionOnConfig->save();
                            }

                            
                        }else{
                            //doesnt need option - check if it exists and delete if it does
                            if($option->count()>0){
                                //it exists - delete all instances
                                foreach($option as $opt){
                                    $opt->delete();
                                }
                            }
                        }

                    }
                    break;


                case 'setStandardFeature':
                    if($request->has('target') && $request->has('value')){
                        $option = \App\option::find($request->get('target'));
                        $option->is_standard = $request->get('value');
                        $option->save();
                        return 'ok';
                    }
                    break;


                case 'newImageForOption':
                    return 'ok';
                    break;

    		}
    	}
    }


    public function imageForOption(Request $request){
        if($request->file('fileToUpload')){echo 'OK';}else{echo 'Not Ok';}
        dd($request);
    }
}
