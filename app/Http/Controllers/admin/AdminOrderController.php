<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function BuyIndexOrder()
    {
        $orders = Order::where('service', 'LIKE', '%Want to buy goods%')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id',
            'order_status' => 'nullable|in:Pending,Accepted,Rejected',
            'delivery_status' => 'nullable|in:Processed,In Transit,Delivered'
        ]);

        $order = Order::find($request->id);

        if ($order) {
            if ($request->has('order_status') && $request->order_status != '') {
                $order->order_status = $request->order_status;
            }
            if ($request->has('delivery_status') && $request->delivery_status != '') {
                $order->delivery_status = $request->delivery_status;
            }
            $order->save();

            return redirect()->back()->with('success', 'Order status updated successfully!');
        }

        return redirect()->back()->with('error', 'Order not found!');
    }


    public function deleteOrder(Request $request)
    {
        $order = Order::find($request->id);

        if ($order) {
            $order->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Order deleted successfully!'
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Order not found!'
        ], 404);
    }
    public function BuyShowOrder($id)
    {
        // Fetch the order details based on ID
        $order = Order::find($id);

        // Check if order exists
        if (!$order) {
            return redirect()->route('admin.buyorders.index')->with('error', 'Order not found.');
        }

        // Return the view with order details
        return view('admin.orders.show', compact('order'));
    }


    //express
    public function ExpressIndexOrder()
    {
        $orders = Order::where('service', 'LIKE', '%Express Delivery%')
            ->latest()
            ->get();

        return view('admin.orders.Expressorders', compact('orders'));
    }

    public function ExpressShowOrder($id)
    {
        // Fetch the order details based on ID
        $order = Order::find($id);

        // Check if order exists
        if (!$order) {
            return redirect()->route('admin.expressorders.index')->with('error', 'Order not found.');
        }

        // Return the view with order details
        return view('admin.orders.ExpressShow', compact('order'));
    }





}
