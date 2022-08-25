<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanaChildcity extends Model
{
    protected $guarded = [];
    public function thanasubcity() {
        return $this->belongsTo(ThanaSubcity::class);
    }
}
