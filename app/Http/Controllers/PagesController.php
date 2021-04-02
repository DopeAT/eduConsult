<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Meta;
use App\Page;
use App\SurveyQuestion;
use App\Team;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function show($page)
    {
        $page = Page::where('slug', $page)->get()->first();
        $metas = Meta::where('url', $page)->first();

        return view('pages.page.show', [
            'data' => $page,
            'metas' => $metas
        ]);
    }

    public function about()
    {
        $teamMembers = Team::all();
        $metas = Meta::where('url', 'about')->first();

        return view('pages.about', [
            'teamMembers' => $teamMembers,
            'metas' => $metas
        ]);
    }

    public function faqs()
    {
        $faqs = Faq::all();
        $metas = Meta::where('url', 'faqs')->first();

        return view('pages.faqs')->withFaqs($faqs)->withMetas($metas);
    }

    public function surveyExample()
    {
        $survey = SurveyQuestion::all();

        $professionals = $survey->filter(function ($value, $key) {
            return $value['level'] === 'professional';
        });

        $students = $survey->filter(function ($value, $key) {
            return $value['level'] === 'student';
        });

        return view('pages.survey.example', [
            'pros' => $professionals,
            'students' => $students
        ]);
    }
}
