<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::orderBy('created_at','DESC')->get();
        return view('admin/package.index',compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package.create');
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
                'price' => 'required|max:255',
                'no' => 'required|unique:packages,no',
                'add' => 'required',
                'days' => 'required|max:10',
                'color' => 'required'
            ]
        );
        $package = new Package;
        $package->name = $request->name;
        $package->price = $request->price;
        $package->no = $request->no;
        $package->add = $request->add;
        $package->days = $request->days;
        $package->color = $request->color;
        $package->save();
        return redirect('admin/package')->with('success','Package has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin/package.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required|max:255',
                'add' => 'required',
                'days' => 'required|max:10',
                'status' => 'required',
                'color' => 'required'
            ]
        );
        $package = Package::find($id);
        $package->name = $request->name;
        $package->price = $request->price;
        $package->add = $request->add;
        $package->days = $request->days;
        $package->color = $request->color;
        $package->status = $request->status;
        $package->update();
        return redirect('admin/package')->with('success','Package has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $package = Package::find($request->id);
        $package->delete();
        return response(['message' => 'Package delete successfully']);
    }
}
