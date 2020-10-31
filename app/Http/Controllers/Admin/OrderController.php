<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all()->load(['user','payment','service','product']);

        return view('admin.orders.index', [
            'data' => $orders
        ]);
    }

    public function show(Order $order) {
        return $order->load('extra_services');
    }

    public function export(Request $request)
    {
        return (new OrdersExport($request))->download('orders.xlsx');
    }

}
