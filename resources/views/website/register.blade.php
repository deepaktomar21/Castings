<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casting Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Add this inside the <head> section -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Reckless Bold';
            src: url('/fonts/Recklessbold.woff2') format('woff2'),
                url('/fonts/Recklessbold.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Reckless Bold';
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

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

        .login-box {
            max-width: 420px;
            width: 100%;
            padding: 2rem;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .password-toggle {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-3 d-none d-md-block left-section">
                <img class="img-fluid full-image" style="border-radius: 55px;"
                    src="{{ asset('website/img/65f581d078258943a69b.png') }}" alt="Casting">

            </div>

            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <div class="login-box">
                    <h1 class="mb-3" style="font-family: 'Reckless Bold'; text-align: center;">CASTING</h1>
                    <h2 class="mb-4 text-center">Create an Account</h2>
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="inputFirstName">First Name</label>
                                <input id="inputFirstName" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="First Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="inputLastName">Last Name</label>
                                <input id="inputLastName" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    placeholder="Last Name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password">
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    data-target="password"><i class="fa fa-eye"></i></button>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <div class="input-group">
                                <input id="confirm_password" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Confirm Password">
                                <button class="btn btn-outline-secondary toggle-password" type="button"
                                    data-target="confirm_password"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>

                        {{-- Select2 CSS --}}
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                            rel="stylesheet" />

                        {{-- jQuery (required by Select2) --}}
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        {{-- Select2 JS --}}
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="inputCity">City</label>
                                <select id="inputCity" class="form-control select2" name="city_id">
                                    <option value="" selected>Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-city_id"></span>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#inputCity').select2({
                                        placeholder: "Select City",
                                        allowClear: true
                                    });
                                });
                            </script>


                            <div class="col-md-6 form-group">
                                <label for="inputPostalCode">Postal Code</label>
                                <input id="inputPostalCode" type="text"
                                    class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                    placeholder="Postal Code" value="{{ old('postal_code') }}">
                                @error('postal_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userType">User Type</label>
                            <select id="userType" class="form-control @error('role') is-invalid @enderror"
                                name="role">
                                <option value="" disabled selected>Select User Type</option>
                                <option value="talent" {{ old('role') == 'talent' ? 'selected' : '' }}>Talent</option>
                                <option value="recruiter" {{ old('role') == 'recruiter' ? 'selected' : '' }}>Recruiter
                                </option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Create Account</button>

                        <div class="mt-3 text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none">Back to Sign In Options</a>
                        </div>
                    </form>

                    {{-- JS for password visibility toggle --}}
                    <script>
                        document.querySelectorAll('.toggle-password').forEach(button => {
                            button.addEventListener('click', function() {
                                const targetId = this.getAttribute('data-target');
                                const input = document.getElementById(targetId);
                                const icon = this.querySelector('i');
                                if (input.type === 'password') {
                                    input.type = 'text';
                                    icon.classList.remove('fa-eye');
                                    icon.classList.add('fa-eye-slash');
                                } else {
                                    input.type = 'password';
                                    icon.classList.remove('fa-eye-slash');
                                    icon.classList.add('fa-eye');
                                }
                            });
                        });
                    </script>



                </div>
            </div>
        </div>
    </div>

</body>

</html>
