<?php

namespace App\Http\Controllers\admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
}
