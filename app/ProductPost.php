<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPost extends Model
{
    
    public function arti_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
