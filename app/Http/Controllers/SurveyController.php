<?php

namespace App\Http\Controllers;

use App\Order;
use App\Survey;
use App\SurveyAnswer;
use App\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class SurveyController extends Controller
{

    public function survey($token)
    {
        $order = Order::where('payment_id', $token)->first();
        $user = Auth::user();
        $survey = Survey::where('order_id', $order->id)->first();
        $order_type = $order->type_id === 1 ? 'student' : 'professional';
        $questions = SurveyQuestion::where('level', $order_type)->get();
        $answers = SurveyAnswer::where('user_id', $user->id)->where('order_id', $order->id)->where('survey_id', $survey->id)->get();

//        $ids = $answers->where('question_id', 13);
//
//        dd($ids);

        if ($user->id === $survey->user_id && $order->id === $survey->order_id) {
            return view('survey', [
                'order' => $order,
                'survey' => $survey,
                'questions' => $questions,
                'answers' => $answers,
            ]);
        }

        return abort(403);
    }

    public function uploadFilesForUser(Request $request)
    {
        $user = Auth::user();

        if (!$user) abort(403);

        if ($request->hasFile('file')) {
            // Upload path
            $destinationPath = '../public/images/private/'. Auth::user()->id . '/' . $request->surveyId . '/';

            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            // Valid extensions
            $validextensions = array("jpeg","jpg","png","pdf","docx");

            // Check extension
            if(in_array(strtolower($extension), $validextensions)){

                // Rename file
                $fileName = $request->file('file')->getClientOriginalName();
                // Uploading file to given path
                $request->file('file')->move($destinationPath, $fileName);

            }
        }

    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('payment_id', $request->order)->first();
        $survey = $request->survey;

        if (!$user) abort(403);

        foreach($request->except('_token', 'survey', 'order') as $key => $value) {
            $qID = str_replace('survey_q_', '', $key);

            SurveyAnswer::where([
                'question_id' => $qID,
                'user_id' => $user->id,
                'order_id' => $order->id,
                'survey_id' => $survey
            ])->delete();

            if (is_array($value)) {
                $value = json_encode($value);
            }

            SurveyAnswer::create([
                'question_id' => $qID,
                'user_id' => $user->id,
                'order_id' => $order->id,
                'survey_id' => $survey,
                'body' => $value
            ]);

        }

        session()->flash('success', 'Survey Saved Successfully');
        return redirect('/profile');
    }
}
