<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class stock_boats extends Model
{
    protected $table ='stockBoats';


 

    public function configuration(){
        return $this->belongsTo('App\configuration','configuration_id');
    }

    public function img(){
    	return $this->hasMany('\App\stockBoatImage','stock_boat_id');
    }


    public function setPrimaryImage($imageID=0){


    	if($this->img->count()>0){

	    	foreach($this->img as $image){
	    		$image->primary=false;
	    		$image->save();
	    	}
    	
	    	if($imageID==0){

	    		//set the first image as primary as we have no user preference
	    		$imgPrimary = $this->img->first();
	    		$imgPrimary->primary=true;
	    		$imgPrimary->save();

	    	}else{
	    		$success = false;
		    	foreach($this->img as $image){
		    		if($image->id == $imageID){
			    		$image->primary=true;
		    			$image->save();	
		    			$success = true;
		    		}
		    	}
		    	if(!$success){
		    		//we have failed to find the id passed to this function in the collection of images, set the first one as primary so we always have a prmary
		    		$imgPrimary = $this->img->first();
		    		$imgPrimary->primary=true;
		    		$imgPrimary->save();
		    	}
	    	}
	    }
    }

    public function deleteImage($imageID){

    	if($this->img->count()>0){

	    	foreach($this->img as $image){
	    		if($image->id == $imageID){
	    			Storage::delete($image->src);
	    			$image->delete();
	    		}

	    	}
	    }


    }
}
