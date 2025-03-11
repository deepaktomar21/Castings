<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;





class AuthController extends user
{
    public function login()
    {
        return view('website.login'); // Ensure this view exists
    }



    public function loginUser(Request $request)
    {
        // Validation Rules
        $validator = Validator::make($request->all(), [
            'login'    => ['required', 'string'],
            'password' => ['required', 'min:6'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Determine if input is an email or phone number
        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $loginField = 'email';
        } elseif (preg_match('/^[0-9]{10}$/', $request->login)) {
            $loginField = 'phone';
        } else {
            return back()->withErrors(['login' => 'Invalid email or phone number format.'])->withInput();
        }

        // Attempt login
        $credentials = [
            $loginField => $request->login,
            'password'  => $request->password,
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Store user_id in session
            Session::put('user_id', Auth::user()->id);

            return redirect()->route('index')->with('success', 'Login successful!');
        }

        return back()->withErrors(['login' => 'Invalid email/phone or password.'])->withInput();
    }

    public function logoutUser()
    {
        Session::forget('user_id');
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }



    public function register()
    {
        return view('website.register'); // Ensure this view exists
    }
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone|max:20',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::login($user);

            return redirect()->route('login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
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
