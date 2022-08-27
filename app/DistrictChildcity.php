<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictChildcity extends Model
{
    protected $guarded = [];

    public function districtsubcity() {
        return $this->belongsTo(DistrictSubcity::class,'district_subcity_id','id');
    }
}
