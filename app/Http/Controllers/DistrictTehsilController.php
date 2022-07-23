<?php

namespace App\Http\Controllers;

use App\District;
use App\Tehsil;
use Illuminate\Http\Request;

class DistrictTehsilController extends Controller
{
    public function index()
    {
        $data['district'] = District::get(["name","id"]);
        return view('country-state-city',$data);
    }
    public function getTehsil(Request $request)
    {
        $data['tehsil'] = Tehsil::where("district_id",$request->district_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
}
