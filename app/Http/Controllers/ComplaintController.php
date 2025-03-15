<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;

class ComplaintController extends Controller
{
    // List all complaints (Admin)
    public function index()
    {
        $complaints = Complaint::with(['user', 'reportedUser'])->latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    // Show complaint details
    public function show($id)
    {
        $complaint = Complaint::with(['user', 'reportedUser'])->findOrFail($id);
        return view('admin.complaints.view', compact('complaint'));
    }

    // Store new complaint (User)
    public function store(Request $request)
    {
        $request->validate([
            'reported_user_id' => 'required|exists:users,id',
            'description' => 'required|string|max:1000',
        ]);

        Complaint::create([
            'user_id' => auth()->id(),
            'reported_user_id' => $request->reported_user_id,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Complaint submitted successfully.');
    }

    // Update complaint status (Admin)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,resolved,rejected',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Complaint status updated successfully.');
    }
}

