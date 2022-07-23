<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    public function district_name()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
