<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilamhistories extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function nilam(){
        return $this->belongsTo('App\Nilam','nilam_id');
    }
}
