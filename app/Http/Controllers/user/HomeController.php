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
        return view('website.home'); // Ensure this view exists
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



    public function publicIndex()
    {
        $posts = Post::where('status', 'approved')->latest()->paginate(10);
        return view('blogs.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'approved')->firstOrFail();
        return view('blogs.show', compact('post'));
    }
}
