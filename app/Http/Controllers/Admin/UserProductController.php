<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
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
        $user_product = UserProduct::orderBy('created_at','DESC')->get();
        return view('admin/user_product.index',compact('user_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::orderBy('name','ASC')->get();
        $user = User::orderBy('name','ASC')->get();
        return view('admin/user_product.create',compact('product','user'));
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
                'product' => 'required',
                'user' => 'required',
                'price_high' => 'required|max:191',
                'price_low' => 'required|max:191'
            ]
        );
        $user_product = new UserProduct;
        
        $user_product->product_id = $request->product;
        $user_product->price_high = $request->price_high;
        $user_product->price_low = $request->price_low;
        $user_product->status = 0;
        $user_product->user_id = $request->user;
        $user_product->save();
        return redirect('admin/user-product')->with('success','Arti Product has created!');
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
        $product = Product::orderBy('name','ASC')->get();
        $user_product = UserProduct::find($id);
        return view('admin/user_product.edit',compact('user_product','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProduct  $userproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'product' => 'required',
                'status' => 'required',
                'price_high' => 'required|max:255',
                'price_low' => 'required'
            ]
        );
        $user_product = UserProduct::find($id);
        
        $user_product->product_id = $request->product;
        $user_product->price_high = $request->price_high;
        $user_product->price_low = $request->price_low;
        $user_product->status = $request->status;
        $user_product->update();
        return redirect('admin/user-product')->with('success','Arti Product has updated!');
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
        return response(['message' => 'Arti Product delete successfully']);
    }
}
