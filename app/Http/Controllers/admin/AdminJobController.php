<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('category', 'tags')->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.jobs.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);

        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $job->tags()->attach($request->tags);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('jobs.edit', compact('job', 'categories', 'tags'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        $job->tags()->sync($request->tags);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    public function approve(Job $job)
    {
        $job->update(['status' => 'approved']);
        return redirect()->route('jobs.index')->with('success', 'Job approved.');
    }

    public function reject(Job $job)
    {
        $job->update(['status' => 'rejected']);
        return redirect()->route('jobs.index')->with('success', 'Job rejected.');
    }

    public function togglePremium(Job $job)
    {
        $job->update(['is_premium' => !$job->is_premium]);
        return redirect()->route('jobs.index')->with('success', 'Job premium status updated.');
    }
}