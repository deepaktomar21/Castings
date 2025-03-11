<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function UserList() {
        $users = User::where('role', '!=', 'admin')->get();
        
        return view('admin.users.index', compact('users'));
    }
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('admin.users.index', compact('users'));
    }
    
    
        
        public function approve($id)
        {
            $user = User::findOrFail($id);
            $user->is_approved = !$user->is_approved;
            // $user->logActivity($user->is_approved ? 'Approved by Admin' : 'Rejected by Admin');
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
