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
use App\Models\JobPost;
use App\Models\Subscription;

class HomeController extends Controller
{


  public function dashboard()
  {

    $totalUsers = User::count();
    $totalTalents = User::where('role', 'talent')->count();
    $totalRecruiters = User::where('role', 'recruiter')->count();
    $totalJobs = JobPost::count();

    $totalRevenue = Subscription::sum('amount');

    $months = [];
    $now = now();
    for ($i = 11; $i >= 0; $i--) {
      $months[] = $now->copy()->subMonths($i)->format('M Y');
    }

    $talentCounts = [];
    $recruiterCounts = [];

    foreach ($months as $month) {
      $start = \Carbon\Carbon::createFromFormat('M Y', $month)->startOfMonth();
      $end = $start->copy()->endOfMonth();

      $talentCounts[] = User::where('role', 'talent')
        ->whereBetween('created_at', [$start, $end])
        ->count();

      $recruiterCounts[] = User::where('role', 'recruiter')
        ->whereBetween('created_at', [$start, $end])
        ->count();
    }
    dd($totalUsers, $totalTalents, $totalRecruiters, $totalJobs);

    return view('admin.login', [
      'totalUsers' => $totalUsers,
      'totalTalents' => $totalTalents,
      'totalRecruiters' => $totalRecruiters,
      'totalJobs' => $totalJobs,
      'totalRevenue' => $totalRevenue,
      'months' => $months,
      'talentCounts' => $talentCounts,
      'recruiterCounts' => $recruiterCounts,
    ]);
  }




  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
  }
}
