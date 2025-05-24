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
