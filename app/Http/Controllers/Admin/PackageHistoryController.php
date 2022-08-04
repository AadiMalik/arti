<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PackageHistory;
use Illuminate\Http\Request;

class PackageHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package_history = PackageHistory::orderBy('created_at','DESC')->get();
        return view('admin/package_history.index',compact('package_history'));
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
     * @param  \App\PackageHistory  $packageHistory
     * @return \Illuminate\Http\Response
     */
    public function show(PackageHistory $packageHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageHistory  $packageHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageHistory $packageHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageHistory  $packageHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageHistory $packageHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageHistory  $packageHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageHistory $packageHistory)
    {
        //
    }
}
