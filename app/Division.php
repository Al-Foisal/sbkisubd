<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model {
    protected $fillable = [];
    public function districts() {
        return $this->hasMany('App\District')->where('status', 1);
    }

    public function divisionsubcity() {
        return $this->hasMany(DivisionSubcity::class);
    }

    public function ads() {
        return $this->hasMany('App\Advertisment', 'division_id');
    }

    public function nilam() {
        return $this->hasMany('App\Nilam', 'division_id');
    }

    public function city() {
        return $this->hasOne(District::class, 'division_city');
    }
}
