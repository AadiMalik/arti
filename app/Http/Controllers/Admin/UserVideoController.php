<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserVideo;
use Illuminate\Http\Request;

class UserVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_video = UserVideo::all();
        return view('admin/user_video.index', compact('user_video'));
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
     * @param  \App\UserVideo  $UserVideo
     * @return \Illuminate\Http\Response
     */
    public function show(UserVideo $UserVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserVideo  $UserVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVideo $UserVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserVideo  $UserVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVideo $UserVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserVideo  $UserVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $UserVideo = UserVideo::find($request->id);
        $UserVideo->delete();
        return response(['message' => 'Video delete successfully']);
    }
}
