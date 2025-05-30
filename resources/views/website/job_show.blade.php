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

                            <h6 class="fw-bold px-3 mb-3">Date Posted:
                                <span class="float-end">{{ $job->created_at->diffForHumans() ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">City:
                                <span class="float-end">{{ $job->city ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold px-3 mt-3 mb-3">Company:
                                <span class="float-end">{{ $job->company_name ?? 'NA' }}</span>
                            </h6>



                            <h6 class="fw-bold bg-light p-2 px-3">Talent Types:
                                <span class="float-end">
                                    @php
                                        $talentTypes = is_array($job->talent_types)
                                            ? $job->talent_types
                                            : json_decode($job->talent_types, true);
                                    @endphp
                                    {{ !empty($talentTypes) ? implode(', ', $talentTypes) : 'NA' }}
                                </span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Organization Type:
                                <span class="float-end">{{ $job->organization_type ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Website:
                                <span class="float-end">
                                    @if (!empty($job->company_website))
                                        <a href="{{ $job->company_website }}"
                                            target="_blank">{{ $job->company_website }}</a>
                                    @else
                                        NA
                                    @endif
                                </span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Project Details</h5>

                            <h6 class="fw-bold bg-light p-2 px-3">Project Name:
                                <span class="float-end">{{ $job->project_name ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Project Type:
                                <span class="float-end">{{ $job->project_type ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Union Status:
                                <span class="float-end">{{ $job->union_status ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Project Description:
                                <span class="float-end">{{ $job->project_description ?? 'NA' }}</span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Compensation & Contract</h5>

                            <h6 class="fw-bold bg-light p-2 px-3">Compensation:
                                <span class="float-end">{{ $job->talent_compensation ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Expected Duration:
                                <span class="float-end">{{ $job->expected_duration ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Pay Rate:
                                <span class="float-end">{{ $job->pay_rate_amount ?? 'NA' }}
                                    {{ $job->pay_rate_currency ?? '' }} / {{ $job->pay_rate_frequency ?? '' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Contract Details:
                                <span class="float-end">{{ $job->contract_details ?? 'NA' }}</span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Expiry Info</h5>

                            <h6 class="fw-bold bg-light p-2 px-3">Expires On:
                                <span class="float-end">{{ $job->expire_date_listing ?? 'NA' }}
                                    {{ $job->expire_time_listing ?? '' }}</span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Production & Audition</h5>

                            <h6 class="fw-bold bg-light p-2 px-3">Production Info:
                                <span class="float-end">{{ $job->production_info ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Location Type:
                                <span class="float-end">{{ $job->location_type ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Audition Country:
                                <span class="float-end">{{ $job->audition_country ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Audition Instructions:
                                <span class="float-end">{{ $job->audition_special_instructions ?? 'NA' }}</span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Script</h5>

                            <h6 class="fw-bold bg-light p-2 px-3">Title:
                                <span class="float-end">{{ $job->script_title ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Description:
                                <span class="float-end">{{ $job->script_description ?? 'NA' }}</span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Role Requirements</h5>

                            <h6 class="fw-bold bg-light p-2 px-3">Role Name:
                                <span class="float-end">{{ $job->role_name ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Type:
                                <span class="float-end">{{ $job->role_type ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Remote Opportunity:
                                <span class="float-end">{{ $job->remote_opportunity ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Gender:
                                <span class="float-end">{{ $job->role_gender ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Age Range:
                                <span class="float-end">{{ $job->role_min_age ?? 'NA' }} -
                                    {{ $job->role_max_age ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Ethnicity:
                                <span class="float-end">{{ $job->role_ethnicity ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Skills:
                                <span class="float-end">{{ $job->role_skills ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Role Description:
                                <span class="float-end">{{ $job->role_description ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Media Required:
                                <span class="float-end">{{ $job->media_required ?? 'NA' }}</span>
                            </h6>

                            <h6 class="fw-bold bg-light p-2 px-3">Nudity Required:
                                <span class="float-end">{{ $job->role_require_nudity ?? 'NA' }}</span>
                            </h6>
                        </div>

                        <div class="list_1dt1 mt-4">
                            <h5 class="mb-3">Other</h5>



                            <h6 class="fw-bold bg-light p-2 px-3">Status:
                                <span class="float-end">{{ $job->status ?? 'NA' }}</span>
                            </h6>
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
                                @if (session('LoggedUserInfo'))
                                    <input type="hidden" name="user_id" value="{{ session('LoggedUserInfo') }}">
                                @endif
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




@endsection
