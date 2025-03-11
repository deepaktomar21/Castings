<?php

namespace App\Http\Controllers\user;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
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

  
    public function quickView()
    {
        return view('website.quickView'); // Ensure this view exists
    }
    public function trackOrder()
    {
        return view('website.trackOrder'); // Ensure this view exists
    }

    public function OrderForm()
    {
        return view('website.order'); // Ensure this view exists
    }
}
