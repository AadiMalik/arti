<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    public function product_name()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user_name()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
