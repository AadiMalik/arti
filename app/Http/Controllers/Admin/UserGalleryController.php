<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserGallery;
use Illuminate\Http\Request;

class UserGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_gallery = UserGallery::all();
        return view('admin/user_gallery.index', compact('user_gallery'));
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
     * @param  \App\UserGallery  $userGallery
     * @return \Illuminate\Http\Response
     */
    public function show(UserGallery $userGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserGallery  $userGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(UserGallery $userGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserGallery  $userGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserGallery $userGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserGallery  $userGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $UserGallery = UserGallery::find($request->id);
        $UserGallery->delete();
        return response(['message' => 'User Gallery delete successfully']);
    }
}
