<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Tehsil;
use Illuminate\Http\Request;

class TehsilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tehsil = Tehsil::orderBy('created_at','DESC')->get();
        return view('admin/tehsil.index',compact('tehsil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = District::orderBy('name','asc')->get();
        return view('admin/tehsil.create',compact('district'));
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
                'district_id' =>'required'
            ]
        );
        $tehsil = new Tehsil;
        $tehsil->name = $request->name;
        $tehsil->district_id = $request->district_id;
        $tehsil->save();
        return redirect('admin/tehsil')->with('success','Tehsil has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function show(Tehsil $tehsil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tehsil = Tehsil::find($id);
        $district = District::orderBy('name','asc')->get();
        return view('admin/tehsil.edit',compact('tehsil','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'district_id' =>'required'
            ]
        );
        $tehsil = Tehsil::find($id);
        $tehsil->name = $request->name;
        $tehsil->district_id = $request->district_id;
        $tehsil->update();
        return redirect('admin/tehsil')->with('success','Tehsil has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tehsil = Tehsil::find($request->id);
        $tehsil->delete();
        return response(['message' => 'Tehsil delete successfully']);
    }
}
