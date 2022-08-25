<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model {
    protected $guarded = [];
    public function packages() {
        return $this->hasMany(Package::class);
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }
}
