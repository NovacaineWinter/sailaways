<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option_category extends Model
{
    protected $table ="option_categories";

    public function options(){
    	return $this->hasMany('App\option', 'option_category_id');
    }
}
