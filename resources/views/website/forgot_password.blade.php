<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casting Forget Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        h1 {
            font-family: 'Reckless Bold', sans-serif;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff;
        }

        .left-section {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
        }

        .full-image {
            width: 100%;
            height: 100vh;
            object-fit: cover;
            border-radius: 55px;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            text-decoration: underline;
        }

        .input-group .form-control {
            border-right: 0;
        }

        .input-group .btn {
            border-left: 0;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-3 d-none d-md-block left-section">
                <img class="img-fluid full-image" src="{{ asset('website/img/65f581d078258943a69b.png') }}"
                    alt="Casting">
            </div>

            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <div class="col-md-9 d-flex justify-content-center align-items-center">
                    <div class="login-box text-center">
                        <h1 class="mb-3">CASTING</h1>
                        <h2 class="mb-4">Let's get started</h2>
                        <h3 class="mb-4">Forgot Password</h3>
                        <p class="mb-4">Enter your email address and we will send you a link to reset your password.
                        </p>

                        {{-- Success Alert --}}
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- Error Alert --}}
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- OTP Sent Notification --}}
                        @if (session('otp_sent') && session('otp'))
                            <div class="alert alert-info">
                                <strong>OTP Sent!</strong> Your OTP is: <span
                                    class="text-primary">{{ session('otp') }}</span>
                            </div>
                        @endif

                        <div class="login_form">
                            @if (session('otp_sent'))
                                {{-- Step 2: Verify OTP & Reset Password --}}
                                <form action="{{ url('/forgotpasswordsendOtp') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ session('email') }}">

                                    <div class="mb-3 text-start">
                                        <label for="otp" class="form-label">Enter OTP</label>
                                        <input type="text" name="otp" id="otp" class="form-control"
                                            required>
                                    </div>

                                    <div class="mb-3 text-start">
                                        <label for="password" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password" class="form-control"
                                                required>
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePassword">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3 text-start">
                                        <label for="password_confirmation" class="form-label">Confirm New
                                            Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Update Password</button>
                                </form>

                                {{-- Resend OTP Button + Hidden Form --}}
                                <div class="mt-3">
                                    <button id="resendBtn" class="btn btn-link" disabled>Resend OTP in <span
                                            id="timer">30</span> sec</button>
                                </div>

                                <form id="resendOtpForm" action="{{ url('forgotpasswordsendOtp') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ session('email') }}">
                                </form>
                            @else
                                {{-- Step 1: Send OTP --}}
                                <form action="{{ url('forgotpasswordsendOtp') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 text-start">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            required value="{{ old('email') }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Send OTP</button>
                                </form>
                            @endif

                            <p class="mt-4">We will send you a link to reset your password.</p>

                            <p class="mb-2">Don't have an account? <a href="{{ url('register') }}">Sign Up</a></p>
                            <p class="mb-2">Already have an account? <a href="{{ url('login') }}">Login</a></p>
                            <p class="mb-2">By signing up, you agree to our <a href="#">Terms of Service</a> and
                                <a href="#">Privacy Policy</a>.</p>
                            <p class="mb-0">© 2025 Casting. All rights reserved.</p>
                        </div>
                    </div>
                </div>

                {{-- JS Script for Password Toggle and Resend Timer --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Show/Hide password
                        const toggleBtn = document.getElementById('togglePassword');
                        const passwordInput = document.getElementById('password');

                        toggleBtn?.addEventListener('click', function() {
                            const type = passwordInput.type === 'password' ? 'text' : 'password';
                            passwordInput.type = type;
                            this.querySelector('i').classList.toggle('fa-eye');
                            this.querySelector('i').classList.toggle('fa-eye-slash');
                        });

                        // Resend OTP timer
                        const resendBtn = document.getElementById('resendBtn');
                        const timerSpan = document.getElementById('timer');
                        const resendForm = document.getElementById('resendOtpForm');
                        let countdown = 30;

                        if (resendBtn && timerSpan) {
                            const interval = setInterval(() => {
                                countdown--;
                                timerSpan.textContent = countdown;

                                if (countdown <= 0) {
                                    clearInterval(interval);
                                    resendBtn.textContent = 'Resend OTP';
                                    resendBtn.disabled = false;
                                }
                            }, 1000);

                            resendBtn.addEventListener('click', function() {
                                resendForm.submit();
                            });
                        }
                    });
                </script>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    {{-- <script>
        document.getElementById("togglePassword")?.addEventListener("click", function() {
            const password = document.getElementById("password");
            const icon = this.querySelector("i");
            if (password.type === "password") {
                password.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    </script> --}}

</body>

</html>
