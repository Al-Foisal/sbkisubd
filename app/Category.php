<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[];
    public function subcategories(){
    	return $this->hasMany('App\Subcategory')->where('status',1);
    }
    public function hsubcategories(){  
        return $this->hasMany('App\Subcategory')->where('status',1)->limit(5);
    }
    public function ads(){
      return $this->hasMany('App\Advertisment','category_id');
   }
}
