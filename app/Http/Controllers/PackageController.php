<?php

namespace App\Http\Controllers;

use App\Package;
use App\PackageHistory;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Stripe;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::orderBy('no', 'ASC')->get();
        return view('package', compact('package'));
    }
    public function create($id)
    {
        $package = Package::find($id);
        return view('package_buy', compact('package'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $package = Package::find($request->package_id);
            Stripe\Stripe::setApiKey(config('app.stripe_secret'));
            Stripe\Charge::create([
                "amount" => $package->price * 100,
                "currency" => "pkr",
                "source" => $request->stripeToken,
                "description" => "This is package payment"
            ]);

            $packagehistory = new PackageHistory;
            $packagehistory->package_id = $package->id;
            $packagehistory->user_id = Auth()->user()->id;
            $packagehistory->package_name = $package->name;
            $packagehistory->package_price = $package->price;
            $packagehistory->package_days = $package->days;
            $packagehistory->package_add = $package->add;
            $packagehistory->save();
            $user = User::find(Auth()->user()->id);
            if($user->expiry==null){
                $date = Carbon::now()->format('Y.m.d');
                $user->expiry = Carbon::now()->addDays($package->days);
            }else{
                $date = Carbon::createFromFormat('Y.m.d', $user->expiry);
                $user->expiry = $date->addDays($package->days);
            }
            $user->package_id = $package->id;
            $user->days = $user->days+$package->days;
            $user->adds = $package->add;
            $user->update();
            return redirect('thanks-you');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
