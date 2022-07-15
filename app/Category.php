<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Category()
    {
        return $this->belongsToMany(Product::class);
    }
}
