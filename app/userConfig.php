<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userConfig extends Model
{
    protected $table ='UserConfigs';

    public function options(){
    	return $this->hasMany('App\userConfigOptions','user_config_id');
    }

    public function hullConfig(){
    	return $this->belongsTo('App\configuration','configuration_id');
    }
}
