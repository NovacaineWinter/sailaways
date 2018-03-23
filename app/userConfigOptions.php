<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userConfigOptions extends Model
{
    protected $table ='UserConfigOptions';


    public function userConfig(){
    	return $this->belongsTo('App\userConfigOptions','user_config_id');
    }    
}
