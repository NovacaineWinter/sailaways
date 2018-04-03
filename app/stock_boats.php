<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock_boats extends Model
{
    protected $table ='stockBoats';

    public function img(){
    	return $this->hasMany('\App\stockBoatImage','stock_boat_id');
    }

}
