<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobPost;
use App\Models\Subscription;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;



class AdminLoginController extends Controller
{

    public function index(){
        return view('admin.login'); // Create this view file
    }

    public function checkEmail(Request $request)
{
    $exists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $exists]);
}
 public function updatePassword(Request $request)
    {
        // Step 1: Send OTP
        if ($request->isMethod('post') && !$request->has('otp')) {
            $request->validate([
                'email' => 'required|email'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'Email is not registered'])->withInput();
            }

            // Generate OTP
            $otp = rand(100000, 999999);
            $user->otp = $otp;
            $user->save();

            // Send OTP to user's email (enable this in production)
            // Mail::to($user->email)->send(new ForgotPassword($otp));

            return redirect()->back()->with([
                'email' => $user->email,
                'otp_sent' => true,
                'otp' => $otp // Remove this in production
            ]);
        }

        // Step 2: Verify OTP and update password
        if ($request->isMethod('post') && $request->has('otp')) {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|numeric',
                'password' => 'required|confirmed|min:8'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || $user->otp != $request->otp) {
                return back()->withErrors(['otp' => 'Invalid OTP. Please try again.'])->withInput();
            }

            // Update password and clear OTP
            $user->password = Hash::make($request->password);
            $user->otp = null;
            $user->save();

            return redirect()->route('admin.login')->with('message', 'Password updated successfully');
        }

        return view('admin.forgot_password');
    }
    public function dashboard()
    {

        $totalUsers = User::count();
        $totalTalents = User::where('role', 'talent')->count();
        $totalRecruiters = User::where('role', 'recruiter')->count();
        $totalJobs = JobPost::count();

        $totalRevenue = Subscription::sum('price');

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
        // dd($totalUsers, $totalTalents, $totalRecruiters, $totalJobs);

        return view('admin.dashboard', [
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
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }




    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            $admin = Auth::guard('admin')->user();

            // Check if the role is 'admin'
            if ($admin->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful! Welcome to the admin panel.');
            } else {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'You are not authorized to access this panel.');
            }
        }

        return redirect()->route('admin.login')->with('error', 'Either Email/Password is incorrect.');
    }




    public function showUpdateForm()
    {
        return view('admin.forgot_password');
    }

    // public function updatePassword(Request $request)
    // {
    //     // Validate the input
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|exists:users,email',
    //         'password' => 'required|string|confirmed|min:4',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Find the user by email
    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Invalid email')->withInput();
    //     }

    //     // Update the user's password
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return redirect()->route('admin.login')->with('success', 'Password updated successfully');
    // }




    public function profile()
    {
        $data =  Auth::user();
        return view('admin.profile', compact('data')); // Create this view file
    }

    public function adminupdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('user_image')) {
            $img = $request->file('user_image');
            $imgName = time() . '_profile.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/profile_images'), $imgName);
            $user->img = 'uploads/profile_images/' . $imgName; // Store image path
        }

        $user->name = $request->first_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
