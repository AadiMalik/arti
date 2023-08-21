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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArtiProfileController extends Controller
{
    use ResponseAPI;
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'arti_id' => 'required'
        ], $this->validationMessage());

        if ($validation->fails()) {
            return $this->validationResponse(implode(' ', $validation->errors()->all()));
        }
        $id = $request->arti_id;
        $user_id = $request->user_id ?? null;
        $arti = User::with(['district_name', 'tehsil_name'])->find($id);
        if (isset($arti)) {
            $user_product = UserProduct::where('user_id', $id)->get();
            $gallery = UserGallery::where('user_id', $id)->get();
            $videos = UserVideo::where('user_id', $id)->get();
            $rating = Rating::where('arti_id', $id)->avg('rate');
            $reviews = Rating::with('user_name')->where('arti_id', $id)->get();
            $comment = Comment::with('user_name')->orderBy('created_at', 'desc')->get();
            $arti_fallow = ArtiFallow::where('arti_id', $id)->count();
            $post = ProductPost::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
            $followed = false;
            if ($user_id != null) {
                $follow = ArtiFallow::where('arti_id', $id)->where('user_id', $user_id)->count();
                $followed = ($follow > 0) ? true : false;
            }
            $posts = [];
            $products = [];
            foreach ($post as $index => $item) {
                $liked = false;
                if ($item->type == 0) {
                    $product_name = json_decode($item->name, true);
                    $product_image = json_decode($item->image, true);
                    $product_type = json_decode($item->type, true);
                    $product_price_low = json_decode($item->price_low, true);
                    $product_price_high = json_decode($item->price_high, true);
                    $product_weight = json_decode($item->weight, true);
                    if ($product_name != null) {
                        foreach ($product_name as $index => $item1) {
                            $products[] = [
                                "product_name" => $product_name[$index],
                                "product_image" => $product_image[$index],
                                "product_type" => $product_type[$index],
                                "product_low_price" => $product_price_low[$index],
                                "product_high_price" => $product_price_high[$index],
                                "product_wieght" => $product_weight[$index]
                            ];
                        }
                    }
                };
                if ($user_id != null) {
                    $like_check = $comment->where('post_id', $item->id)->where('user_id', $user_id)->where('comment', null)->count();
                    $liked = ($like_check > 0) ? true : false;
                }
                $comments = Comment::with('user_name')->where('post_id', $item->id)->where('comment', '!=', null)->get();
                $posts[] = [
                    "id" => $item->id,
                    "date_time" => ($item->created_at->addDay(3) <= Carbon::now()) ? $item->created_at->format('d-m-y h:i A') : $item->created_at->diffForHumans(),
                    "type" => $item->post_type,
                    "products" => $products,
                    "description" => $item->description ?? '',
                    "total_likes" => $comment->where('post_id', $item->id)->where('comment', null)->count(),
                    "liked" => $liked,
                    "total_comments" => $comment->where('post_id', $item->id)->where('comment', '!=', null)->count(),
                    "comments" => $comments
                ];
            }
            $data = [
                "arti" => $arti,
                "rating" => ($rating != null) ? $rating : 0,
                "reviews" => $reviews,
                "arti_fallow" => ($arti_fallow != null) ? $arti_fallow : 0,
                "followed" => $followed,
                "arti_posts" => $posts,
                "gallery" => $gallery,
                "videos" => $videos,
                "arti_sale_product" => $user_product
            ];
            return $this->success(
                "Success!",
                $data
            );
        } else {
            return $this->error(
                "Commission Agent Not Found!"
            );
        }
    }
    public function fallow_like_comment(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'type' => 'required',
            'arti_id' => 'required',
            'user_id' => 'required'
        ], $this->validationMessage());

        if ($validation->fails()) {
            return $this->validationResponse(implode(' ', $validation->errors()->all()));
        }
        // Type 1=follow, 2 =like, 3=comment
        if ($request->type == 1) {
            $follow = ArtiFallow::where('arti_id', $request->arti_id)->where('user_id', $request->user_id)->first();
            if (isset($follow)) {
                $follow->delete();
            } else {
                $arti_fallow = new ArtiFallow;
                $arti_fallow->arti_id = $request->arti_id;
                $arti_fallow->user_id = $request->user_id;
                $arti_fallow->save();
            }
        } elseif ($request->type == 2) {
            $validation = Validator::make($request->all(), [
                'post_id' => 'required'
            ], $this->validationMessage());

            if ($validation->fails()) {
                return $this->validationResponse(implode(' ', $validation->errors()->all()));
            }
            $likes = Comment::where('post_id', $request->post_id)->where('user_id', $request->user_id)->where('comment', null)->first();
            if (isset($likes)) {
                $likes->delete();
            } else {
                $likes = new Comment;
                $likes->post_id = $request->post_id;
                $likes->user_id = $request->user_id;
                $likes->likes = 1;
                $likes->save();
            }
        } elseif ($request->type == 3) {
            $validation = Validator::make($request->all(), [
                'post_id' => 'required',
                'comment' => 'required|max:100'
            ], $this->validationMessage());

            if ($validation->fails()) {
                return $this->validationResponse(implode(' ', $validation->errors()->all()));
            }
            $comment = new Comment;
            $comment->user_id = $request->user_id;
            $comment->post_id = $request->post_id;
            $comment->comment = $request->comment;
            $comment->save();
        } else {
            return $this->error("Type is wrong!");
        }
        $id = $request->arti_id;
        $user_id = $request->user_id;
        $arti = User::with(['district_name', 'tehsil_name'])->find($id);
        if (isset($arti)) {
            $user_product = UserProduct::where('user_id', $id)->get();
            $gallery = UserGallery::where('user_id', $id)->get();
            $videos = UserVideo::where('user_id', $id)->get();
            $rating = Rating::where('arti_id', $id)->avg('rate');
            $reviews = Rating::with('user_name')->where('arti_id', $id)->get();
            $comment = Comment::with('user_name')->orderBy('created_at', 'desc')->get();
            $arti_fallow = ArtiFallow::where('arti_id', $id)->count();
            $post = ProductPost::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
            $followed = false;
            if ($user_id != null) {
                $follow = ArtiFallow::where('arti_id', $id)->where('user_id', $user_id)->count();
                $followed = ($follow > 0) ? true : false;
            }
            $posts = [];
            $products = [];
            foreach ($post as $index => $item) {
                $liked = false;
                if ($item->type == 0) {
                    $product_name = json_decode($item->name, true);
                    $product_image = json_decode($item->image, true);
                    $product_type = json_decode($item->type, true);
                    $product_price_low = json_decode($item->price_low, true);
                    $product_price_high = json_decode($item->price_high, true);
                    $product_weight = json_decode($item->weight, true);
                    if ($product_name != null) {
                        foreach ($product_name as $index => $item1) {
                            $products[] = [
                                "product_name" => $product_name[$index],
                                "product_image" => $product_image[$index],
                                "product_type" => $product_type[$index],
                                "product_low_price" => $product_price_low[$index],
                                "product_high_price" => $product_price_high[$index],
                                "product_wieght" => $product_weight[$index]
                            ];
                        }
                    }
                };
                if ($user_id != null) {
                    $like_check = $comment->where('post_id', $item->id)->where('user_id', $user_id)->where('comment', null)->count();
                    $liked = ($like_check > 0) ? true : false;
                }
                $comments = Comment::with('user_name')->where('post_id', $item->id)->where('comment', '!=', null)->get();
                $posts[] = [
                    "id" => $item->id,
                    "date_time" => ($item->created_at->addDay(3) <= Carbon::now()) ? $item->created_at->format('d-m-y h:i A') : $item->created_at->diffForHumans(),
                    "type" => $item->post_type,
                    "products" => $products,
                    "description" => $item->description ?? '',
                    "total_likes" => $comment->where('post_id', $item->id)->where('comment', null)->count(),
                    "liked" => $liked,
                    "total_comments" => $comment->where('post_id', $item->id)->where('comment', '!=', null)->count(),
                    "comments" => $comments
                ];
            }
            $data = [
                "arti" => $arti,
                "rating" => ($rating != null) ? $rating : 0,
                "reviews" => $reviews,
                "arti_fallow" => ($arti_fallow != null) ? $arti_fallow : 0,
                "followed" => $followed,
                "arti_posts" => $posts,
                "gallery" => $gallery,
                "videos" => $videos,
                "arti_sale_product" => $user_product
            ];
            return $this->success(
                "Success!",
                $data
            );
        } else {
            return $this->error(
                "Commission Agent Not Found!"
            );
        }
    }

    public function gallery($id)
    {

        $gallery = UserGallery::where('user_id', $id)->get();
        if (isset($gallery)) {
            return $this->success(
                "Success!",
                $gallery
            );
        } else {
            return $this->error(
                "Data Not Found!"
            );
        }
    }

    public function videos($id)
    {

        $videos = UserVideo::where('user_id', $id)->get();
        if (isset($videos)) {
            return $this->success(
                "Success!",
                $videos
            );
        } else {
            return $this->error(
                "Data Not Found!"
            );
        }
    }


    public function add_review(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'arti_id' => 'required',
            'user_id' => 'required',
            'rate' => 'required'
        ], $this->validationMessage());

        if ($validation->fails()) {
            return $this->validationResponse(implode(' ', $validation->errors()->all()));
        }
        $review = new Rating;
        $review->user_id = $request->user_id;
        $review->arti_id = $request->arti_id;
        $review->rate = $request->rate;
        $review->status = 0;
        $review->remarks = $request->remarks;
        $review->save();
        if (isset($review)) {
            $rating = Rating::with('user_name')->where('arti_id', $request->arti_id)->get();
            return $this->success(
                "Rating Save Successfully!",
                $rating
            );
        } else {
            return $this->error(
                "Rating Not Save!"
            );
        }
    }
}
