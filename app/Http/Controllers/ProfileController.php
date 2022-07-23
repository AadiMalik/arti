<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        auth()->user()->update($request->all());
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'Images/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $user = User::find(auth()->user()->id);
            $user->image = $upload . $filename;
            $user->update();
        }
        
        return back()->with('success','Your Profile Updated!');
    }
}
