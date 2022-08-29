<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model {
    protected $fillable = [];
    public function districtsubcity() {
        return $this->hasMany(DistrictSubcity::class);
    }

    public function division() {
        return $this->hasMany('App\Division')->where('status', 1);
    }

    public function thanas() {
        return $this->hasMany('App\Thana')->where('status', 1);
    }

    public function city() {
        return $this->hasOne(Thana::class, 'district_city');
    }
}
