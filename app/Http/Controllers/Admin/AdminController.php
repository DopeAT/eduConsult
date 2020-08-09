<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Newsletter;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $counters = [
            'newsletter' => Newsletter::count(),
            'orders' => Order::count(),
            'products' => Product::count(),
            'inbox' => Message::count(),
        ];

        return view('admin.dashboard', [
            'counters' => $counters
        ]);
    }
}
