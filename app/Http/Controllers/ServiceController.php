<?php

namespace App\Http\Controllers;

use App\Meta;
use App\Partner;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
        $partners = Partner::all();
        $metas = Meta::where('url', 'services')->first();

        return view('pages.services.index', [
            'services' => $services,
            'partners' => $partners,
            'metas' => $metas
        ]);
    }

    public function show($service)
    {
        $service = Service::where('slug', $service)->get()->first();
        $partners = Partner::all();
        $metas = Meta::where('url', $service)->first();

        return view('pages.services.show', [
            'service' => $service->load('products'),
            'partners' => $partners,
            'metas' => $metas
        ]);
    }

}
