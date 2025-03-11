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


class HomeController extends Controller
{
    

// public function index()
// {
   
//     $activeCondition = ['status' => 'active'];  
    
//     $buyerCount = DB::table('users')->where('user_type', 'Buyer')->where($activeCondition)->count();
//     $ownerCount = DB::table('users')->where('user_type', 'Owner')->where($activeCondition)->count();
//     $sellerCount = DB::table('users')->where('user_type', 'Seller')->where($activeCondition)->count();
//     $builderCount = DB::table('users')->where('user_type', 'Builder')->where($activeCondition)->count();
//     $agentCount = DB::table('users')->where('user_type', 'Agent/C.P Channel Partner')->where($activeCondition)->count();

//    $totalRequirementCount = Requirement::where('want_to_list', 'Requirement') 
//     ->whereHas('user', function($query) {
//         $query->where('status', 'active'); 
//     })
//     ->count();
    
//      $totalSellCount = Requirement::where('service_type', 'Sell')
//     ->whereHas('user', function($query) {
//         $query->where('status', 'active'); 
//     })
//     ->count();

//    $totalBuyCount = Requirement::where('service_type', 'Buy')
//     ->whereHas('user', function($query) {
//         $query->where('status', 'active'); 
//     })
//     ->count();
    
//      $totalRentCount = Requirement::where('service_type', 'Rent')
//     ->whereHas('user', function($query) {
//         $query->where('status', 'active'); 
//     })
//     ->count();
//      $totalInventoryCount = Requirement::where('want_to_list', 'Inventory') 
//     ->whereHas('user', function($query) {
//         $query->where('status', 'active'); 
//     })
//     ->count();
// $requirementCount = DB::table('requirements')
//         ->join('users', 'requirements.user_id', '=', 'users.id') // Join users table
//         ->where('requirements.want_to_list', 'Requirement')
//         ->where('users.status', 'active') // Filter only active users
//         ->count();
//     $inventoryCount = DB::table('requirements')
//      ->join('users', 'requirements.user_id', '=', 'users.id')
//         ->where('want_to_list', 'Inventory')
//         ->where('users.status', 'active')
//         ->count();
//     $totalCounts = DB::table('offers')->count();
//     $totalBusinessCounts = DB::table('businesses')->count();

//     return view('admin.dashboard', compact('inventoryCount','requirementCount','totalRentCount','totalBuyCount','totalSellCount','totalCounts','buyerCount', 'ownerCount', 'sellerCount', 'builderCount', 'agentCount', 'totalRequirementCount','totalInventoryCount','totalBusinessCounts'));
// }


     public function policy()
    {
        return view('policy');
    }



    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
      }
      public function index(){
        return view('admin.dashboard');
    }

    
                  }