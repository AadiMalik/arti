<?php

namespace App\Http\Controllers;

use App\OtherProduct;
use App\OtherProductImage;
use Illuminate\Http\Request;

class OtherProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = OtherProduct::orderBy('created_at','DESC')->where('user_id',Auth()->user()->id)->get();
        return view('client/forsale.index',compact('product'));
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
                'price' => 'required|max:191',
                'image1' => 'required',
                'image2' => 'required',
                'description' => 'required'
            ]
        );
        $product = new OtherProduct;
        
        $product->name = ucfirst($request->name);
        $product->price = $request->price;
        $product->description = $request->description;
        $product->user_id = Auth()->user()->id;
        $product->save();

        $productImage = new OtherProductImage;
        if ($request->hasfile('image1')) {
            $file = $request->file('image1');
            $upload = 'Images';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $productImage->image =  $upload . $filename;
        }
        $productImage->other_id = $product->id;
        $productImage->user_id = Auth()->user()->id;
        $productImage->save();
        $productImage1 = new OtherProductImage;
        if ($request->hasfile('image2')) {
            $file = $request->file('image2');
            $upload = 'Images';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $productImage1->image =  $upload . $filename;
        }
        $productImage1->other_id = $product->id;
        $productImage->user_id = Auth()->user()->id;
        $productImage1->save();
        return redirect('forsale')->with('success','For Sale Product has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function show(OtherProduct $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = OtherProduct::find($id);
        return view('client/forsale.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required|max:255',
                'description' => 'required'
            ]
        );
        $product = OtherProduct::find($id);
        
        $product->name = ucfirst($request->name);
        $product->price = $request->price;
        $product->description = $request->description;
        
        $product->update();
        return redirect('forsale')->with('success','For Sale Product has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = OtherProduct::find($request->id);
        $product->delete();
        return response(['message' => 'For Sale Product delete successfully']);
    }
}
