<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
    protected $guarded = [];
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function ads() {
        return $this->belongsTo(Advertisment::class, 'ad_id');
    }
}
