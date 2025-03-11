<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminReportController extends Controller
{
  
    // Display Reports Dashboard
    public function index()
    {
        return view('admin.reports.index');
    }

    // Orders Report (Ghana & UK)
    public function ordersReport()
    {
        $ghanaOrders = Order::where('country', 'Ghana')->count();
        $ukOrders = Order::where('country', 'UK')->count();

        return view('admin.reports.orders', compact('ghanaOrders', 'ukOrders'));
    }

    // Frequently Shipped Items Report
    public function shipmentsReport()
    {
        $topItems = Order::select('product_name')
            ->groupBy('product_name')
            ->orderByRaw('COUNT(*) DESC')
          
            ->get();

        return view('admin.reports.shipments', compact('topItems'));
    }
}


