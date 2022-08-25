<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    protected $guarded = [];

    public function division() {
        return $this->belongsTo(Division::class, 'state', 'id');
    }

    public function district() {
        return $this->belongsTo(District::class, 'city', 'id');
    }
}
