<?php

namespace App\Http\Controllers;

use App\Message;
use App\Meta;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $metas = Meta::where('url', 'contact')->first();

        return view('pages/contact', [
            'metas' => $metas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required'
        ]);

        Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
            'is_new'  => 1
        ]);

        session()->flash('success', 'Thank you. Your message sent successfully!');
        return redirect('/contact');
    }
}
