<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casting Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://db.onlinewebfonts.com/c/34bf77357fafcf04d4061d4e19a32c85?family=Reckless+Bold" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Reckless Bold';
            src: url('/fonts/Recklessbold.woff2') format('woff2'),
                url('/fonts/Recklessbold.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        h1 {
            font-family: 'Reckless Bold';
        }

        /* General Styling */
        body {
            font-family: 'Reckless Bold';
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Left Section */
        .left-section {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
            overflow: hidden;
        }

        .full-image {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        /* Login Box */
        .login-box {
            max-width: 380px;
            width: 100%;
            padding: 2rem;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Links */
        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row vh-100">


            <!-- Left Side Image Section -->
            <div class="col-md-3 d-none d-md-block left-section">
                <img class="img-fluid full-image" style="border-radius: 55px;"
                    src="{{ asset('website/img/65f581d078258943a69b.png') }}" alt="Casting">

            </div>

            <!-- Right Side Login Form -->
            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <div class="login-box text-center">
                    <h1 class="mb-3" style="font-family: 'Reckless Bold';">CASTING</h1>
                    <h2 class="mb-4">Let's get started</h2>
                    <h3 class="mb-4">Login to Your Account</h3>
                    @if ($errors->has('message'))
                        <div class="alert alert-danger">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif


                    <form id="loginForm" action="{{ route('loginUser') }}" method="POST">
                        @csrf

                        <!-- Email Field -->
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Email">
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label fw-bold">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            <span class="text-danger error-text password_error"></span>
                        </div>
                        <div class="col-12">
                            <input type="hidden" id="device_token" name="device_token"
                                class="form-control py-3 border-primary" placeholder="Device Token">
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <a href="{{ route('showForgotPasswordForm') }}"
                                class="text-decoration-none text-primary">Forgot Password?</a>
                        </div>

                        <!-- Submit Button & Sign Up Link -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary w-50" id="loginButton">Sign In</button>
                            <a href="{{ route('register') }}" class="text-decoration-none text-primary">Create an
                                account</a>
                        </div>

                        <!-- Success/Error Messages -->
                        <div id="responseMessage" class="mt-3"></div>
                    </form>
                    <script>
                        document.getElementById("togglePassword").addEventListener("click", function() {
                            const passwordField = document.getElementById("password");
                            const icon = this.querySelector("i");

                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                                icon.classList.remove("fa-eye");
                                icon.classList.add("fa-eye-slash");
                            } else {
                                passwordField.type = "password";
                                icon.classList.remove("fa-eye-slash");
                                icon.classList.add("fa-eye");
                            }
                        });
                    </script>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

                </div>
            </div>

        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyD52-3NhfFdSXBij1h4UvQdGe78s-HJJD4",
            authDomain: "casting-a3efc.firebaseapp.com",
            projectId: "casting-a3efc",
            storageBucket: "casting-a3efc.firebasestorage.app",
            messagingSenderId: "1061448001736",
            appId: "1:1061448001736:web:5ebb3d88d31c3ab85b1dfd",
            measurementId: "G-Z623DPXXZE"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register('/public/firebase-messaging-sw.js')

                .then((registration) => {
                    console.log("✅ Service Worker Registered:", registration);
                    messaging.useServiceWorker(registration);
                })
                .catch((error) => {
                    console.error("❌ Service Worker Registration Failed:", error);
                });
        } else {
            console.warn("⚠️ Service workers are not supported in this browser.");
        }

        function getTokenAndSetField() {
            messaging
                .requestPermission()
                .then(() => messaging.getToken())
                .then((token) => {
                    console.log("📱 Device Token:", token);
                    document.getElementById("device_token").value = token;
                })
                .catch((error) => {
                    console.error("❌ Error Getting Token:", error);
                });
        }

        // Call function automatically on page load
        window.onload = getTokenAndSetField;

        messaging.onMessage((payload) => {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });
    </script>

</body>

</html>
