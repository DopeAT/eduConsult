<?php

namespace App\Http\Controllers;

use App\Meta;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $service
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($service, $product)
    {
        $product = Product::where('slug', $product)->first()->load('service')->load('rates');
        $metas = Meta::where('url', $product)->first();

        return view('pages.product', [
            'product' => $product,
            'metas' => $metas
        ]);
    }
}
