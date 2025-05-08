<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;
use App\Models\User;
use App\Models\Application;


class RecruiterController extends Controller
{
    public function index()
    {
        // Check session for user ID and role
        $userId = session('user_id');
        $userRole = session('user_role');

        // Redirect to login if user is not authenticated or not a recruiter
        if (!$userId || $userRole !== 'recruiter') {
            return redirect()->route('login')->with('error', 'Please login as a recruiter to access the dashboard.');
        }

        // Get all jobs posted by the recruiter
        $allJobs = JobPost::with('applications')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        // Collect job post IDs
        $jobPostIds = $allJobs->pluck('id')->toArray();

        // Get all applications for these job posts
        $applications = Application::with('jobPost')
            ->whereIn('job_post_id', $jobPostIds)
            ->latest()
            ->get();

        // Get accepted (approved) applications
        $acceptedapplications = Application::with('jobPost')
            ->whereIn('job_post_id', $jobPostIds)
            ->where('status', 'approved')
            ->latest()
            ->get();

        // Filter job posts by status
        $activeJobs = $allJobs->where('status', 'active');
        $draftJobs = $allJobs->where('status', 'draft');
        $expiredJobs = $allJobs->where('status', 'expired'); // Optional

        // Return the recruiter dashboard view with data
        return view('website.recruiterDashboard', [
            'allJobs'              => $allJobs,
            'activeJobs'           => $activeJobs,
            'draftJobs'            => $draftJobs,
            'expiredJobs'          => $expiredJobs,
            'applications'         => $applications,
            'acceptedapplications' => $acceptedapplications,
        ]);
    }



    //     public function index()
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login')->with('error', 'Please login to access the dashboard.');
    //     }

    //     $userId = Auth::id();

    //     // Get all jobs of the user with their applications
    //     $allJobs = JobPost::with('applications')
    //         ->where('user_id', $userId)
    //         ->latest()
    //         ->get();

    //     // Get all job_post_ids related to this user
    //     $jobPostIds = $allJobs->pluck('id')->toArray();

    //     // Get applications related to those job_post_ids
    //     $applications = Application::with('jobPost')
    //         ->whereIn('job_post_id', $jobPostIds)
    //         ->latest()
    //         ->get();

    //         $acceptedapplications = Application::with('jobPost')
    //         ->whereIn('job_post_id', $jobPostIds)
    //         ->where('status', 'approved')
    //         ->latest()
    //         ->get();    

    //     // Filter by status
    //     $activeJobs = $allJobs->where('status', 'active');
    //     $draftJobs = $allJobs->where('status', 'draft');
    //     $expiredJobs = $allJobs->where('status', 'expired'); // Optional

    //     return view('website.recruiterDashboard', [
    //         'allJobs'      => $allJobs,
    //         'activeJobs'   => $activeJobs,
    //         'draftJobs'    => $draftJobs,
    //         'expiredJobs'  => $expiredJobs,
    //         'applications' => $applications,
    //         'acceptedapplications' => $acceptedapplications,
    //     ]);
    // }


    public function editJob($id)
    {
        $job = JobPost::findOrFail($id);
        return view('website.editJobPost', compact('job'));
    }
    public function updateJob(Request $request, $id)
    {
        $job = JobPost::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('DashboardRecruiter')->with('success', 'Job updated successfully.');
    }
    public function deleteJob($id)
    {
        $job = JobPost::findOrFail($id);
        $job->delete();
        return redirect()->route('DashboardRecruiter')->with('success', 'Job deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $application = Application::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return back()->with('success', 'Application status updated successfully.');
    }
}
