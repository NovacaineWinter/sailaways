<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class configuration extends Model
{
    public function options(){
    	return $this->belongsToMany('App\option', 'configurations_options', 'configuration_id', 'option_id');
    }

    public function hull_style(){
    	return $this->belongsTo('App\hull_style','hull_style_id');
    }

    public function fitout_level(){
    	return $this->belongsTo('App\fitout_level','fitout_level_id');
    }
}
