@extends('website.layouts.app')

@section('title', 'Log in')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-box shadow-lg p-4 rounded bg-white">
        <div class="form-tab">
            <!-- Navigation -->
            <ul class="nav nav-pills nav-fill mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab"
                        aria-controls="signin" aria-selected="true">Sign In</a>
                </li>
            </ul>

            <div class="tab-content" id="tab-content-5">
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="singin-email">Username or Email Address *</label>
                            <input type="text" class="form-control" id="singin-email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="singin-password">Password *</label>
                            <input type="password" class="form-control" id="singin-password" name="password" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                            </div>
                            <a href="" class="forgot-link text-primary">Forgot Your
                                Password?</a>
                        </div>

                        <div class="form-footer mt-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span>LOG IN</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-box {
        max-width: 400px;
        width: 100%;
    }
</style>
@endsection