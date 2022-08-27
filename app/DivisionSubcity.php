<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionSubcity extends Model {
    protected $guarded = [];
    public function divisionchildcity() {
        return $this->hasMany(DivisionChildcity::class);
    }

    public function divisioncity() {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
}
