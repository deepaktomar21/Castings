<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;
use App\Models\User;

class RecruiterController extends Controller
{
    public function index()
{
    // Check if user is not logged in, then redirect to login page
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please login to access the dashboard.');
    }

    // Get logged-in user ID
    $userId = Auth::id(); 

    // Fetch job posts of the logged-in user
    $jobPosts = JobPost::where('user_id', $userId)->get();

    // Pass data to the view
    return view('website.recruiterDashboard', compact('jobPosts'));
}

    public function create()
    {
        return view('user.recruiter.create');
    }

    public function store(Request $request)
    {
        // Handle the form submission and save the data
        // Redirect or return a response
    }

    public function edit($id)
    {
        return view('user.recruiter.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Handle the form submission and update the data
        // Redirect or return a response
    }

    public function destroy($id)
    {
        // Handle the deletion of the recruiter
        // Redirect or return a response
    }
}
