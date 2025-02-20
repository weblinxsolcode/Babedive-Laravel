<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        if (session("admin_id")) {
            return redirect()->route("admin.dashboard")->with("success", "You're already logged in as an admin.");
        } else {

            $title = "Landing Page";

            $data = compact("title");

            return view("appru.index")->with($data);
        }
    }

    public function privacypolicy()
    {

        return view('appru.privacy');
    }

    public function term()
    {
        return view('appru.term');
    }

    public function contactus()
    {
        return view('appru.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $new = new ContactUs;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->subject = $request->subject;
        $new->message = $request->message;
        $new->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
