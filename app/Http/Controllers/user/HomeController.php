<?php

namespace App\Http\Controllers\user;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\CIty;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
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
}
