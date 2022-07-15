<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherProductImage extends Model
{
    public function other_name()
    {
        return $this->belongsTo(OtherProduct::class, 'other_id');
    }
}
