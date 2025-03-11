<?php

namespace App\Http\Controllers\user;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\CIty;
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
    
}
