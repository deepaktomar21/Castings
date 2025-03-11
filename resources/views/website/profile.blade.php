@extends('Frotent.layout')

@section('title', 'Profile')

@section('content')

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-0">My Profile</h2>
                <p>Manage your personal information and settings here.</p>
            </div>
        </div>
    </div>
</div> 

<div class="custom-breadcrumns border-bottom py-2">
    <div class="container">
        @if(auth()->user())
        <a href="{{route('user.dashboard')}}">Home</a>
        @else
        <a href="{{route('index')}}">Home</a>
        @endif
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Profile</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header a text-white text-center py-3">
                        <h4 class="mb-0">Update Your Profile</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Username -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" id="name" name="name" value="{{ auth()->user()->name ?: '' }}" class="form-control" placeholder="Enter your name">
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" id="phone" name="phone" value="{{ auth()->user()->phone ?: '' }}" class="form-control" placeholder="Enter your phone number">
                                </div>

                                <!-- Skills -->
                                <div class="col-md-6">
                                    <label for="skills" class="form-label">Skills</label>
                                    <input type="text" id="skills" name="skills" value="{{ auth()->user()->skills ?: '' }}" class="form-control" placeholder="Enter your skills">
                                </div>

                                <!-- Designation -->
                                <div class="col-md-6">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" id="designation" name="designation" value="{{ auth()->user()->designation ?: '' }}" class="form-control" placeholder="Your designation">
                                </div>

                                <!-- LinkedIn -->
                                <div class="col-md-6">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" id="linkedin" name="LinkedIn" value="{{ auth()->user()->LinkedIn_link ?: '' }}" class="form-control" placeholder="LinkedIn Profile Link">
                                </div>

                                <!-- Portfolio -->
                                <div class="col-md-6">
                                    <label for="portfolio" class="form-label">Portfolio</label>
                                    <input type="text" id="portfolio" name="portfolio" value="{{ auth()->user()->portfolio_link ?: '' }}" class="form-control" placeholder="Portfolio Link">
                                </div>

                                <!-- Resume -->
                                <div class="col-md-6">
                                    <label for="resume" class="form-label">Resume</label>
                                    <input type="file" id="resume" name="resume" class="form-control">
                                    @if(auth()->user()->resume)
                                    <a href="{{ asset(auth()->user()->resume) }}" class="btn btn-info btn-sm" download>
                                    <img src="{{ asset(auth()->user()->resume) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                                </a>
                                    @else
                                    <p>No Resume Image Uploaded</p>
                                @endif
                                </div>

                                <!-- Profile Image -->
                                <div class="col-md-6">
                                    <label for="img" class="form-label">Profile Image</label>
                                    <input type="file" id="img" name="img" class="form-control">
                                    @if(auth()->user()->img)
                                        <img src="{{ asset(auth()->user()->img) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                                    @else
                                        <p>No Profile Image Uploaded</p>
                                    @endif
                                </div>

                                <!-- Message -->
                                <div class="col-md-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea id="message" name="message" class="form-control" rows="3" placeholder="Write a short bio">{{ auth()->user()->message ?: '' }}</textarea>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn a px-4 py-2">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
