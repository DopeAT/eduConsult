<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Page;
use App\Team;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function show($page)
    {
        $page = Page::where('slug', $page)->get()->first();

        return view('pages.page.show', [
            'data' => $page
        ]);
    }

    public function about()
    {
        $teamMembers = Team::all();

        return view('pages.about', [
            'teamMembers' => $teamMembers
        ]);
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('pages.faqs')->withFaqs($faqs);
    }
}
