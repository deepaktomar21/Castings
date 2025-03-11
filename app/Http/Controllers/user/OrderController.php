<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'country' => 'required|string',
            'service' => 'required|string',
            'expressCategory' => 'nullable|string',

            'sender_name' => 'nullable|string',
            'sender_phone' => 'nullable|string',
            'sender_address' => 'nullable|string',
            'recipientName' => 'nullable|string',
            'recipientPhone' => 'nullable|string',
            'recipientAddress' => 'nullable|string',
            'productType' => 'nullable|string',
            'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'buyer_name' => 'nullable|string|max:255',
            'buyer_phone' => 'nullable|string|max:20',
            'buyer_email' => 'nullable|email|max:255',
            'house_address' => 'required|string',
            'apartment_suite' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:20',
            'item_category' => 'nullable|string',
            'product_name' => 'nullable|string',
            'product_url' => 'nullable',
            'admin_suggestion' => 'nullable|in:Yes,No',
            'preferred_brand' => 'nullable|string',
            'specific_details' => 'nullable|string',
            'price_range' => 'nullable|string',
            'size' => 'nullable|string',
            'weight' => 'nullable|string',
            'delivery_mode' => 'nullable|string',
        ]);

        // Determine user registration details
        $userName = null;
        $userPhone = null;
        $userEmail = null;

        if ($request->filled(['sender_name', 'sender_phone', 'sender_address'])) {
            $userName = $request->sender_name;
            $userPhone = $request->sender_phone;
            $userEmail = null; // Sender email is not provided
        } elseif ($request->filled(['buyer_name', 'buyer_phone', 'buyer_email'])) {
            $userName = $request->buyer_name;
            $userPhone = $request->buyer_phone;
            $userEmail = $request->buyer_email;
        }

        // Ensure user has either phone or email before proceeding
        if ($userPhone || $userEmail) {
            $user = User::where('phone', $userPhone)->orWhere('email', $userEmail)->first();

            if (!$user && $userName) {
                $user = new User();
                $user->name = $userName;
                $user->phone = $userPhone;
                $user->email = $userEmail;
                $user->password = bcrypt($userName); // Set default password
                $user->save();
            }
        } else {
            return back()->with('error', 'User details are required.');
        }

        // Create new order instance
        $order = new Order();
        do {
            $trackingId = 'CB' . Str::random(8);
        } while (Order::where('tracking_id', $trackingId)->exists());

        $order->tracking_id = $trackingId;
        $order->user_id = $user->id ?? null; // Associate order with user if found
        $order->country = $request->country;
        $order->service = $request->service;
        $order->express_category = $request->expressCategory;

        // Sender details
        $order->sender_name = $request->sender_name;
        $order->sender_phone = $request->sender_phone;
        $order->sender_address = $request->sender_address;

        // Recipient details
        $order->recipient_name = $request->recipientName;
        $order->recipient_phone = $request->recipientPhone;
        $order->recipient_address = $request->recipientAddress;

        // Product details
        $order->delivery_product_type = $request->productType;

        // Handle product image upload
        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('product_images', 'public');
            $order->delivery_product_image = $imagePath;
        }

        // Buyer details (if ordering goods)
        $order->buyer_name = $request->buyer_name;
        $order->buyer_phone = $request->buyer_phone;
        $order->buyer_email = $request->buyer_email;
        $order->house_address = $request->house_address;
        $order->apartment_suite = $request->apartment_suite;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->postcode = $request->postcode;
        $order->item_category = $request->item_category;
        $order->product_name = $request->product_name;
        $order->product_url = $request->product_url;
        $order->admin_suggestion = $request->admin_suggestion;
        $order->preferred_brand = $request->preferred_brand;
        $order->specific_details = $request->specific_details;
        $order->price_range = $request->price_range;
        $order->size = $request->size;
        $order->weight = $request->weight;
        $order->delivery_mode = $request->delivery_mode;
        // dd($order);
        // Save order
        $order->save();

        return back()->with('success', 'Order submitted successfully!');
    }

    // public function store(Request $request)
    // {
    //     // Validate incoming request
    //     $validatedData = $request->validate([
    //         'country' => 'required|string',
    //         'service' => 'required|string',
    //         'expressCategory' => 'nullable|string',

    //         'sender_name' => 'nullable|string',
    //         'sender_phone' => 'nullable|string',
    //         'sender_address' => 'nullable|string',
    //         'recipientName' => 'nullable|string',
    //         'recipientPhone' => 'nullable|string',
    //         'recipientAddress' => 'nullable|string',
    //         'productType' => 'nullable|string',
    //         'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //        'buyer_name' => 'nullable|string|max:255',
    //         'buyer_phone' => 'nullable|string|max:20',
    //         'buyer_email' => 'nullable|email|max:255',
    //         'house_address' => 'required|string',
    //         'apartment_suite' => 'nullable|string',
    //         'city' => 'nullable|string|max:255',
    //         'state' => 'nullable|string|max:255',
    //         'postcode' => 'nullable|string|max:20',
    //         'item_category' => 'nullable|string',
    //         'product_name' => 'nullable|string',
    //         'product_url' => 'nullable',
    //         'admin_suggestion' => 'nullable|in:Yes,No',
    //         'preferred_brand' => 'nullable|string',
    //         'specific_details' => 'nullable|string',
    //         'price_range' => 'nullable|string',
    //         'size' => 'nullable|string',
    //         'weight' => 'nullable|string',
    //         'delivery_mode' => 'nullable|string',
    //         'product_image' => 'nullable|image|mimes:jpeg,png,jpg'
    //     ]);
    //     // dd($request->all());
    //     // Determine user registration details
    //     $userName = null;
    //     $userPhone = null;
    //     $userEmail = null;

    //     if ($request->filled(['sender_name', 'sender_phone', 'sender_address'])) {
    //         // Register user using sender details
    //         $userName = $request->sender_name;
    //         $userPhone = $request->sender_phone;
    //         $userEmail = null; // Sender email is not provided
    //     } elseif ($request->filled(['name_order', 'phone_order', 'order_email'])) {
    //         // Register user using buyer details
    //         $userName = $request->name_order;
    //         $userPhone = $request->phone_order;
    //         $userEmail = $request->order_email;
    //     }

    //     // Check if user already exists
    //     $user = User::where('phone', $userPhone)->orWhere('email', $userEmail)->first();

    //     if (!$user && $userName && $userPhone) {
    //         $user = new User();
    //         $user->name = $userName;
    //         $user->phone = $userPhone;
    //         $user->email = $userEmail;
    //         $user->password = bcrypt($userName); // Set default password
    //         $user->save();
    //     }
    //     // dd($request->all());
    //     // Create new order instance
    //     $order = new Order();
    //     do {
    //         $trackingId = 'CB' . Str::random(8);
    //     } while (Order::where('tracking_id', $trackingId)->exists());

    //     $order->tracking_id = $trackingId;
    //     $order->user_id = $user->id; // Associate order with user if found
    //     $order->country = $request->country;
    //     $order->service = $request->service;
    //     $order->express_category = $request->expressCategory;

    //     // Sender details
    //     $order->sender_name = $request->sender_name;
    //     $order->sender_phone = $request->sender_phone;
    //     $order->sender_address = $request->sender_address;

    //     // Recipient details
    //     $order->recipient_name = $request->recipientName;
    //     $order->recipient_phone = $request->recipientPhone;
    //     $order->recipient_address = $request->recipientAddress;

    //     // Product details
    //     $order->delivery_product_type = $request->productType;
    //     $order->delivery_product_image = $request->productImage;



    //     // Buyer details (if ordering goods)
    //     $order->buyer_name = $request->buyer_name;
    //     $order->buyer_phone = $request->buyer_phone;
    //     $order->buyer_email = $request->buyer_email;
    //     $order->house_address = $request->house_address;
    //     $order->apartment_suite = $request->apartment_suite;
    //     $order->city = $request->city;
    //     $order->state = $request->state;
    //     $order->postcode = $request->postcode;
    //     $order->item_category = $request->item_category;
    //     $order->product_name = $request->product_name;
    //     $order->product_url = $request->product_url;
    //     $order->admin_suggestion = $request->admin_suggestion;
    //     $order->preferred_brand = $request->preferred_brand;
    //     $order->specific_details = $request->specific_details;
    //     $order->price_range = $request->price_range;

    //     $order->size = $request->size;
    //     $order->weight = $request->weight;
    //     $order->delivery_mode = $request->delivery_mode;
    //     // Handle product image upload
    //     if ($request->hasFile('productImage')) {
    //         $imagePath = $request->file('productImage')->store('product_images', 'public');
    //         $order->product_image = $imagePath;
    //     }
    //     dd($order);
    //     $order->save();

    //     return back()->with('success', 'Order submitted successfully!');
    // }

    public function submitOrder(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required|string',
            'service' => 'required|string',
            'buyer_name' => 'required|string|max:255',
            'buyer_phone' => 'required|string|max:20',
            'buyer_email' => 'nullable|email|max:255',
            'house_address' => 'required|string',
            'apartment_suite' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'item_category' => 'required|string',
            'product_name' => 'nullable|string',
            'product_url' => 'nullable',
            'admin_suggestion' => 'required|in:Yes,No',
            'preferred_brand' => 'nullable|string',
            'specific_details' => 'nullable|string',
            'price_range' => 'nullable|string',
            'size' => 'nullable|string',
            'weight' => 'nullable|string',
            'delivery_mode' => 'required|string',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        try {
            $user = User::where(function ($query) use ($request) {
                $query->where('phone', $request->buyer_phone)
                    ->orWhere('email', $request->buyer_email);
            })->first();

            if (!$user) {

                $user = new User();
                $user->name = $request->buyer_name;
                $user->phone = $request->buyer_phone;
                $user->email = $request->buyer_email;
                $user->password = bcrypt($request->buyer_name);
                $user->save();
            }

            $product_image = null;
            if ($request->hasFile('product_image')) {
                $product_image = $request->file('product_image')->store('uploads', 'public');
            }
            do {
                $trackingId = 'CB' . Str::random(8);
            } while (Order::where('tracking_id', $trackingId)->exists());
            // dd($request->all());
            $order = new Order();
            $order->tracking_id = $trackingId;

            $order->user_id = $user->id;
            $order->country = $request->country;
            $order->service = $request->service;
            $order->buyer_name = $request->buyer_name;
            $order->buyer_phone = $request->buyer_phone;
            $order->buyer_email = $request->buyer_email;
            $order->house_address = $request->house_address;
            $order->apartment_suite = $request->apartment_suite;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->postcode = $request->postcode;
            $order->item_category = $request->item_category;
            $order->product_name = $request->product_name;
            $order->product_url = $request->product_url;
            $order->admin_suggestion = $request->admin_suggestion;
            $order->preferred_brand = $request->preferred_brand;
            $order->specific_details = $request->specific_details;
            $order->price_range = $request->price_range;
            $order->product_image = $product_image;
            $order->size = $request->size;
            $order->weight = $request->weight;
            $order->delivery_mode = $request->delivery_mode;
            // dd($order);

            $order->save();

            return back()->with('success', 'Order submitted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function trackOrder(Request $request)
    {
        // Validate input
        $request->validate([
            'tracking_id' => 'required|string'
        ]);

        // Find the order
        $order = Order::where('tracking_id', $request->tracking_id)->first();

        if (!$order) {
            return redirect()->back()->withInput()->with('error', 'Order not found. Please check your Tracking ID.');
        }

        // Store order data in session
        return redirect()->back()->with([
            'order' => $order,
            'tracking_id' => $request->tracking_id
        ]);
    }
}
