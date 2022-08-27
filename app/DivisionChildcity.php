<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionChildcity extends Model {
    protected $guarded = [];
    public function divisionsubcity() {
        return $this->belongsTo(DivisionSubcity::class, 'division_subcity_id', 'id');
    }
}
