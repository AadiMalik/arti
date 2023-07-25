<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use ResponseAPI;
    public function product_detail($id)
    {
        
        $product = Product::find($id);
        $featured = DB::table('users')->where('verify', 1)
            ->join('user_products', 'users.id', '=', 'user_products.user_id')
            ->select('users.*', 'user_products.price_low', 'user_products.price_high', 'user_products.image1', 'user_products.user_id', 'user_products.product_id')
            ->where('user_products.product_id',$id)
            ->get();
        $verify = DB::table('users')->where('verify', 0)
            ->join('user_products', 'users.id', '=', 'user_products.user_id')
            ->select('users.*', 'user_products.price_low', 'user_products.price_high', 'user_products.image1', 'user_products.user_id', 'user_products.product_id')
            ->where('user_products.product_id',$id)
            ->get();
        $product_detail = Product::find($id);
        $product_detail->hits = $product_detail->hits + 1;
        $product_detail->update();
        $product_image = ProductImage::where('product_id', $id)->get();
        $data=[
            "product"=>$product,
            "product_image"=>$product_image,
            "featured_arti"=>$featured,
            "verify_arti"=>$verify
        ];
        return $this->success(
            "Success!",
            $data
        );
    }
}
