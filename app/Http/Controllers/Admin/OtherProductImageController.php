<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OtherProduct;
use App\OtherProductImage;
use Illuminate\Http\Request;

class OtherProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $other = OtherProduct::where('user_id', Auth()->user()->id)->get();
        $other_image = OtherProductImage::where('user_id', Auth()->user()->id)->get();
        return view('admin/forsale_image.index', compact('other', 'other_image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'other_id' => 'required',
                'image' => 'required|max:10248'
            ]
        );
        $other_image = new OtherProductImage;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'Images/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $other_image->image = $upload . $filename;
        }
        $other_image->user_id = Auth()->user()->id;
        $other_image->other_id = $request->other_id;
        $other_image->save();
        return redirect('admin/forsale-image')->with('success', 'Product Image has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherProductImage  $OtherProductImage
     * @return \Illuminate\Http\Response
     */
    public function show(OtherProductImage $OtherProductImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherProductImage  $OtherProductImage
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherProductImage $OtherProductImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherProductImage  $OtherProductImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherProductImage $OtherProductImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherProductImage  $OtherProductImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $UserGallery = OtherProductImage::find($request->id);
        $UserGallery->delete();
        return response(['message' => 'Product Image delete successfully']);
    }
}
