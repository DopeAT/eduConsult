<?php

namespace App\Http\Controllers;

use App\Meta;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function order()
    {
        $metas = Meta::where('url', 'order')->first();

        return view('order', [
            'metas' => $metas
        ]);

    }
}
