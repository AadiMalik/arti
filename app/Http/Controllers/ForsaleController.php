<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ForsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at','DESC')->where('user_id',Auth()->user()->id)->get();
        return view('forsale.index',compact('product'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/forsale.create');
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
                'price_high' => 'required|max:191',
                'price_low' => 'required|max:191',
                'image1' => 'required',
                'image2' => 'required',
                'description' => 'required'
            ]
        );
        $product = new Product;
        
        $product->name = ucfirst($request->name);
        $product->price_high = $request->price_high;
        $product->price_low = $request->price_low;
        $product->description = $request->description;
        $product->zamidar = 1;
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
        return redirect('forsale')->with('success','Product has created!');
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
        $product = Product::find($id);
        return view('client/forsale.edit',compact('product'));
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
                'price_high' => 'required|max:255',
                'price_low' => 'required',
                'status' => 'required',
                'description' => 'required'
            ]
        );
        $product = Product::find($id);
        
        $product->name = ucfirst($request->name);
        $product->price_high = $request->price_high;
        $product->price_low = $request->price_low;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->type = ucfirst($request->type);
        $product->status = $request->status;
        $product->tags = $request->tags;
        
        $product->update();
        return redirect('forsale')->with('success','Product has updated!');
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
