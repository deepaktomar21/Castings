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

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('home')->with('success', 'Login successful!');
        }

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


    public function forgotpasswordsendOtp(Request $request)
    {
        if ($request->isMethod('post') && !$request->has('otp')) {
            // Step 1: Validate input (Email or Phone required)
            $request->validate([
                'email_or_phone' => 'required'
            ]);

            // Check if input is email or phone
            $fieldType = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            // Find user by email or phone
            $user = User::where($fieldType, $request->email_or_phone)->first();

            if (!$user) {
                return back()->withErrors([$fieldType => ucfirst($fieldType) . ' is not registered'])->withInput();
            }

            // Generate OTP
            $otp = rand(100000, 999999);

            // Save OTP to user model
            $user->otp = $otp;
            $user->save();

            // Send OTP via Email/SMS (Uncomment when email/SMS sending is set up)
            if ($fieldType == 'email') {
                // Mail::to($user->email)->send(new ForgotPassword($otp));
            } else {
                // Send SMS via Twilio, Nexmo, etc.
            }

            return redirect()->back()->with([
                'email_or_phone' => $user->$fieldType,
                'otp_sent' => true,
                'otp' => $otp // Remove in production
            ]);
        }

        // Step 2: Validate OTP & update password
        if ($request->isMethod('post') && $request->has('otp')) {
            $request->validate([
                'email_or_phone' => 'required',
                'otp' => 'required|numeric',
                'password' => 'required|confirmed|min:6'
            ]);

            // Identify field type
            $fieldType = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            // Find user
            $user = User::where($fieldType, $request->email_or_phone)->first();

            if (!$user || $user->otp != $request->otp) {
                return back()->withErrors(['otp' => 'Invalid OTP. Please try again.'])->withInput();
            }

            // Update password & clear OTP
            $user->password = Hash::make($request->password);
            $user->otp = null;
            $user->save();

            return redirect()->route('login')->with('success', 'Password updated successfully');
        }

        return view('website.forgot_password');
    }
}
