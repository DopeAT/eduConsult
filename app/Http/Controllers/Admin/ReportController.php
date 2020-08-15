<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function earnings() {
        $earnings = Payment::selectRaw("MONTHNAME(created_at) as month, SUM(amount) as total")
                            ->whereRaw("created_at >= CURDATE() - INTERVAL 1 YEAR")
                            ->groupBy("month")
                            ->orderBy("month", "desc")
                            ->get();

        return response()->json($earnings);
    }

    public function popular() {
        $popular = Payment::selectRaw("MONTHNAME(created_at) as month, SUM(amount) as total")
            ->whereRaw("created_at >= CURDATE() - INTERVAL 1 YEAR")
            ->groupBy("month")
            ->orderBy("month", "desc")
            ->get();

        return response()->json($popular);
    }
}
