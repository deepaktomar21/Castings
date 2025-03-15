<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companyee;
use App\Models\Requirement;

use Illuminate\Support\Facades\Validator;
use response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Http;
use Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Job;
use App\Models\Subscription;

class HomeController extends Controller
{


  public function index()
  {
    $totalUsers = User::count();
    $totalTalents = User::where('role', 'talent')->count();
    $totalRecruiters = User::where('role', 'recruiter')->count();
    $totalJobs = Job::count();
    $totalRevenue = Subscription::sum('amount');

    return view('admin.dashboard', compact('totalUsers', 'totalTalents', 'totalRecruiters', 'totalJobs', 'totalRevenue'));
  }



  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
  }
}
