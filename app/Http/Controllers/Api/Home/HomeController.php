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
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    use ResponseAPI;
    public function index(Request $request)
    {
        $wh = [];
        if (isset($request->search) && $request->search != 0 && $request->search != '') {
            $wh = [['name', 'LIKE', '%' . $request->search . '%']];
        }
        $product = Product::orderBy('hits', 'DESC')->where('zamidar', 0)->where($wh)->get();
        $product_image = ProductImage::all();
        $user_product = UserProduct::orderBy('created_at', 'ASC')->get();
        $featured_sale_product = OtherProduct::orderBy('created_at', 'DESC')->where($wh)->where('expiry', '>', Carbon::now())->get();
        $normal_sale_product = OtherProduct::orderBy('created_at', 'DESC')->where($wh)->where('expiry', '<', Carbon::now())->orWhere('expiry', '=', null)->get();
        $products = [];
        $images = [];
        foreach ($product as $item) {
            foreach ($product_image->where('product_id', $item->id) as $item1) {
                $images[] = [
                    "id" => $item1->id,
                    "product_id" => $item1->product_id,
                    "image" => $item1->image,
                    "created_at" => $item1->created_at,
                    "updated_at" => $item1->updated_at
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
        $data = [
            "products" => $products,
            "featured_sale_product" => $featured_sale_product,
            "normal_sale_product" => $normal_sale_product
        ];
        return $this->success(
            "Success!",
            $data
        );
    }

    public function arti(Request $request)
    {
        $wh_arti = [];
        if (isset($request->search) && $request->search != 0 && $request->search != '') {
            $wh_arti[] = [['username', 'LIKE', '%' . $request->search . '%']];
            $wh_arti[] = [['first_name', 'LIKE', '%' . $request->search . '%']];
            $wh_arti[] = [['last_name', 'LIKE', '%' . $request->search . '%']];
            $wh_arti[] = [['phone1', 'LIKE', '%' . $request->search . '%']];
        }
        $arti = User::orderBy('created_at', 'ASC')->get();
        $rating = Rating::all();
        $verify_arti = [];
        $normal_arti = [];
        foreach ($arti->where('verify', 0) as $item) {
            if ($item->roles[0]['title'] == 'Arti') {
                $verify_arti[] = [
                    "id" => $item->id ?? '',
                    "first_name" => $item->first_name ?? '',
                    "last_name" => $item->last_name ?? '',
                    "image" => $item->image ?? '',
                    "rating" => number_format($rating->where('arti_id', $item->id)->avg('rate') ?? 0, 2),
                    "reviews" => $rating->where('arti_id', $item->id)->count(),
                    "follows" => ArtiFallow::where('arti_id', $item->id)->count(),
                    "followed" => (ArtiFallow::where('user_id', $request->user_id)->where('arti_id', $item->id)->count() > 0) ? true : false,
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
                    "rating" => number_format($rating->where('arti_id', $item->id)->avg('rate') ?? 0, 2),
                    "reviews" => $rating->where('arti_id', $item->id)->count(),
                    "follows" => ArtiFallow::where('arti_id', $item->id)->count(),
                    "followed" => (ArtiFallow::where('user_id', $request->user_id)->where('arti_id', $request->id)->count() > 0) ? true : false,
                ];
            }
        }
        $data = [
            "verify_arti" => $verify_arti,
            "other_arti" => $normal_arti
        ];
        return $this->success(
            "Success!",
            $data
        );
    }

    public function fallow(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'arti_id' => 'required',
            'user_id' => 'required'
        ], $this->validationMessage());

        if ($validation->fails()) {
            return $this->validationResponse(implode(' ', $validation->errors()->all()));
        }
        $id = $request->arti_id;
        $arti = User::with(['district_name', 'tehsil_name'])->find($id);
        if (isset($arti)) {
            $follow = ArtiFallow::where('arti_id', $request->arti_id)->where('user_id', $request->user_id)->first();
            if (isset($follow)) {
                $follow->delete();
            } else {
                $arti_fallow = new ArtiFallow;
                $arti_fallow->arti_id = $request->arti_id;
                $arti_fallow->user_id = $request->user_id;
                $arti_fallow->save();
            }

           return $this->arti($request);
        } else {
            return $this->error(
                "Commission Agent Not Found!"
            );
        }
    }
}
