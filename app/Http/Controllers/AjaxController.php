<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function newsletter(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $newsletter = Newsletter::updateOrCreate([
            'email' => $request->email,
            'is_new' => 1
        ]);

        return 'Thank you for signing up to our newsletter.';
    }

}
