<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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


    public function faq(Request $request){

        if($request->has('question') && $request->has('answer')){
            
            $oldQuestion = \App\faq::where('question','=',$request->get('question'))->where('answer','=',$request->get('answer'))->get();

                if($oldQuestion->count()==0){
                    $question = new \App\faq;
                    $question->question= $request->get('question');
                    $question->answer = $request->get('answer');
                    $question->save();
                }
        }

        $questions = \App\faq::all();
        return view('inside.faqAdmin')->with('questions',$questions);
    }


    public function enquiries(Request $request){
        $info['request']=$request;
        $info['enquiries'] = \App\userConfig::all();
        return view('inside.enquiries')->with('info',$info);
    }



    public function manageStockBoats(Request $request){ 
        if($request->has('title') && $request->has('shortDescription') && $request->has('fullDescription') && $request->has('price') && $request->has('nonce')){
            //currently trying to create a new boat as the post/get params are present

            if(\App\stock_boats::where('nonce','=',$request->get('nonce'))->count() == 0){
                $new = new \App\stock_boats;

                $new->title         = $request->get('title'); 
                $new->shortSummary  = $request->get('shortDescription'); 
                $new->description   = $request->get('fullDescription'); 
                $new->price         = $request->get('price'); 
                $new->nonce         = $request->get('nonce');

                $config = \App\configuration::where('hull_style_id','=',$request->get('hull'))
                                            ->where('fitout_level_id','=',2)
                                            ->where('length_id','=',$request->get('length'))
                                            ->where('width_id','=',$request->get('width'))
                                            ->get();
                if($config->count() > 0){

                    $new->configuration_id = $config->first()->id;                    
                    $new->save();
                }
            }

        }

            //just trying to see the breakdown of boats in stock

            $data['boats'] = \App\stock_boats::all();
            $data['lengths'] = \App\length::all();
            $data['widths'] = \App\width::all();
            $data['hulls'] = \App\hull_style::all();
            return view('inside.manageStockBoats')->with('data',$data);
        
    }



    public function addSpecSheet(Request $request){

        if($request->hasFile('specsheet') && $request->has('target')){

            $boat = \App\stock_boats::find($request->get('target'));
            $boat->specsheet = $request->file('specsheet')->store('public');
            $boat->save();

            return redirect('stock-boat-admin');
        }
    }


    

    public function addPhoto(Request $request){

        if($request->hasFile('photo') && $request->has('target')){

            $img = new \App\stockBoatImage;
            $img->src = $request->file('photo')->store('public');
            $img->stock_boat_id = $request->get('target');
            $img->save();

            return redirect('edit-stock-boat?target='.$request->get('target'));
        }
    }




    public function editStockBoat(Request $request){


        if($request->has('title') && 
            $request->has('shortDescription') && 
            $request->has('fullDescription') && 
            $request->has('price') && 
            $request->has('target') &&
            $request->has('hull') &&
            $request->has('hull') &&
            $request->has('length')
            ){
            //update old boat

            $toEdit = \App\stock_boats::find($request->get('target'));



            if($request->hasFile('specsheet')){
                $toEdit->specsheet = $request->file('specsheet')->store('public');
            }

            if($toEdit){

                $toEdit->title         = $request->get('title'); 
                $toEdit->shortSummary  = $request->get('shortDescription'); 
                $toEdit->description   = $request->get('fullDescription'); 
                $toEdit->price         = $request->get('price'); 
                

                $config = \App\configuration::where('hull_style_id','=',$request->get('hull'))
                                            ->where('fitout_level_id','=',2)
                                            ->where('length_id','=',$request->get('length'))
                                            ->where('width_id','=',$request->get('width'))
                                            ->get();
                if($config->count() > 0){

                    $toEdit->configuration_id = $config->first()->id;                    
                    $toEdit->save();
                }
            }
        
            $data['boats'] = \App\stock_boats::all();
            $data['lengths'] = \App\length::all();
            $data['widths'] = \App\width::all();
            $data['hulls'] = \App\hull_style::all();
            return view('inside.manageStockBoats')->with('data',$data);
     


        }elseif($request->has('target')){

            $boat = \App\stock_boats::where('id','=',$request->get('target'))->first();

            if($boat){
                $data['lengths'] = \App\length::all();
                $data['widths'] = \App\width::all();
                $data['hulls'] = \App\hull_style::all();
                $data['target']= $boat;
                return view('inside.stockBoatDetail')->with('data',$data);

            }else{
                //just return the summary view as the target was not passed correctly

                $data['boats'] = \App\stock_boats::all();
                $data['lengths'] = \App\length::all();
                $data['widths'] = \App\width::all();
                $data['hulls'] = \App\hull_style::all();
                return view('inside.manageStockBoats')->with('data',$data);
            }







        }else{
            //just return the summary view as the target was not passed correctly

            $data['boats'] = \App\stock_boats::all();
            $data['lengths'] = \App\length::all();
            $data['widths'] = \App\width::all();
            $data['hulls'] = \App\hull_style::all();
            return view('inside.manageStockBoats')->with('data',$data);  
        }
    }

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

        if($request->has('targetextra') && option::find($request->get('targetextra'))){
            $option = option::find($request->get('targetextra'));
        	$info = [
    			"lengths"=> length::all(),
    			"hulls"	=> hull_style::all(),	
    			"fitouts"=> fitout_level::all(),
    			"widths"=> width::all(),
    			"request"=>$request,
                "item"=> $option,
                "categories"=>option_category::all(),
                "img"=> url(Storage::url($option->img)),
    		];
        	return view('inside.manageOptionalExtra')->with('info',$info);
        }else{
            return redirect('extras');
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


                case 'updatePrimaryImage':
                    if($request->has('targetBoat') && $request->has('targetImage')){
                        $boat = \App\stock_boats::find($request->get('targetBoat'));
                        $boat->setPrimaryImage($request->get('targetImage'));
                    }
                    return 'true';
                    break;


                case 'deleteImage':
                    if($request->has('targetBoat') && $request->has('targetImage')){
                        $boat = \App\stock_boats::find($request->get('targetBoat'));
                        $boat->deleteImage($request->get('targetImage'));
                    }
                    return 'true';
                    break;

                case 'setDiscussionStarted':
                    if($request->has('target')){
                        $edit = \App\userConfig::find($request->get('target'));
                        $edit->started_discussion = $request->get('value');
                        $edit->save();
                        return 1;
                    }else{
                        return 0;
                    }
                    break;

                case 'newImageForOption':
                    return 'ok';
                    break;

    		}
    	}
    }


    public function imageForOption(Request $request){
        if($request->hasFile('input_img') && $request->has('target')){
            $option = \App\option::find($request->get('target'));
            $option->img = $request->file('input_img')->store('public');
            $option->save();

            return redirect('optionalextra?targetextra='.$request->get('target'));
        }else{
            echo 'Not Ok';
        }
    }
}
