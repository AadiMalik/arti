<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at','DESC')->where('user_id',Auth()->user()->id)->get();
        return view('admin/product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name','ASC')->get();
        return view('admin/product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'image1' => 'required',
                'image2' => 'required',
                'category' => 'required',
                'description' => 'required|max:990',
                'tags' => 'max:50',
                'type' => 'max:100'
            ]
        );
        $product = new Product;
        
        $product->name = ucfirst($request->name);
        // $product->price_high = $request->price_high;
        // $product->price_low = $request->price_low;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->zamidar = 0;
        $product->type = ucfirst($request->type);
        $product->status = 0;
        $product->user_id = Auth()->user()->id;
        $product->tags = $request->tags;
        $product->save();

        $productImage = new ProductImage;
        if ($request->hasfile('image1')) {
            $file = $request->file('image1');
            $upload = 'Images';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $productImage->image =  $upload . $filename;
        }
        $productImage->product_id = $product->id;
        $productImage->save();
        $productImage1 = new ProductImage;
        if ($request->hasfile('image2')) {
            $file = $request->file('image2');
            $upload = 'Images';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $productImage1->image =  $upload . $filename;
        }
        $productImage1->product_id = $product->id;
        $productImage1->save();
        return redirect('admin/product')->with('success','Product has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('name','ASC')->get();
        $product = Product::find($id);
        return view('admin/product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'status' => 'required',
                'category' => 'required',
                'description' => 'required|max:990',
                'tags' => 'max:50',
                'type' => 'max:100'
                
            ]
        );
        $product = Product::find($id);
        
        $product->name = ucfirst($request->name);
        // $product->price_high = $request->price_high;
        // $product->price_low = $request->price_low;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->type = ucfirst($request->type);
        $product->status = $request->status;
        $product->tags = $request->tags;
        $product->update();
        return redirect('admin/product')->with('success','Product has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        return response(['message' => 'Product delete successfully']);
    }
}
