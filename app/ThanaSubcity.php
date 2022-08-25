<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanaSubcity extends Model {
    protected $guarded = [];
    public function thanachildcity() {
        return $this->hasMany(ThanaChildcity::class);
    }

    public function thanacity() {
        return $this->belongsTo(Thana::class);
    }
}
