<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class width extends Model
{
    public function configurations(){
        return $this->hasMany('App\configuration','width_id');
    }
}
