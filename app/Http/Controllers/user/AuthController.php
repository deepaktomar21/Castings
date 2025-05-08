<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;




class AuthController extends user
{


    // public function loginUser(Request $request)
    // {
    //     // Validate login fields
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //         'device_token' => 'nullable|string',
    //     ]);


    //     // Attempt login
    //     if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
    //         // Get logged-in user
    //         $user = Auth::user();
    //         $user->fcm_token = $request->device_token;
    //         $user->save();
    //         // Store user ID in session
    //         Session::put('user_id', $user->id);




    //         // Redirect based on role
    //         if ($user->role === 'recruiter') {
    //             session([
    //                 'LoggedAdminInfo' => $adminInfo->id,
    //                 'LoggedAdminName' => $adminInfo->name,
    //             ]);
    //             return redirect()->route('DashboardRecruiter')->with('success', 'Welcome to your dashboard!');
    //         } else if ($user->role === 'talent') {
    //             session([
    //                 'LoggedUserInfo' => $userInfo->id,
    //                 'LoggedUserName' => $userInfo->name,
    //             ]);
    //             return redirect()->route('home')->with('success', 'Login successful!');
    //         }




    //         // Default fallback (optional)
    //         return redirect()->route('home')->with('success', 'Login successful!');
    //     }

    //     // If authentication fails
    //     return back()->withErrors(['message' => 'Invalid email or password!'])->withInput();
    // }


    public function loginUser(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'device_token' => 'nullable|string',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['message' => 'Invalid email or password!'])->withInput();
        }

        // Update device token if provided
        if ($request->device_token) {
            $user->fcm_token = $request->device_token;
            $user->save();
        }

        // Store common session data
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role,
        ]);
       

        // Role-based session and redirect
        if ($user->role === 'recruiter') {
            session([
                'LoggedAdminInfo' => $user->id,
                'LoggedAdminName' => $user->name,
            ]);
            // dd($user);
            return redirect()->route('DashboardRecruiter')->with('success', 'Welcome to your Recruiter dashboard!');
        } elseif ($user->role === 'talent') {
            session([
                'LoggedUserInfo' => $user->id,
                'LoggedUserName' => $user->name,
            ]);
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // Fallback
        return redirect()->route('home')->with('success', 'Login successful!');
    }



    public function switchProfile($profile)
    {
        $allowedProfiles = ['recruiter', 'talent'];

        // Check if the provided profile is valid
        if (!in_array($profile, $allowedProfiles)) {
            return back()->withErrors(['message' => 'Invalid profile selected.']);
        }

        // Retrieve user ID and name from the session
        $userId = session('LoggedUserInfo');
        $userName = session('LoggedUserName');

        if (!$userId || !$userName) {
            return back()->withErrors(['message' => 'User not logged in.']);
        }

        // Find the current user by ID
        $currentUser = User::find($userId);

        // Check if the user exists
        if (!$currentUser) {
            return back()->withErrors(['message' => 'User not found.']);
        }

        // Check if another user with the same email and target role exists
        $switchUser = User::where('email', $currentUser->email)
            ->where('role', $profile)
            ->first();

        if (!$switchUser) {
            // Clone and create new profile if it doesn't exist
            $switchUser = $currentUser->replicate();
            $switchUser->role = $profile;
            $switchUser->save();
        }

        // Store the new user information in the session
        session([
            'LoggedUserInfo' => $switchUser->id,
            'LoggedUserName' => $switchUser->name,
            'user_role' => $switchUser->role
        ]);

        // Check the role and redirect accordingly
        if ($switchUser->role === 'recruiter') {
            session([  // Store recruiter-specific session data
                'LoggedAdminInfo' => $switchUser->id,
                'LoggedAdminName' => $switchUser->name,
            ]);
            return redirect()->route('DashboardRecruiter')->with('success', 'Switched to Recruiter profile!');
        } elseif ($switchUser->role === 'talent') {
            session([  // Store talent-specific session data
                'LoggedUserInfo' => $switchUser->id,
                'LoggedUserName' => $switchUser->name,
            ]);
            return redirect()->route('home')->with('success', 'Switched to Talent profile!');
        }

        // Default fallback (optional)
        return redirect()->route('home')->with('success', 'Profile switched successfully!');
    }



    public function logoutUser()
    {
        // Remove all session data related to both recruiter and talent
        // Session::forget('user_id');
        // Session::forget('LoggedUserInfo');
        // Session::forget('LoggedUserName');
        // Session::forget('LoggedAdminInfo');
        // Session::forget('LoggedAdminName');
        // Session::forget('user_role');

        // Optionally, flush the entire session
        Session::flush();

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }







    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'city_id' => 'required|exists:cities,id',
            'postal_code' => 'nullable|string|max:10',
            'role' => 'required|in:employer,talent',
        ]);

        // Create user
        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city_id' => $request->city_id,
            'postal_code' => $request->postal_code,
            'role' => $request->role,
        ]);

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }




    public function showForgotPasswordForm()
    {
        return view('website.forgot_password');
    }


    public function forgotPassword(Request $request)
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
                'password' => 'required|confirmed|min:6'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || $user->otp != $request->otp) {
                return back()->withErrors(['otp' => 'Invalid OTP. Please try again.'])->withInput();
            }

            // Update password and clear OTP
            $user->password = Hash::make($request->password);
            $user->otp = null;
            $user->save();

            return redirect()->route('login')->with('message', 'Password updated successfully');
        }

        return view('website.forgot_password');
    }
}
