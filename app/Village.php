<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function thana(){
    	return $this->hasMany('App\Union')->where('status',1);
    }
}
