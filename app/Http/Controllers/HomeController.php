<?php

namespace App\Http\Controllers;

use App\Service;
use App\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::select('id', 'name', 'intro')->get();
        $testimonials = Testimonial::all()->random(3);


        return view('home', [
            'testimonials' => $testimonials,
            'services' => $services
        ]);
    }
}
