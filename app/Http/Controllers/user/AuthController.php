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
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);

    //     if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
    //         return redirect()->route('home')->with('success', 'Login successful!');
    //     }

    //     return back()->withErrors(['message' => 'Invalid email or password!'])->withInput();
    // }
    public function loginUser(Request $request)
    {
        // Validate login fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Attempt login
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            // Get logged-in user
            $user = Auth::user();
    
            // Redirect based on role
            if ($user->role === 'recruiter') {
                return redirect()->route('DashboardRecruiter')->with('success', 'Welcome to your dashboard!');
            } else if ($user->role === 'talent') {
                return redirect()->route('home')->with('success', 'Login successful!');
            }
    
            // Default fallback (optional)
            return redirect()->route('home')->with('success', 'Login successful!');
        }
    
        // If authentication fails
        return back()->withErrors(['message' => 'Invalid email or password!'])->withInput();
    }
    

    public function logoutUser()
    {
        Session::forget('user_id');
        Auth::logout();
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
