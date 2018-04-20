<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\fitout_level;
use App\hull_style;
use App\configuration;
use App\length;
use App\width;




class configController extends Controller
{
	public function index(Request $request){
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
		    "complete"=>false
		];			
		$info['target']['data']=0;
		$info['target']['hasOptions']=false;

		if($request->has('code')){

			$conf = \App\userConfig::where('code','=',$request->get('code'))->first()->hullConfig;

			$info=[
			    "hull"=>true,
			    "fitout"=>true,
			    "width"=>true,
			    "length"=>true,
			    "hulls" => hull_style::all(),
			    "hull_selected"=>$conf->hull_style_id,
			    "fitout_selected"=>$conf->fitout_level_id,
			    "length_selected"=>$conf->length_id,
			    "width_selected"=>$conf->width_id,
			    "complete"=>true
			];	
			$info['target']['data']=$conf;
			$optionSelected=\App\userConfig::where('code','=',$request->get('code'))->first()->options;	
			if($optionSelected->count() > 0){
				$info['target']['hasOptions']=true;
				$info['target']['options'] = \App\userConfig::where('code','=',$request->get('code'))->first()->options->pluck('option_id')->toArray();
			}
			

				$fits = configuration::where('hull_style_id','=',$conf->hull_style_id)
			        ->pluck('fitout_level_id')
			        ->toArray();

			    $info['fitouts'] = fitout_level::whereIn('id',array_unique($fits))->get();	

		    	$lens = configuration::where('hull_style_id','=',$conf->hull_style_id)
		            ->where('fitout_level_id','=',$conf->fitout_level_id)
		            ->pluck('length_id')
		            ->toArray();
		        $info['lengths'] = length::whereIn('id',array_unique($lens))->get();

		        $wids = configuration::where('hull_style_id','=',$conf->hull_style_id)
		            ->where('fitout_level_id','=',$conf->fitout_level_id)
		            ->pluck('width_id')
		            ->toArray();
		        $info['widths'] = width::whereIn('id',array_unique($wids))->get();


			return view('configure')->with('info',$info);
		}else{
			return view('configure')->with('info',$info);
		}
		
	}



	public function saveMyConfig(Request $request){
		if($request->has('config_id') && $request->has('name') && $request->has('email') && $request->has('options') && $request->has('contact')){
			$oldConfig = \App\userConfig::where('email','=',$request->get('email'))->get();

			if($oldConfig->count()>0){
				//already have a config on the system, let's amend					
					//delete old configOptions
						\App\userConfigOptions::where('user_config_id','=',$oldConfig->first()->id)->delete();
					//recreate the new
						foreach($request->get('options') as $option){
							$c = new \App\userConfigOptions;
							$c->user_config_id = $oldConfig->first()->id;
							$c->option_id = $option;
							$c->save();
						}
				$return = $oldConfig->first()->code;
				$userConfig= $oldConfig->first();
			}else{
				$userConfig = new \App\userConfig;
				$userConfig->name = $request->get('name');
				$userConfig->email = $request->get('email');
				$userConfig->code = str_random(5);
				$userConfig->configuration_id = $request->get('config_id');
				$userConfig->can_contact = $request->get('contact');
				$userConfig->save();
				$userConfig->code = $userConfig->id + 605;
				$userConfig->save();
				foreach($request->get('options') as $option){
					$c = new \App\userConfigOptions;
					$c->user_config_id = $userConfig->id;
					$c->option_id = $option;
					$c->save();
				}
				$return = $userConfig->code;
			}

			$this->generateEmailFromEnquiry($userConfig);

			return view('confirmSaveConfig')->with('code',$return);
		}else{
			return "Oops we didn't receive all the necessary information, please try again";
		}
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
		    "complete"=>false
		];

	$info['target']['hasOptions']=false;


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
				$info['target']['data'] = configuration::where('hull_style_id','=',$request->get('hull'))
					->where('fitout_level_id','=',$request->get('fitout'))
					->where('length_id','=',$request->get('length'))					
					->where('width_id','=',$request->get('width'))
					->get()
					->first();
			}elseif($request->has('code')){
				$info['complete'] = true;
				$id = \App\userConfig::where('code','=',$request->get('code'))->get()->first()->hullConfig()->id;
				$info['target']['data'] = configuration::find($id);
			}

		return view('configurator.startConfig')->with('info',$info);
	}


	private function generateEmailFromEnquiry($savedConfig){
		//this function is to generate the required alerts and actions when a user saves a configuration

		$headers = array(
		  'From: "Sailaways.net" <info@sailaways.net>' ,
		  'Reply-To: "Sailaways.net" <info@sailaways.net>' ,
		  'X-Mailer: PHP/' . phpversion() ,
		  'MIME-Version: 1.0' ,
		  'Content-type: text/html; charset=iso-8859-1'
		);

		$headers = implode( "\r\n" , $headers );

		//alert the admin staff at NBC

		$adminEmail = 'info@nottinghamboatco.com';
		$adminEmailSecond = 'info@sailaways.net';
		$adminSubject = 'New enquiry from Sailaways.net';
		

		$adminView = \View::make('emails.customerEnquiryAdminEmail',['config'=>$savedConfig]);
		$adminMessage = $adminView->render();

		mail($adminEmail,$adminSubject,$adminMessage,$headers);
		//mail($adminEmailSecond,$adminSubject,$adminMessage,$headers);

		//send the email with config link to the customer
		
		$userEmail = $savedConfig->email;
		$userSubject = 'Your saved boat configuration';

		if($savedConfig->can_contact){
			$customerView = \View::make('emails.customerEnquiryCustomerEmailCanContact',['config'=>$savedConfig]);
			$userMessage = $customerView->render();
		}else{
			$customerView = \View::make('emails.customerEnquiryCustomerEmailNoContact',['config'=>$savedConfig]);
			$userMessage = $customerView->render();
		}

		mail($userEmail,$userSubject,$userMessage,$headers);

	}


}
