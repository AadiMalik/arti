<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|max:255',
                'subject' => 'required|max:255',
                'message' => 'required'
            ]
        );

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->seen = 0;
        $contact->save();
        return back()->with('success','Your Message sent to Admin!');
    }
}
