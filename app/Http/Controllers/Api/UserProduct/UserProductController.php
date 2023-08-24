<?php

namespace App\Http\Controllers\Api\UserProduct;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\ProductPost;
use App\Traits\ResponseAPI;
use App\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewPostNotification;
use Exception;
use Illuminate\Support\Facades\DB;

class UserProductController extends Controller
{
    use ResponseAPI;

    public function index()
    {
        $category = Category::orderBy('name', 'ASC')->get();
        return $this->success("Success!", $category);
    }

    public function getByCategory(Request $request)
    {

        $category = $request->category;
        if ($category != '') {
            $product = Product::where('category_id', $category)->get();
        } else {
            $product = Product::orderBy('name', 'ASC')->get();
        }
        $products = [];
        foreach ($product as $item) {
            $product_image = ProductImage::where('product_id', $item->id)->get();
            $products[] = [
                "product" => $item,
                "product_image" => $product_image
            ];
        }
        return $this->success("Success!", $products);
    }

    public function productStore(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'product_id' => 'required'
        ], $this->validationMessage());

        if ($validation->fails()) {
            return $this->validationResponse(implode(' ', $validation->errors()->all()));
        }

        foreach ($request->product_id as $index => $item) {
            $product = Product::find($item);
            $product_image = ProductImage::where('product_id', $product->id)->get();
            $user_product = new UserProduct;

            $user_product->product_id = $product->id;
            $user_product->price_high = $product->price_high;
            $user_product->price_low = $product->price_low;
            $user_product->status = 0;
            $user_product->weight = $product->weight;
            $user_product->description = $product->description;
            $user_product->user_id = Auth()->user()->id;
            $user_product->image1 = $product_image[0]['image'] ?? '';
            $user_product->image2 = $product_image[1]['image'] ?? '';
            $user_product->save();
        }
        return $this->success("Product Add Successfully!", []);
    }

    public function ArtiProduct()
    {

        $user_product = UserProduct::with('product_name')->where('user_id', Auth()->user()->id)->get();
        return $this->success("Success!", $user_product);
    }

    public function post(Request $request)
    {
        try {
            DB::beginTransaction();
            $validation = Validator::make(
                $request->all(),
                [
                    'product_id' => 'required',
                    'price_high' => 'required|max:255',
                    'price_low' => 'required',
                    'weight' => 'required|max:191',
                    'weight_type' => 'required|max:191'
                ],
                $this->validationMessage()
            );
            if ($validation->fails()) {
                return $this->validationResponse(implode(' ', $validation->errors()->all()));
            }
            foreach ($request->product_id as $index => $item) {
                $user_product = UserProduct::find($request->product_id[$index]);
                $user_product->price_high = $request->price_high[$index];
                $user_product->price_low = $request->price_low[$index];
                $user_product->weight = $request->weight[$index];
                $user_product->weight_type = $request->weight_type[$index];
                $user_product->update();
                //post data
                $user_product = UserProduct::find($request->product_id[$index]);
                $product_name[] = $user_product->product_name->name??'N/A';
                $product_type[] = $user_product->product_name->type??'N/A';
                $product_price_low[] = $user_product->price_low??'0.00';
                $product_price_high[] = $user_product->price_high??'0.00';
                $product_weight[] = $user_product->weight . '-' . $user_product->weight_type??'N/A';
                $product_image[] = $user_product->image1??'N/A';
            }
            // dd($product_name,$product_price_low,$product_price_high,$product_weight);
            $post = new ProductPost;
            $post->user_id = Auth()->user()->id;
            $post->name = json_encode($product_name);
            $post->price_low = json_encode($product_price_low);
            $post->price_high = json_encode($product_price_high);
            $post->weight = json_encode($product_weight);
            $post->image = json_encode($product_image);
            $post->type = json_encode($product_type);
            $post->save();
            $user = Auth()->user();
            Notification::send($user, new NewPostNotification($user));
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return $this->success("Post created successfully!", []);
    }

    public function delete_product($id)
    {
        $userproduct = UserProduct::find($id);
        if (isset($userproduct)) {
            $userproduct->delete();
            return $this->success("Product delete successfully!", []);
        }else{
            return $this->error("Product not found!");
        }
    }
    public function delete_post($id)
    {
        $post = ProductPost::find($id);
        if (isset($userproduct)) {
            $post->delete();
            return $this->success("Post delete successfully!", []);
        }else{
            return $this->error("Post not found!");
        }
    }
}
