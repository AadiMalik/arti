<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin/users.profile');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required|max:255'
            ]
        );
        $user = User::find($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'Images';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $user->image =  $upload . $filename;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->update();
        return back()->with('success', 'Profile has updated!');
    }
}
