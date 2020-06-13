<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();

        return view('pages.services.index', [
            'services' => $services
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
