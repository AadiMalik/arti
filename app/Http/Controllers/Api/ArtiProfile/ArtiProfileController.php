<?php

namespace App\Http\Controllers\Api\ArtiProfile;

use App\ArtiFallow;
use App\Comment;
use App\Http\Controllers\Controller;
use App\ProductPost;
use App\Rating;
use App\Traits\ResponseAPI;
use App\User;
use App\UserGallery;
use App\UserProduct;
use App\UserVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArtiProfileController extends Controller
{
    use ResponseAPI;
    public function index($id)
    {
        $arti = User::find($id);
        $user_product = UserProduct::where('user_id', $id)->get();
        $gallery = UserGallery::where('user_id', $id)->get();
        $videos = UserVideo::where('user_id', $id)->get();
        $rating = Rating::where('arti_id', $id)->avg('rate');
        $comment = Comment::with('user_name')->orderBy('created_at', 'desc')->get();
        $arti_fallow = ArtiFallow::where('arti_id', $id)->count();
        $post = ProductPost::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        $posts = [];
        $products = [];
        foreach ($post as $index => $item) {
            if ($item->type == 0) {
                $product_name = json_decode($item->name, true);
                $product_image = json_decode($item->image, true);
                $product_type = json_decode($item->type, true);
                $product_price_low = json_decode($item->price_low, true);
                $product_price_high = json_decode($item->price_high, true);
                $product_weight = json_decode($item->weight, true);
                foreach ($product_name as $index => $item1){
                    $products[]=[
                        "product_name"=>$product_name[$index],
                        "product_image"=>$product_image[$index],
                        "product_type"=>$product_type[$index],
                        "product_low_price"=>$product_price_low[$index],
                        "product_high_price"=>$product_price_high[$index],
                        "product_wieght"=>$product_weight[$index]
                    ];
                }
            }
            $posts[] = [
                "id"=>$item->id,
                "date_time" => ($item->created_at->addDay(3) <= Carbon::now()) ? $item->created_at->format('d-m-y h:i A') : $item->created_at->diffForHumans(),
                "type"=>$item->post_type,
                "products"=>$products,
                "description"=>$item->description??'',
                "total_likes"=>$comment->where('post_id', $item->id)->where('comment',null)->count(),
                "total_comments"=>$comment->where('post_id', $item->id)->where('comment', '!=', null)->count(),
                "comments"=>$comment->where('post_id', $item->id)->where('comment', '!=', null)
            ];
        }
        $data=[
            "arti"=>$arti,
            "rating"=>$rating,
            "arti_fallow"=>$arti_fallow,
            "arti_posts"=>$posts,
            "gallery"=>$gallery,
            "videos"=>$videos,
            "arti_sale_product"=>$user_product
        ];
        return $this->success(
            "Success!",
            $data
        );
    }
}
