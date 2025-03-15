@extends('website.layouts.app')

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

{{-- <div class="custom-breadcrumns border-bottom py-2">
    <div class="container">
        @if(auth()->user())
        <a href="">Home</a>
        @else
        <a href="">Home</a>
        @endif
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Profile</span>
    </div>
</div> --}}

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
                    <div class="card-header text-black text-center py-3">
                        <h4 class="mb-0">Create Your Profile</h4>
                        <a href="{{ route('profile.edit', auth()->id()) }}" class="btn btn-warning">Edit Profile</a>

                    </div>
                
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf
                
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                
                            <div class="container">
                                <!-- Navigation for Sections -->
                                <ul class="nav nav-tabs" id="profileTabs">
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal Information</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#summary">Professional Summary</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#skills">Skills & Training</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#experience">Experience</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#portfolio">Portfolio & Attachments</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#visibility">Visibility & Submission</a></li>
                                </ul>
                
                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="personal">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                                <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $profile->full_name ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Stage Name</label>
                                                <input type="text" name="stage_name" class="form-control" value="{{ old('stage_name', $profile->stage_name ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contact</label>
                                                <input type="text" name="contact" class="form-control" value="{{ old('contact', $profile->contact ?? '') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" value="{{ old('location', $profile->location ?? '') }}">
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="summary">
                                        <div class="mb-3">
                                            <label>Bio / Personal Statement</label>
                                            <textarea name="bio" class="form-control" rows="4">{{ old('bio', $profile->bio ?? '') }}</textarea>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="skills">
                                        <div class="mb-3">
                                            <label>Acting Techniques</label>
                                            <input type="text" name="acting_techniques" class="form-control" value="{{ old('acting_techniques', $profile->acting_techniques ?? '') }}">
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="experience">
                                        <div class="mb-3">
                                            <label>Theater Productions</label>
                                            <textarea name="theater_experience" class="form-control" rows="2">{{ old('theater_experience', $profile->theater_experience ?? '') }}</textarea>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="portfolio">
                                        <div class="mb-3">
                                            <label>Showreel (MP4)</label>
                                            <input type="file" name="reel_video" class="form-control">
                                            @if (!empty($profile->reel_video))
                                                <video width="320" height="240" controls class="mt-2">
                                                    <source src="{{ asset($profile->reel_video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="visibility">
                                        <div class="mb-3">
                                            <label>Profile Visibility</label>
                                            <select name="visibility" class="form-control">
                                                <option value="public" {{ old('visibility', $profile->visibility ?? '') == 'public' ? 'selected' : '' }}>Public</option>
                                                <option value="private" {{ old('visibility', $profile->visibility ?? '') == 'private' ? 'selected' : '' }}>Private</option>
                                            </select>
                                        </div>
                
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Create Profile</button>
                                            {{-- <a href="{{ route('profile.edit', auth()->id()) }}" class="btn btn-warning">Edit Profile</a> --}}
                                        </div>
                                    </div>
                                </div>
                
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-secondary" id="prevBtn">Back</button>
                                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            let currentTab = 0;
                            const tabs = document.querySelectorAll(".tab-pane");
                            const navLinks = document.querySelectorAll(".nav-link");
                
                            function showTab(n) {
                                tabs.forEach((tab, index) => {
                                    tab.classList.remove("show", "active");
                                    navLinks[index].classList.remove("active");
                                });
                                tabs[n].classList.add("show", "active");
                                navLinks[n].classList.add("active");
                            }
                
                            document.getElementById("nextBtn").addEventListener("click", function () {
                                if (currentTab < tabs.length - 1) {
                                    currentTab++;
                                    showTab(currentTab);
                                }
                            });
                
                            document.getElementById("prevBtn").addEventListener("click", function () {
                                if (currentTab > 0) {
                                    currentTab--;
                                    showTab(currentTab);
                                }
                            });
                        });
                    </script>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
