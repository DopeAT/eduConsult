<?php

namespace App\Http\Controllers\Admin;

use App\Custom\Messages;
use App\Custom\Orders;
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
        $notificationMessages = new Messages;
        $notificationOrders   = new Orders;
        $notificationNewsletter = new \App\Custom\Newsletter;

        $counters = [
            'newsletter' => Newsletter::count(),
            'orders' => Order::count(),
            'products' => Product::count(),
            'inbox' => Message::count(),
        ];

        $notifications = [
            'orders' => $notificationOrders->send(),
            'messages' => $notificationMessages->send(),
            'newsletter' => $notificationNewsletter->send()
        ];

        return view('admin.dashboard', [
            'counters' => $counters,
            'notifications' => $notifications
        ]);
    }
}
