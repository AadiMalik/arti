<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneCount extends Model
{
    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
