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
}
