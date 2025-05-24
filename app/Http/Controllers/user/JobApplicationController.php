<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobBookmark;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function apply(Request $request)
    {
        $user = session('LoggedUserInfo');
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to apply for a job.');
        }

        $request->validate([
            'job_post_id' => 'required|exists:job_posts,id',
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);
        // dd($request);


        $application = new Application();
        $application->job_post_id = $request->job_post_id;
        $application->user_id = $request->user_id;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->phone = $request->phone;

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $destinationPath = public_path('application/resume');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $application->resume = 'application/resume/' . $filename;
        }

        $application->save();

        return redirect()->route('findJob')->with('success', 'Your application has been submitted successfully!');
    }

    public function myjobs()
    {
        $user = session('LoggedUserInfo');
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $applications = Application::with('jobPost')
            ->where('user_id', $user)
            ->get();

        return view('website.myjobs', compact('applications'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'job_post_id' => 'required|exists:job_posts,id',
        ]);

        $user = session('LoggedUserInfo');
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $jobPostId = $request->job_post_id;

        $bookmark = JobBookmark::where('user_id', $user)
            ->where('job_post_id', $jobPostId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return back()->with('success', 'Bookmark removed.');
        } else {
            JobBookmark::create([
                'user_id' => $user,
                'job_post_id' => $jobPostId,
            ]);
            return back()->with('success', 'Job bookmarked successfully.');
        }
    }

    public function getJobBookmarks()
    {
        $user = session('LoggedUserInfo');
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $bookmarks = JobBookmark::with('jobPost')
            ->where('user_id', $user)
            ->get();

        return view('website.job_bookmarks', compact('bookmarks'));
    }
}
