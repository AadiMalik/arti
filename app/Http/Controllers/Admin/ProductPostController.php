<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductPost;
use Illuminate\Http\Request;

class ProductPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = ProductPost::orderBy('created_at', 'DESC')->get();
        return view('admin/post.index', compact('post'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductPost  $productPost
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPost $productPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductPost  $productPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPost $productPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductPost  $productPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPost $productPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductPost  $productPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ProductPost = ProductPost::find($request->id);
        $ProductPost->delete();
        return response(['message' => 'Product Post delete successfully']);
    }
}
