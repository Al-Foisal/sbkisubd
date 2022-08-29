<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Union extends Model {
    public function villages() {
        return $this->hasMany(Village::class);
    }

    public function thana() {
        return $this->hasMany('App\Thana')->where('status', 1);
    }

}
