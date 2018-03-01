<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fitout_level extends Model
{
    public function configurations(){
    	return $this->hasMany('App\configuration','fitout_level_id');
    }
}
