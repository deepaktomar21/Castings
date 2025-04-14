@extends('website.layouts.app')

@section('title', 'Job Details')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <br>
    <h1 class="text-center">Find Perfect Job & Get Hired</h1>


    <section id="list" class="p_3 bg-light">
        <div class="container-fluid">
            <div class="row list_1">
                @include('website.layouts.filter')
                <div class="col-md-8">
                    <div class="list_1dt bg-white p-4">
                        <div class="list_1dt1">
                            <h5 class="mb-3">Job Overview :</h5>

                            <!-- Display Job Details (Read-Only) -->
                            <h6 class="fw-bold px-3 mb-3">
                                Date Posted: <span
                                    class="float-end">{{ $job->created_at->diffForHumans() ?? __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Location: <span class="float-end">{{ $job->city ?? __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold px-3 mt-3 mb-3">
                                Company: <span class="float-end">{{ $job->company_name ?? 'Adwords' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Jobs Type: <span class="float-end">{{ $job->job_title ?? __('NA') }}</span>
                            </h6>

                            @php
                                $talentTypes = is_array($job->talent_types)
                                    ? $job->talent_types
                                    : json_decode($job->talent_types, true);
                            @endphp
                            <h6 class="fw-bold bg-light p-2 px-3">
                                Talent Types: <span
                                    class="float-end">{{ !empty($talentTypes) ? implode(', ', $talentTypes) : __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Project Type: <span class="float-end">{{ $job->project_type ?? __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Organization Type: <span class="float-end">{{ $job->organization_type ?? __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Profession: <span class="float-end">{{ $job->profession ?? __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Company: <span class="float-end">{{ $job->company_name ?? __('NA') }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">
                                Website:
                                <span class="float-end">
                                    @if (!empty($job->company_website))
                                        <a href="{{ $job->company_website }}"
                                            target="_blank">{{ $job->company_website }}</a>
                                    @else
                                        {{ __('NA') }}
                                    @endif
                                </span>
                            </h6>
                        </div>

                        <div class="list_1dt2 mt-4">
                            <h5 class="mb-3">Full Description</h5>
                            <p>{{ $job->description_1 ?? 'Description not available.' }}</p>
                            <p>{{ $job->description_2 ?? 'More info coming soon.' }}</p>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Job Application Form -->
                        <div class="mt-5">
                            <h5 class="mb-3">Apply for this Job</h5>
                            <form action="{{ route('apply.job') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="job_post_id" value="{{ $job->id }}">
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                @endauth
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number:</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="resume" class="form-label">Upload Resume:</label>
                                    <input type="file" name="resume" class="form-control">
                                </div>



                                <button type="submit" class="btn btn-primary">Submit Application</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- @if (!empty($application->resume))
    <a href="{{ asset($application->resume) }}" target="_blank">Download Resume</a>
@else
    <span>No resume uploaded</span>
@endif --}}



@endsection
