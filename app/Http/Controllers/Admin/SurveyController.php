<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

    public $levels = ["Professional", "Student"],
           $types  = ["File", "Text", "Multi"];

    public function index()
    {
        $questions = SurveyQuestion::all();

        return view('admin.survey.index', [
            'data' => $questions
        ]);
    }

    public function create()
    {
        $questions = SurveyQuestion::all();

        return view('admin.survey.create', [
            'data' => $questions,
            'levels' => $this->levels,
            'types' => $this->types,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'question_num' => 'required',
            'level' => 'required',
            'type' => 'required',
        ]);

        SurveyQuestion::create([
            'question' => $request->question,
            'description' => $request->description,
            'question_num' => $request->question_num,
            'level' => $request->level,
            'type' => $request->type,
        ]);

        session()->flash('success', 'Survey Created Successfully');
        return redirect('/admin/survey');
    }

    public function edit($surveyQuestion)
    {
        $surveyQuestion = SurveyQuestion::findOrFail($surveyQuestion);
        $questions = SurveyQuestion::all();

        return view('admin.survey.edit', [
            'data' => $surveyQuestion,
            'levels' => $this->levels,
            'types' => $this->types,
            'questions' => $questions
        ]);
    }

    public function update(Request $request, $surveyQuestion)
    {
        $surveyQuestion = SurveyQuestion::findOrFail($surveyQuestion);

        $request->validate([
            'question' => 'required',
            'question_num' => 'required',
            'level' => 'required',
            'type' => 'required',
        ]);

        $surveyQuestion->update([
            'question' => $request->question,
            'description' => $request->description,
            'question_num' => $request->question_num,
            'level' => $request->level,
            'type' => $request->type,
        ]);

        session()->flash('success', 'Survey Updated Successfully');
        return redirect('/admin/survey');
    }

    public function destroy($surveyQuestion)
    {
        $surveyQuestion = SurveyQuestion::findOrFail($surveyQuestion);
        $surveyQuestion->delete();

        session()->flash('success', 'Question Removed.');
        return redirect('/admin/survey');
    }
}
