<?php

namespace App\Http\Controllers\user;

use App\Models\CIty;
use App\Models\Customer;
use App\Models\Post;
use App\Models\JobPost;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class HomeController extends user
{
    public function homepage()
    {
        $blogs = Post::where('status', 'published')->latest()->take(8)->get();

        // $blogs = Post::where('status', 'published')->latest()->get();
        return view('website.home', compact('blogs')); // Ensure this view exists
    }

    public function login()
    {
        return view('website.login'); // Ensure this view exists
    }

    public function register()
    {
        $cities = City::orderBy('name', 'asc')->get(); // Fetch cities in alphabetical order
        return view('website.register', compact('cities'));
    }
    public function profile()
    {
        if (auth()->user()->role !== 'talent') {
            abort(403, 'Unauthorized access'); // Return 403 Forbidden for non-talent users
        }

        $profile = Profile::where('user_id', auth()->id())->first();
        return view('website.profile', compact('profile'));
    }



    public function publicIndex(Request $request)
    {
        $query = Post::where('status', 'published');

        // If search query exists, filter results
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('content', 'LIKE', '%' . $request->search . '%');
            });
        }

        $blogs = $query->latest()->paginate(10);

        return view('website.blog', compact('blogs'));
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $recentPosts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('website.blogshow', compact('post', 'recentPosts'));
    }



    public function searchTalent(Request $request)
    {
        $query = Profile::query();

        // Apply filters
        $query->when($request->filled('location'), function ($q) use ($request) {
            $q->where('location', 'like', '%' . $request->location . '%');
        });

        $query->when($request->filled('gender'), function ($q) use ($request) {
            $q->where('gender', $request->gender);
        });

        $query->when($request->filled('age'), function ($q) use ($request) {
            $q->where('age', $request->age);
        });


        // Dynamic Pagination
        $perPage = $request->get('per_page', 18);
        $talents = $query->paginate($perPage);

        // Fetch cities in alphabetical order
        $cities = City::orderBy('name', 'asc')->get();

        // Check if AJAX request
        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.find_talent_partial', compact('talents'))->render()
            ]);
        }

        return view('website.find_talent', compact('talents', 'cities'));
    }



    public function findTalent(Request $request)
    {
        $gender = $request->input('gender');
        $ageMin = $request->input('age_min');
        $ageMax = $request->input('age_max');
        $location = $request->input('location');
        $profession = $request->input('profession');
        $skills = $request->input('skills');
        $heightMin = $request->input('height_min');
        $heightMax = $request->input('height_max');

        // Fetch cities in alphabetical order
        $cities = City::orderBy('name', 'asc')->get();

        // Query profiles based on search filters
        $query = Profile::query()
            ->when($gender, fn($q) => $q->where('gender', $gender))
            ->when($ageMin, fn($q) => $q->where('age', '>=', $ageMin))
            ->when($ageMax, fn($q) => $q->where('age', '<=', $ageMax))
            ->when($location, fn($q) => $q->where('location', 'LIKE', "%$location%"))
            ->when($profession, fn($q) => $q->where('profession', 'LIKE', "%$profession%"))
            ->when($skills, fn($q) => $q->where('skills', 'LIKE', "%$skills%"))
            ->when($heightMin, fn($q) => $q->where('height', '>=', $heightMin))
            ->when($heightMax, fn($q) => $q->where('height', '<=', $heightMax));

        // Dynamic Pagination
        $perPage = $request->get('per_page', 18);
        $talents = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.find_talent_partial', compact('talents'))->render()
            ]);
        }

        return view('website.find_talent', compact('talents', 'cities'));
    }
    public function findTalentfilter(Request $request)
    {
        $gender = $request->input('gender');
        $ageMin = $request->input('age_min');
        $ageMax = $request->input('age_max');
        $location = $request->input('location');
        $profession = $request->input('profession');
        $skills = $request->input('skills');
        $heightMin = $request->input('height_min');
        $heightMax = $request->input('height_max');

        // Fetch cities in alphabetical order
        $cities = City::orderBy('name', 'asc')->get();

        // Query profiles based on search filters
        $query = Profile::query()
            ->when($gender, fn($q) => $q->where('gender', $gender))
            ->when($ageMin, fn($q) => $q->where('age', '>=', $ageMin))
            ->when($ageMax, fn($q) => $q->where('age', '<=', $ageMax))
            ->when($location, fn($q) => $q->where('location', 'LIKE', "%$location%"))
            ->when($profession, fn($q) => $q->where('profession', 'LIKE', "%$profession%"))
            ->when($skills, fn($q) => $q->where('skills', 'LIKE', "%$skills%"))
            ->when($heightMin, fn($q) => $q->where('height', '>=', $heightMin))
            ->when($heightMax, fn($q) => $q->where('height', '<=', $heightMax));

        // Dynamic Pagination
        $perPage = $request->get('per_page', 18);
        $talents = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.find_talent_partial', compact('talents'))->render()
            ]);
        }

        return view('website.find_talent', compact('talents', 'cities'));
    }


    public function findJob(Request $request)
    {
        $cities = City::orderBy('name', 'asc')->get();
        $query = JobPost::query()
            ->when($request->input('talent_types'), fn($q, $talent) => $q->whereJsonContains('talent_types', $talent))
            ->when($request->input('city'), fn($q, $city) => $q->where('city', $city));

        $perPage = $request->get('per_page', 18);
        $jobs = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.find_job_partial', compact('jobs'))->render()
            ]);
        }

        return view('website.find_job', compact('jobs', 'cities'));
    }
    public function findJobfilter(Request $request)
    {
        $cities = City::orderBy('name', 'asc')->get();
        $query = JobPost::query();

        if ($request->has('location') && !empty($request->location)) {
            $query->where('city', 'LIKE', '%' . $request->location . '%');
        }

        if ($request->has('talent_types') && !empty($request->talent_types)) {
            if (is_array($request->talent_types)) {
                foreach ($request->talent_types as $type) {
                    $query->orWhereJsonContains('talent_types', $type);
                }
            } else {
                $query->whereJsonContains('talent_types', $request->talent_types);
            }
        }



        $perPage = $request->get('per_page', 18);
        $jobs = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('website.find_job_partial', compact('jobs'))->render()
            ]);
        }

        return view('website.find_job', compact('jobs', 'cities'));
    }


    public function jobshow($uuid)
    {
        $job = JobPost::where('uuid', $uuid)->firstOrFail();
        return view('website.job_show', compact('job'));
    }

    public function myjobshow($uuid)
    {
        $job = JobPost::where('uuid', $uuid)->firstOrFail();
        return view('website.my_job_show', compact('job'));
    }
}
