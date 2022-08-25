<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictSubcity extends Model {
    protected $guarded = [];
    public function districtchildcity() {
        return $this->hasMany(DistrictChildcity::class);
    }

    public function districtcity() {
        return $this->belongsTo(District::class);
    }
}
