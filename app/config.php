<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    //

    public function boolean($setting){
    	return $this->where('setting','=',$setting)->first()->boolean;
    }
}
