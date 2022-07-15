<?php

namespace App\Http\Controllers;

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
        $user_gallery = UserGallery::where('user_id', Auth()->user()->id)->get();
        return view('client/user_gallery.index', compact('user_gallery'));
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
                'image' => 'required|max:10248'
            ]
        );
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            foreach ($images as $item) {
                $user_gallery = new UserGallery;
                $upload = 'Images/';
                $filename = time() . $item->getClientOriginalName();
                $path    = move_uploaded_file($item->getPathName(), $upload . $filename);
                $user_gallery->image = $upload . $filename;
                $user_gallery->user_id = Auth()->user()->id;
                $user_gallery->save();
            }
        }
        return redirect('user-gallery')->with('success', 'Image has created!');
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
