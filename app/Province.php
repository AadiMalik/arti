<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function District()
    {
        return $this->belongsToMany(District::class);
    }
}
