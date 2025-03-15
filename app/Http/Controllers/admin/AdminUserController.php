<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        $logs = json_decode($user->activity_log, true) ?? [];
        $logs[] = $logEntry;

        // Store updated logs back in the database
        $user->activity_log = json_encode($logs);
        $user->save();

        return redirect()->back()->with('success', 'User approval status updated!');
    }


    // 3️⃣ Show User Activity Log
    public function showActivityLog($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.activity', compact('user'));
    }
}
