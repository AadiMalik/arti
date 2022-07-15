<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category_name()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function ProductImage()
    {
        return $this->belongsToMany(ProductImage::class);
    }
}
