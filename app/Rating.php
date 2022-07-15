<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function arti_name()
    {
        return $this->belongsTo(User::class, 'arti_id');
    }
}
