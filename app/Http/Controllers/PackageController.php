<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::orderBy('no','ASC')->get();
        return view('package',compact('package'));
    }
}
