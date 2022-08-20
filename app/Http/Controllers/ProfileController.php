<?php

namespace App\Http\Controllers;

use App\District;
use App\Tehsil;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $district = District::orderBy('name','asc')->get();
        $tehsil = Tehsil::orderBy('name','asc')->get();
        return view('profile.index', compact('user','district','tehsil'));
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
    public function getTehsil(Request $request){
        $data['tehsil'] = Tehsil::where("district_id",$request->district_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }

    public function view_note()
    {
        $user = auth()->user();
        $district = District::orderBy('name','asc')->get();
        $tehsil = Tehsil::orderBy('name','asc')->get();
        return view('profile.arti_note', compact('user'));
    }
    public function arti_note(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->update($request->all());
        $user->note = $request->note;
        $user->update();

        return back()->with('success','Your Note Published');
    }
}
