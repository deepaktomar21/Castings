<?php

namespace App\Http\Controllers\admin;

use App\Models\Subscription;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;


class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = Subscription::latest()->get();
        return view('admin.subscriptions.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.subscriptions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'job_post_limit' => 'required',
            'resume_view_limit' => 'required',
            'description' => 'required|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        // dd($validated);

        Subscription::create($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription plan created successfully.');
    }

    public function edit(Subscription $subscription)
    {
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'job_post_limit' => 'required',
            'resume_view_limit' => 'required',
            'description' => 'required',
        ]);

        $validated['is_active'] = $request->has('is_active');
        // dd($validated);
        $subscription->update($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated.');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->back()->with('success', 'Plan deleted.');
    }


    public function razorpayCheckout(Request $request)
    {
        $plan = Subscription::where('slug', $request->plan)->firstOrFail();
        $user = auth()->user();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $orderData = [
            'receipt' => uniqid(),
            'amount' => $plan->price * 100,
            'currency' => 'INR',
            'payment_capture' => 1
        ];

        $razorpayOrder = $api->order->create($orderData);

        $data = [
            "order_id" => $razorpayOrder['id'],
            "razorpay_key" => env('RAZORPAY_KEY'),
            "amount" => $plan->price * 100,
            "plan" => $plan,
            "user" => $user,
        ];

        return view('subscriptions.razorpay_checkout', $data);
    }
    public function razorpaySuccess(Request $request)
    {
        $plan = Subscription::findOrFail($request->plan_id);
        $user = auth()->user();

        // Store user subscription
        UserSubscription::create([
            'user_id' => $user->id,
            'subscription_plan_id' => $plan->id,
            'payment_gateway' => 'razorpay',
            'gateway_subscription_id' => null,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
            'is_active' => true,
        ]);

        $user->features = $plan->features;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Subscription successful via Razorpay!');
    }
}
