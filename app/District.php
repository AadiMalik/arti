<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function Tehsil()
    {
        return $this->belongsToMany(Tehsil::class);
    }
    public function province_name()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
