<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Collection;


class configuration extends Model
{
    public function options(){
    	return $this->belongsToMany('App\option', 'configurations_options', 'configuration_id', 'option_id');
    }


    public function sortedOptions(){
    	$optionCategories = \App\option_category::all()->sortBy('position')->pluck('id')->toArray();
    	$toReturn = new Collection;

    	foreach($optionCategories as $cat){
    		$toReturn = $toReturn->merge($this->options->where('option_category_id','=',$cat));
    	}
    	$toReturn->groupBy('option_category_id');
    	return $toReturn;
    	
    }    

    public function hull_style(){
    	return $this->belongsTo('App\hull_style','hull_style_id');
    }

    public function fitout_level(){
    	return $this->belongsTo('App\fitout_level','fitout_level_id');
    }
}
