<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {
    protected $guarded = [];
    public function packageDetails() {
        return $this->hasMany(PackageDetail::class);
    }

    public function getPackageTypeAttribute() {
        $type = $this->type;

        if ($type == 1) {
            return 'Preminum';
        } elseif ($type == 2) {
            return 'Bidding';
        } elseif ($type == 3) {
            return 'Free';
        } elseif ($type == 4) {
            return 'Featured Ad';
        }

    }

}
