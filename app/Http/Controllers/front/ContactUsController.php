<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\message;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function index()
    {
        return view('front.contactUs');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:3|max:25",
            "email" => "required|email|min:3|max:25",
            "subject" => "required|string|min:3|max:25",
            "message" => "required|string|min:10|max:255",
        ]);

        $message = new message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return back()->with("success", "added inserted");
    }
}
