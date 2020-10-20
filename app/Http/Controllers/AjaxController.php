<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\Product;
use App\Rate;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{

    public function me()
    {
        return Auth::user();
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

}
