<?php

namespace App\Http\Controllers;

use App\Meta;
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
        $testimonials = Testimonial::all();

        if(count($testimonials) > 3) {
            $testimonials = $testimonials->random(3);
        }

        $metas = Meta::where('url', 'home')->first();

        return view('home', [
            'metas' => $metas,
            'testimonials' => $testimonials,
            'services' => $services
        ]);
    }
}
