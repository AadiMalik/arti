<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductPost;
use App\UserProduct;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_product = UserProduct::orderBy('created_at', 'DESC')->where('user_id', Auth()->user()->id)->get();
        return view('client/user_product.index', compact('user_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = $request->category;
        if ($category != '') {
            $product = Product::where('category_id', $category)->get();
        } else {
            $product = Product::orderBy('name', 'ASC')->get();
        }
        $category = Category::orderBy('name', 'ASC')->get();
        $product_image = ProductImage::all();
        return view('client/user_product.create', compact('product', 'product_image', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate(
            [
                'product' => 'required'
            ]
        );

        foreach ($request->product as $index => $item) {
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
            $user_product->image1 = $product_image[0]['image'];
            $user_product->image2 = $product_image[1]['image'];
            $user_product->save();
        }
        return redirect('user-product')->with('success', 'Products has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userproduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function show(userproduct $userproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::orderBy('name', 'ASC')->where('zamidar', 0)->get();
        $user_product = UserProduct::where('user_id', $id)->get();
        return view('client/user_product.edit', compact('user_product', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function updateBy(Request $request)
    {
        if ($request->ajax()) {
            UserProduct::find($request->id)
                ->update([
                    'price_low' => $request->price_low,
                    'price_high' => $request->price_high
                ]);

            return response()->json(['success' => true]);
        }
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validation = $request->validate(
            [
                'price_high' => 'required|max:255',
                'weight' => 'required|max:191',
                'price_low' => 'required'
            ]
        );
        foreach ($request->id as $index => $item) {

            $user_product = UserProduct::find($request->id[$index]);
            $user_product->price_high = $request->price_high[$index];
            $user_product->price_low = $request->price_low[$index];
            $user_product->weight = $request->weight[$index];
            $user_product->weight_type = $request->weight_type[$index];
            $user_product->update();
            //post data
            $user_product = UserProduct::find($request->id[$index]);
            $product_name[] = $user_product->product_name->name;
            $product_type[] = $user_product->product_name->type;
            $product_price_low[] = $user_product->price_low;
            $product_price_high[] = $user_product->price_high;
            $product_weight[] = $user_product->weight . '/' . $user_product->weight_type;
            $product_image[] = $user_product->image1;
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
        return redirect('user-product')->with('success', 'Product has updated!');
    }
    public function imageEdit($id)
    {
        $user_product = UserProduct::find($id);
        return view('client/user_product.image_update', compact('user_product'));
    }
    public function imageUpdate(Request $request, $id)
    {
        $user_product = UserProduct::find($id);
        if ($request->hasfile('image1')) {
            $image = $request->file('image1');
            $upload = 'Images';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $user_product->image1 = $upload . $filename;
        }
        if ($request->hasfile('image2')) {
            $image = $request->file('image2');
            $upload = 'Images';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $user_product->image2 = $upload . $filename;
        }
        $user_product->description = $request->description;
        $user_product->update();
        return redirect('user-product')->with('success', 'Product Images has updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $userproduct = UserProduct::find($request->id);
        $userproduct->delete();
        return response(['message' => 'Product delete successfully']);
    }

    public function post(Request $request)
    {

        foreach ($request->product_id as $item) {
            $user_product = UserProduct::find($item);
            $product_name[] = $user_product->product_name->name;
            $product_type[] = $user_product->product_name->type;
            $product_price_low[] = $user_product->price_low;
            $product_price_high[] = $user_product->price_high;
            $product_weight[] = $user_product->weight;
            $product_image[] = $user_product->image1;
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
        return back()->with('success', 'Post created!');
        // dd($product_name,$product_price_low,$product_price_high,$product_weight);
        // dd($request->all());

    }
}
