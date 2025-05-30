<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;

use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = JobPost::with('recruiter')->get();
        return view('admin.jobs.index', compact('jobs'));
    }











    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive,archived',
        ]);

        $job = JobPost::findOrFail($id);
        $job->status = $request->status;
        $job->updated_at = now();
        $job->save();

        return redirect()->back()->with('success', 'Job status updated!');
    }
}
