<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    public function configurations(){
    	return $this->belongsToMany('App\configuration', 'configurations_options', 'option_id', 'configuration_id');
    }
}
