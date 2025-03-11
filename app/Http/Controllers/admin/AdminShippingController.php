<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class AdminShippingController extends Controller
{
    public function BuyIndexOrder()
    {
        $orders = Order::where('service', 'LIKE', '%Want to buy goods%')
            ->latest()
            ->get();

        return view('admin.shippingcost.index', compact('orders'));
    }
    public function BuyupdateOrder(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'order_price' => 'required|string|min:0',
            'shipping_charge' => 'required|string|min:0',
           
        ]);

        // Find order by ID
        $order = Order::findOrFail($id);

        // Update order fields
        $order->order_price = $request->order_price;
        $order->shipping_charge = $request->shipping_charge;
        // Save changes
        $order->save();

        return redirect()->back()->with('success', 'Order updated successfully!');
    }





    public function BuyEditOrder($id)
    {
        $order = Order::find($id);


        if (!$order) {
            return redirect()->route('admin.buyorders.shippingindex')->with('error', 'Order not found.');
        }

        return view('admin.shippingcost.edit', compact('order'));
    }


    //express
    public function ExpressIndexOrder()
    {
        $orders = Order::where('service', 'LIKE', '%Express Delivery%')
            ->latest()
            ->get();

        return view('admin.shippingcost.Expressorders', compact('orders'));
    }

    public function ExpressEditOrder($id)
    {
        // Fetch the order details based on ID
        $order = Order::find($id);

        // Check if order exists
        if (!$order) {
            return redirect()->route('admin.expressorders.shippingindex')->with('error', 'Order not found.');
        }

        // Return the view with order details
        return view('admin.shippingcost.ExpressEdit', compact('order'));
    }

    public function updateExpressOrder(Request $request, $id)
    {
        $validatedData = $request->validate([

            'shipping_charge' => 'required|string',

        ]);

        try {
            $order = Order::findOrFail($id);

            $order->shipping_charge = $request->shipping_charge;

            $order->save();

            return back()->with('success', 'Order updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }
}
