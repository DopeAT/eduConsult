<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function about()
    {
        return view('pages.about');
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('pages.faqs')->withFaqs($faqs);
    }
}
