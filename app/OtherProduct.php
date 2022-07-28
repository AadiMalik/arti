<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherProduct extends Model
{
    protected $dates = [
        'updated_at',
        'created_at',
    ];
    public function district_name()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function tehsil_name()
    {
        return $this->belongsTo(Tehsil::class, 'tehsil_id');
    }
    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
