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


    // public function store(Request $request)
    // {

    //     $validated = $request->validate([
    //         'company_name' => 'required|string',
    //         'company_website' => 'nullable|string',
    //         'job_title' => 'required|string',
    //         'city' => 'required|string',
    //         'talent_types' => 'required', 
    //         'project_type' => 'required|string',
    //         'organization_type' => 'required|string',
    //     ]);

    //     // Debugging: Check validation output
    //     // dd($validated);
    //    $talenttype = json_encode($validated['talent_types']);
    //     $jobs = JobPost::create([
    //         'user_id' => auth()->id(),
    //         'company_name' => $validated['company_name'],
    //         'company_website' => $validated['company_website'] ?? null,
    //         'job_title' => $validated['job_title'],
    //         'city' => $validated['city'],
    //         'talent_types' => json_decode($talenttype, true),
    //         'project_type' => $validated['project_type'],
    //         'organization_type' => $validated['organization_type'],
    //     ]);


    //     return redirect()->route('postjobForm')->with([
    //         'success' => 'Talent selection saved successfully!',
    //         'job' => $jobs, // Passing the job data to the next request
    //     ]);
    // }





    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string',
            'company_website' => 'nullable|string',
            'job_title' => 'required|string',
            'city' => 'required|string',
            'talent_types' => 'required',
            'project_type' => 'required|string',
            'organization_type' => 'required|string',

            'project_name' => 'nullable|string',
            'project_description' => 'nullable|string',
            'union_status' => 'nullable|string',

            'talent_compensation' => 'nullable|string',
            'expected_duration' => 'nullable|string',
            'pay_rate_frequency' => 'nullable|string',
            'pay_rate_currency' => 'nullable|string',
            'pay_rate_amount' => 'nullable|numeric',
            'contract_details' => 'nullable|string',

            'expire_date_listing' => 'nullable|date',
            'expire_time_listing' => 'nullable|string',

            'production_info' => 'nullable|string',
            'location_type' => 'nullable|string',
            'audition_country' => 'nullable|string',
            'audition_special_instructions' => 'nullable|string',
            'script_title' => 'nullable|string',
            'script_description' => 'nullable|string',

            'role_name' => 'nullable|string',
            'role_type' => 'nullable|string',
            'remote_opportunity' => 'nullable',
            'role_gender' => 'nullable|string',
            'role_min_age' => 'nullable|integer',
            'role_max_age' => 'nullable|integer',
            'role_ethnicity' => 'nullable|string',
            'role_skills' => 'nullable|string',
            'role_description' => 'nullable|string',
            'media_required' => 'nullable',
            'role_require_nudity' => 'nullable',
        ]);
        // dd($validated);

        $jobs = JobPost::create([
            'user_id' => $validated['user_id'],
            'company_name' => $validated['company_name'],
            'company_website' => $validated['company_website'] ?? null,
            'job_title' => $validated['job_title'],
            'city' => $validated['city'],
            'talent_types' => is_array($validated['talent_types'])
                ? json_encode($validated['talent_types'])
                : $validated['talent_types'],

            'project_type' => $validated['project_type'],
            'organization_type' => $validated['organization_type'],

            'project_name' => $validated['project_name'] ?? null,
            'project_description' => $validated['project_description'] ?? null,
            'union_status' => $validated['union_status'] ?? null,

            'talent_compensation' => $validated['talent_compensation'] ?? null,
            'expected_duration' => $validated['expected_duration'] ?? null,
            'pay_rate_frequency' => $validated['pay_rate_frequency'] ?? null,
            'pay_rate_currency' => $validated['pay_rate_currency'] ?? null,
            'pay_rate_amount' => $validated['pay_rate_amount'] ?? null,
            'contract_details' => $validated['contract_details'] ?? null,

            'expire_date_listing' => $validated['expire_date_listing'] ?? null,
            'expire_time_listing' => $validated['expire_time_listing'] ?? null,

            'production_info' => $validated['production_info'] ?? null,
            'location_type' => $validated['location_type'] ?? null,
            'audition_country' => $validated['audition_country'] ?? null,
            'audition_special_instructions' => $validated['audition_special_instructions'] ?? null,
            'script_title' => $validated['script_title'] ?? null,
            'script_description' => $validated['script_description'] ?? null,

            'role_name' => $validated['role_name'] ?? null,
            'role_type' => $validated['role_type'] ?? null,
            'remote_opportunity' => $validated['remote_opportunity'] ?? null,
            'role_gender' => $validated['role_gender'] ?? null,
            'role_min_age' => $validated['role_min_age'] ?? null,
            'role_max_age' => $validated['role_max_age'] ?? null,
            'role_ethnicity' => $validated['role_ethnicity'] ?? null,
            'role_skills' => $validated['role_skills'] ?? null,
            'role_description' => $validated['role_description'] ?? null,
            // 'media_required' => $validated['media_required'] ?? null,
             'media_required' => is_array($validated['media_required'])
                ? json_encode($validated['media_required'])
                : $validated['media_required'] ?? null,
            'role_require_nudity' => $validated['role_require_nudity'] ?? null,
        ]);
        // dd($jobs);

        return redirect()->route('postjobForm')->with([
            'success' => 'Talent selection saved successfully!',
            'job' => $jobs,
        ]);
    }
}
