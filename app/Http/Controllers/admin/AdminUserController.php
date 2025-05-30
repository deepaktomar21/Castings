<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{


    public function RecuiterListindex()
    {
        // Get only users with the role 'recuiter'
        $users = User::where('role', 'recruiter')->get();

        return view('admin.users.recuiterindex', compact('users'));
    }

    public function index()
    {
        // Get only users with the role 'talent'
        $users = User::where('role', 'talent')->latest()->get();

        return view('admin.users.index', compact('users'));
    }




    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = !$user->is_approved;

        // Create log entry
        $logEntry = [
            'timestamp' => now()->toISOString(),
            'action' => $user->is_approved ? 'Approved by Admin' : 'Rejected by Admin'
        ];

        // Retrieve existing logs and append new entry
        $logs = is_array($user->activity_log)
            ? $user->activity_log
            : (json_decode($user->activity_log, true) ?? []);

        $logs[] = $logEntry;

        // Store updated logs back in the database
        $user->activity_log = json_encode($logs);
        // dd($user->activity_log);
        $user->save();

        return redirect()->back()->with('success', value: 'User  status updated!');
    }


    // 3️⃣ Show User Activity Log
    public function showActivityLog($id)
    {
        $user = User::findOrFail($id);

        // Decode activity_log (if it's stored as JSON string in DB)
        $activityLog = is_string($user->activity_log)
            ? json_decode($user->activity_log, true)
            : $user->activity_log;

        return view('admin.users.activity', compact('user', 'activityLog'));
    }




    ///Talent

    public function talentsData()
    {
        // Get users where role is 'talent'
        $users = User::where('role', 'talent')->latest()->get();

        return view('admin.talents.index', compact('users'));
    }

    public function talentsDataView($id)
    {
        // Find profile and load user relation
        $user = User::findOrFail($id);

        return view('admin.talents.view', compact('user'));
    }
    public function verify($id)
    {
        $talent = User::findOrFail($id);
        $talent->status = 'verified';
        $talent->save();
        return back()->with('success', 'Talent verified successfully!');
    }

    public function feature($id)
    {
        $talent = User::findOrFail($id);
        $talent->is_featured = !$talent->is_featured;
        $talent->save();
        return back()->with('success', 'Talent feature status updated!');
    }
}
