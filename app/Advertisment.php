<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model {

    public function additionaldetails() {
        return $this->hasMany(AdditionalDetail::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'ad_id', 'id');
    }

    public function categories() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function subcategories() {
        return $this->belongsTo('App\Subcategory', 'subcategory_id', 'id');
    }

    public function childcategories() {
        return $this->belongsTo('App\Childcategory', 'childcategory_id', 'id');
    }

    public function division() {
        return $this->belongsTo('App\Division', 'division_id');
    }

    public function district() {
        return $this->belongsTo('App\District', 'dist_id');
    }

    public function thana() {
        return $this->belongsTo('App\Thana', 'thana_id');
    }

    public function union() {
        return $this->belongsTo('App\Union', 'union_id');
    }

    public function image() {
        return $this->hasOne('App\Adsimage', 'ads_id', 'id');
    }

    public function images() {
        return $this->hasMany('App\Adsimage', 'ads_id');
    }

    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }
}
