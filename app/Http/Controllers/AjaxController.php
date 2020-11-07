<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Newsletter;
use App\Product;
use App\Rate;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class AjaxController extends Controller
{

    public function me()
    {
        if(Auth::user())
        return Auth::user()->only(['id', 'firstname', 'lastname', 'email', 'phone']);
    }

    public function checkUserEmail(Request $request)
    {
        return $emailsFound = User::select('email')->where('email', $request->email)->get();
    }

    public function orderLevels()
    {
        return Product::select('id', 'slug', 'name')->where('service_id', 1)->get();
    }

    public function additionalServices()
    {
        return Product::select('id', 'slug', 'name')->where('service_id', '<>', 1)->get()->load('rates');
    }

    public function orderTotal(Request $request)
    {
        return Rate::select('total')
                   ->where('type_id', $request->type_of_service)
                   ->where('product_id', $request->level)
                   ->where('service_id', 1)
                   ->where('level_id', $request->academic_level)
                   ->where('delivery_id', 2)
                   ->get()
                   ->first();
    }

    public function newsletter(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $newsletter = Newsletter::updateOrCreate([
            'email' => $request->email,
            'is_new' => 1
        ]);

        return 'Thank you for signing up to our newsletter.';
    }

    public function getDiscount(Request $request)
    {
        $request->validate(['code' => 'required']);
        $now = (new Carbon)->now()->toDateString();

        $discount = Discount::where('start', '<=', $now)
                            ->where('end', '>=', $now)
                            ->where('code', $request->code)
                            ->get()
                            ->first();

        return response()->json($discount);
    }

    public function createInvoicePDF(Request $request)
    {
        view()->share('order', $request);
        $pdf = PDF::loadView('pdf.order', $request);

        return $pdf->download('order_rops.pdf');
    }

}
