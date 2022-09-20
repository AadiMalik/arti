<?php

namespace App\Http\Controllers;

use App\PhoneCount;
use Illuminate\Http\Request;

class PhoneCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arti_phone = PhoneCount::where('arti_id',Auth()->user()->id)->get();
        return view('client/phone.index',compact('arti_phone'));
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
        $arti_phone = new PhoneCount;
        $arti_phone->arti_id = $request->arti_id;
        $arti_phone->user_id = $request->user_id;
        $arti_phone->hit = 1;
        $arti_phone->save();
        return back();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhoneCount  $phoneCount
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneCount $phoneCount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneCount  $phoneCount
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneCount $phoneCount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneCount  $phoneCount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneCount $phoneCount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneCount  $phoneCount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneCount $phoneCount)
    {
        //
    }
}
