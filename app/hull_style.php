<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hull_style extends Model
{
    public function configurations(){
    	return $this->hasMany('App\configuration','hull_style_id');
    }

    public function images(){
    	return $this->hasMany('App\modelImages','model_id');
    }




    public function setPrimaryImage($imageID=0){


    	if($this->images->count()>0){

	    	foreach($this->images as $image){
	    		$image->primary=false;
	    		$image->save();
	    	}
    	
	    	if($imageID==0){

	    		//set the first image as primary as we have no user preference
	    		$imgPrimary = $this->images->first();
	    		$imgPrimary->primary=true;
	    		$imgPrimary->save();

	    	}else{
	    		$success = false;
		    	foreach($this->images as $image){
		    		if($image->id == $imageID){
			    		$image->primary=true;
		    			$image->save();	
		    			$success = true;
		    		}
		    	}
		    	if(!$success){
		    		//we have failed to find the id passed to this function in the collection of images, set the first one as primary so we always have a prmary
		    		$imgPrimary = $this->images->first();
		    		$imgPrimary->primary=true;
		    		$imgPrimary->save();
		    	}
	    	}
	    }
    }

    public function deleteImage($imageID){

    	if($this->images->count()>0){

	    	foreach($this->images as $image){
	    		if($image->id == $imageID){
	    			\Storage::delete($image->src);
	    			$image->delete();
	    		}

	    	}
	    }


    }
}
