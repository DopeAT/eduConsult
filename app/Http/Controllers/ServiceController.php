<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
        $partners = Partner::all();

        return view('pages.services.index', [
            'services' => $services,
            'partners' => $partners
        ]);
    }

    public function show($service)
    {
        $service = Service::where('slug', $service)->get()->first();

        return view('pages.services.show', [
            'service' => $service->load('products')
        ]);
    }

}
