<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Page;
use App\SurveyQuestion;
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
