<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Order;
use App\SurveyAnswer;
use App\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all()->load(['user','payment','service','product']);

        return view('admin.orders.index', [
            'data' => $orders
        ]);
    }

    public function show(Order $order)
    {
        $payment = $order->load('payment')->payment;
        $user = $order->load('user')->user;
        $service = $order->load('service')->service;
        $product = $order->load('product')->product;
        $extraServices = $order->load('extra_services')->extra_services()->get();
        $survey = $order->load('surveys')->surveys->first();
        $files = Storage::disk('personalFiles')->listContents($user->id . '/' . $order->payment_id . '/');
        $order_type = $order->type_id === 1 ? 'student' : 'professional';
        $questions = SurveyQuestion::where('level', $order_type)->get();
        $surveyAnswers = SurveyAnswer::where('user_id', $user->id)->
                                       where('order_id', $order->id)->
                                       where('survey_id', $survey->id)->get();
        return view('admin.orders.show', [
            'order' => $order,
            'payment' => $payment,
            'service' => $service,
            'product' => $product,
            'user' => $user,
            'extraServices' => $extraServices,
            'survey' => $survey,
            'answers' => $surveyAnswers,
            'questions' => $questions,
            'files' => $files
        ]);
    }

    public function export(Request $request)
    {
        return (new OrdersExport($request))->download('orders.xlsx');
    }

}
