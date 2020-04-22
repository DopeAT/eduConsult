<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
//        return $this->middleware('admin.access');
    }

    public function index()
    {
        return view('admin.home');
    }


}
