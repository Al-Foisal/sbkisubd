<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
   public function subcategory(){
    	return $this->belongsTo('App\Subcategory');
   }

   public function ads(){
      return $this->hasMany('App\Advertisment','childcategory_id',);
   }

}
