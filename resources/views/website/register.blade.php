@extends('website.layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-box shadow-lg p-4 rounded bg-white">
        <div class="form-tab">
            <!-- Navigation Tabs -->
            <ul class="nav nav-pills nav-fill mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab"
                        aria-controls="register" aria-selected="true">Register</a>
                </li>
            </ul>

            <div class="tab-content" id="tab-content-5">
                <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="register-email">Your Email Address *</label>
                            <input type="email" class="form-control" id="register-email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="register-password">Password *</label>
                            <input type="password" class="form-control" id="register-password" name="password" required>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                            <label class="custom-control-label" for="register-policy">
                                I agree to the <a href="#">privacy policy</a> *
                            </label>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span>SIGN UP</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .form-tab -->
    </div>
</div>

<style>
    .form-box {
        max-width: 400px;
        width: 100%;
    }
</style>
@endsection
