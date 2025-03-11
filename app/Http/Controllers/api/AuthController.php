<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class AuthController extends Controller
{
   

public function loginUser(Request $request)
{
    $validator = Validator::make($request->all(), [
        'login'    => ['required', 'string'],
        'password' => ['required', 'min:6'],
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 'error', 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }

    $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    
    $credentials = [$loginField => $request->login, 'password' => $request->password];

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
       

        return response()->json(['status' => 'success', 'message' => 'Login successful!', 'user' => $user], 200);
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid email/phone or password.'], 401);
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
        return response()->json(['status' => 'error', 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

  
    return response()->json(['status' => 'success', 'message' => 'Registration successful!'], 201);
}

public function forgotpasswordsendOtp(Request $request)
{
    $request->validate(['email_or_phone' => 'required']);
    $fieldType = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    $user = User::where($fieldType, $request->email_or_phone)->first();

    if (!$user) {
        return response()->json(['status' => 'error', 'message' => ucfirst($fieldType) . ' is not registered'], 404);
    }

    $otp = rand(100000, 999999);
    $user->otp = $otp;
    $user->save();

    return response()->json(['status' => 'success', 'message' => 'OTP sent successfully!', 'otp' => $otp], 200);
}

public function updatePassword(Request $request, $otp)
{
    // Find the user by the provided OTP
    $user = User::where('otp', $otp)->first();

    // Check if the user exists
    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'User not found with the provided OTP',
        ], 404);
    }

    // Validate request data
    $request->validate([
        'otp' => 'required',
        'password' => 'required|confirmed', // Ensure the 'password' field matches the 'password_confirmation' field
    ]);

    // Update the user's password
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Password updated successfully',
        'data' => $user
    ]);
}


}
