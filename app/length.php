<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class length extends Model
{
    public function configurations(){
        return $this->hasMany('App\configuration','length_id');
    }
}
