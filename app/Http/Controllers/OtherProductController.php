<?php

namespace App\Http\Controllers;

use App\District;
use App\OtherProduct;
use App\OtherProductImage;
use App\Tehsil;
use Carbon\Carbon;
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
        $product = OtherProduct::orderBy('created_at', 'DESC')->where('user_id', Auth()->user()->id)->get();
        return view('forsale.index', compact('product'));
    }

    public function category($category, $sub_category)
    {
        $add = OtherProduct::where('user_id', Auth()->user()->id)->count();
        // if(Auth()->user()->is_admin){
        $district  = District::orderBy('name', 'ASC')->get();
        $tehsil = Tehsil::orderBy('name', 'ASC')->get();
        return view('forsale.create', compact('category', 'sub_category', 'district', 'tehsil'));
        // }
        // if (Auth()->user()->adds < $add && Auth()->user()->expiry > Carbon::now()) {
        //     $district  = District::orderBy('name', 'ASC')->get();
        //     $tehsil = Tehsil::orderBy('name', 'ASC')->get();
        //     return view('forsale.create', compact('category', 'sub_category', 'district', 'tehsil'));
        // } else {
        //     $message = 'Your Package limit is ' . Auth()->user()->adds . ' And Your Package Expiry is ' . Auth()->user()->expiry.' please subscribe package on click <a class="btn btn-primary" href="'.url('package').'">here</a>';
        //     return redirect(route('client.home'))->with('error', $message);
        // }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $add = OtherProduct::where('user_id', Auth()->user()->id)->count();
        // if (Auth()->user()->package_name->add < $add && Auth()->user()->expiry > Carbon::now()) {
        return view('forsale.create');
        // } else {
        //     $message = "Your Package limit is " . Auth()->user()->package_name->add . " And Your Package Expiry is" . Auth()->user()->expiry;
        //     return redirect(route('client.home'))->with('error', $message);
        // }
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
                'name' => 'required|max:255',
                'price' => 'required|max:191',
                'image1' => 'required',
                'image2' => 'required',
                'address' => 'required',
                'district_id' => 'required',
                'tehsil_id' => 'required',
                'description' => 'required'
            ]
        );
        $product = new OtherProduct;
        if ($request->category == 'vehicles') {
            $validation = $request->validate(
                [
                    'company_name' => 'required|max:255'
                ]
            );
            $product->company_name = ucfirst($request->company_name);
        }

        $product->name = ucfirst($request->name);
        $product->price = $request->price;
        $product->address = $request->address;
        $product->district_id = $request->district_id;
        $product->tehsil_id = $request->tehsil_id;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->sub_category = $request->sub_category;
        $product->user_id = Auth()->user()->id;
        for ($i = 1; $i <= 12; $i++) {
            if ($request->hasfile('image' . $i . '')) {
                $image = $request->file('image' . $i . '');
                $upload = 'Images/';
                $filename = time() . $image->getClientOriginalName();
                $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
                if ($i == 1)
                    $product->image1 = $upload . $filename;
                if ($i == 2)
                    $product->image2 = $upload . $filename;
                if ($i == 3)
                    $product->image3 = $upload . $filename;
                if ($i == 4)
                    $product->image4 = $upload . $filename;
                if ($i == 5)
                    $product->image5 = $upload . $filename;
                if ($i == 6)
                    $product->image6 = $upload . $filename;
                if ($i == 7)
                    $product->image7 = $upload . $filename;
                if ($i == 8)
                    $product->image8 = $upload . $filename;
                if ($i == 9)
                    $product->image9 = $upload . $filename;
                if ($i == 10)
                    $product->image10 = $upload . $filename;
                if ($i == 11)
                    $product->image11 = $upload . $filename;
                if ($i == 12)
                    $product->image12 = $upload . $filename;
            }
        }
        $product->save();
        return redirect('forsale')->with('success', 'For Sale Product has created!');
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
        return view('client/forsale.edit', compact('product'));
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
        return redirect('forsale')->with('success', 'For Sale Product has updated!');
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
    public function feature(Request $request)
    {
        if (Auth()->user()->expiry !=null && Auth()->user()->expiry > Carbon::now()) {
            $featured = OtherProduct::where('user_id', Auth()->user()->id)->where('expiry', '>', Carbon::now())->get();
            if ($featured->count() < Auth()->user()->adds) {
                $product = OtherProduct::find($request->product_id);
                $product->expiry = Carbon::now()->addDays(Auth()->user()->days);
                $product->update();
            } else {
                return back()->with('error', 'Featured add limit is full');
            }
            return redirect('forsale')->with('success', 'For Sale Product has featured!');
        } else {
            return redirect('package');
        }
    }
}
