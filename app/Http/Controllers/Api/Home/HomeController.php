<?php

namespace App\Http\Controllers\Api\Home;

use App\ArtiFallow;
use App\Http\Controllers\Controller;
use App\OtherProduct;
use App\Product;
use App\ProductImage;
use App\Rating;
use App\Review;
use App\User;
use App\UserProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;

class HomeController extends Controller
{
    use ResponseAPI;
    public function index(Request $request)
    {
        $wh=[];
        $wh_arti=[];
        if(isset($request->search) && $request->search!=0 && $request->search!=''){
            $wh=[['name','LIKE','%'.$request->search.'%']];
            $wh_arti[]=[['username','LIKE','%'.$request->search.'%']];
            $wh_arti[]=[['first_name','LIKE','%'.$request->search.'%']];
            $wh_arti[]=[['last_name','LIKE','%'.$request->search.'%']];
            $wh_arti[]=[['phone1','LIKE','%'.$request->search.'%']];
        }
        $product = Product::orderBy('hits', 'DESC')->where('zamidar', 0)->where($wh)->get();
        $product_image = ProductImage::all();
        $user_product = UserProduct::orderBy('created_at', 'ASC')->get();
        $featured_sale_product = OtherProduct::orderBy('created_at', 'DESC')->where($wh)->where('expiry','>', Carbon::now())->get();
        $normal_sale_product = OtherProduct::orderBy('created_at', 'DESC')->where($wh)->where('expiry','<', Carbon::now())->orWhere('expiry','=', null)->get();
        $arti = User::orderBy('created_at', 'ASC')->where($wh_arti)->get();
        $rating = Rating::all();
        $products = [];
        $verify_arti = [];
        $normal_arti = [];
        $images =[];
        foreach ($product as $item) {
            foreach($product_image->where('product_id', $item->id) as $item1){
                $images[]=[
                    "id"=>$item1->id,
                    "product_id"=>$item1->product_id,
                    "image"=>$item1->image,
                    "created_at"=>$item1->created_at,
                    "updated_at"=>$item1->updated_at
                ];
            }
            
            $products[] = [
                "id" => $item->id ?? '',
                "name" => $item->name ?? '',
                "type" => $item->type ?? '',
                "price_low" => $user_product->where('product_id', $item->id)->min('price_low') ?? $item->price_low,
                "price_high" => $user_product->where('product_id', $item->id)->max('price_high') ?? $item->price_high,
                "product_images" => $images
            ];
        }
        foreach ($arti->where('verify', 0) as $item) {
            if ($item->roles[0]['title'] == 'Arti') {
                $verify_arti[] = [
                    "id" => $item->id ?? '',
                    "first_name" => $item->first_name ?? '',
                    "last_name" => $item->last_name ?? '',
                    "image" => $item->image ?? '',
                    "rating"=>($rating->where('arti_id', $item->id)->count()>0)?($rating->where('arti_id', $item->id)->avg('rate')/$rating->where('arti_id', $item->id)->count()):0,
                    "reviews" => $rating->where('arti_id', $item->id)->count()
                ];
            }
        }
        foreach ($arti->where('verify', 1) as $item) {
            if ($item->roles[0]['title'] == 'Arti') {
                $normal_arti[] = [
                    "id" => $item->id ?? '',
                    "first_name" => $item->first_name ?? '',
                    "last_name" => $item->last_name ?? '',
                    "image" => $item->image ?? '',
                    "rating"=>($rating->where('arti_id', $item->id)->count()>0)?($rating->where('arti_id', $item->id)->avg('rate')/$rating->where('arti_id', $item->id)->count()):0,
                    "reviews" => $rating->where('arti_id', $item->id)->count()
                ];
            }
        }
        $data=[
            "products"=>$products,
            "verify_arti"=>$verify_arti,
            "normal_arti"=>$normal_arti,
            "featured_sale_product"=>$featured_sale_product,
            "normal_sale_product"=>$normal_sale_product
        ];
        return $this->success(
            "Success!",
            $data
        );
    }
}
