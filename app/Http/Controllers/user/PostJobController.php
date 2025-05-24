<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;

class PostJobController extends Controller
{

public function postjobForm()
{
    // Retrieve user ID and role from session
    $userId = session('user_id');
    $userRole = session('user_role');

    // Redirect to login if user is not authenticated or not a recruiter
    if (!$userId || $userRole !== 'recruiter') {
        return redirect()->route('login')->with('error', 'Please login as a recruiter to access the dashboard.');
    }

    // If all good, show the post job form
    return view('website.postJobForm');
}


    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'company_name' => 'required|string',
            'company_website' => 'nullable|string',
            'job_title' => 'required|string',
            'city' => 'required|string',
            'talent_types' => 'required', 
            'project_type' => 'required|string',
            'organization_type' => 'required|string',
        ]);
    
        // Debugging: Check validation output
        // dd($validated);
       $talenttype = json_encode($validated['talent_types']);
        $jobs = JobPost::create([
            'user_id' => auth()->id(),
            'company_name' => $validated['company_name'],
            'company_website' => $validated['company_website'] ?? null,
            'job_title' => $validated['job_title'],
            'city' => $validated['city'],
            'talent_types' => json_decode($talenttype, true),
            'project_type' => $validated['project_type'],
            'organization_type' => $validated['organization_type'],
        ]);
    
      
        return redirect()->route('postjobForm')->with([
            'success' => 'Talent selection saved successfully!',
            'job' => $jobs, // Passing the job data to the next request
        ]);
    }
    
     
}
