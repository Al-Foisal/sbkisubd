<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model {
    public function district() {
        return $this->hasMany('App\District')->where('status', 1);
    }

    public function unions() {
        return $this->hasMany('App\Union')->where('status', 1);
    }

    public function city() {
        return $this->hasOne(Union::class, 'thana_city');
    }
}
