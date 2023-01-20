<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class NewsletterController extends Controller
{
    
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'email' => 'required|unique:newsletters,email'
            ]
        );

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();
        $details = [
            'body' => 'You are subscribe Sabzi Mandi, Thank You'
        ];

        \Mail::to($request->email)->send(new \App\Mail\SubscribeMail($details));
        return back()->with('success', 'You are Subscribe Successfully');
    }
}
