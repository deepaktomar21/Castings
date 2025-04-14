@extends('website.layouts.app')

@section('title', 'Recruiter Dashboard')
@section('header', 'Recruiter Dashboard')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>

    <div class="container dashboard-container py-4">
        <h2 class="fw-bold">Recruiter Dashboard
            <button class="btn btn-dark text-white float-end">+ Create New Production</button>

        </h2>


        <div class="card mb-12">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Upcoming Applications ({{ $applications->count() }})</h5>
            </div>

            <div class="card-body" style="background-color: transparent;">
                @if ($applications->count())
                    @foreach ($applications as $app)
                        <div class="mb-3 p-3 border rounded bg-white">
                            <form action="{{ route('application.updateStatus', $app->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <strong>Job:</strong> {{ $app->jobpost->job_title ?? 'N/A' }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Name:</strong> {{ $app->name }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Email:</strong> {{ $app->email }}
                                    </div>
                                    <div class="col-md-2">
                                        <strong>Status:</strong>
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="pending" {{ $app->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="approved" {{ $app->status == 'approved' ? 'selected' : '' }}>
                                                Approved</option>
                                            <option value="rejected" {{ $app->status == 'rejected' ? 'selected' : '' }}>
                                                Rejected</option>
                                        </select>

                                    </div>

                                </div>
                            </form>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">You have no upcoming auditions on your calendar.</p>
                @endif
            </div>


        </div>

        <div class="row mt-4">
            <br>
            <div class="col-md-8">
                {{-- <div class="card mb-3">
                   {{-- <div><strong>Phone:</strong> {{ $app->phone }}</div>
                            <div><strong>Resume:</strong>
                                @if (!empty($app->resume))
                                    <a href="{{ asset($app->resume) }}" target="_blank">View Resume</a>
                                @else
                                    <span>No resume uploaded</span>
                                @endif
                            </div> 
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>My Productions <span class="count">(2)</span></div>
                            <ul class="nav nav-tabs filters" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="" data-discover="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-discover="true">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-discover="true">Drafts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-discover="true">Expired</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                     
                    <div class="list-group list-group-flush">
                        @foreach ($jobPosts as $job)
                            @php
                                $collapseId = 'details' . $job->id; // Unique ID for each job
                            @endphp
                    
                            <a href="#{{ $collapseId }}" class="list-group-item list-group-item-action" data-bs-toggle="collapse">
                                <span class="text-muted">
                                    (Draft) 
                                    <span class="text-primary">{{ $job->job_title }}</span> 
                                    <br>- 0 new, 0 cast, 0 audition, 0 total
                                </span>
                                <span class="float-end">
                                    <i class="bi bi-pencil me-2"></i>
                                    <i class="bi bi-trash text-danger"></i>
                                </span>
                            </a>
                            <div class="collapse" id="{{ $collapseId }}">
                                <div class="p-2 text-black d-flex flex-wrap justify-content-between">
                                    <span><strong>Status:</strong> Draft</span>
                                    <span><strong>Created on:</strong> {{ $job->created_at->format('d-m-Y') }}</span>
                                    <span><strong>Expires on:</strong> 05/02/2025</span>
                                    <span><strong>Email Notification:</strong> Enabled</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                     
                </div> --}}
                <div class="card mb-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>My Productions <span class="count">({{ $allJobs->count() }})</span></div>
                            <ul class="nav nav-tabs filters" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#all">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#active">Active
                                        ({{ $activeJobs->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#draft">Draft
                                        ({{ $draftJobs->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#expired">Expired
                                        ({{ $expiredJobs->count() }})</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content list-group list-group-flush">
                        {{-- All --}}
                        <div class="tab-pane fade show active" id="all">
                            @foreach ($allJobs as $job)
                                @include('website.components.job-item', ['job' => $job])
                            @endforeach
                        </div>

                        {{-- Active --}}
                        <div class="tab-pane fade" id="active">
                            @foreach ($activeJobs as $job)
                                @include('website.components.job-item', ['job' => $job])
                            @endforeach
                        </div>

                        {{-- Draft --}}
                        <div class="tab-pane fade" id="draft">
                            @foreach ($draftJobs as $job)
                                @include('website.components.job-item', ['job' => $job])
                            @endforeach
                        </div>

                        {{-- Expired --}}
                        <div class="tab-pane fade" id="expired">
                            @foreach ($expiredJobs as $job)
                                @include('website.components.job-item', ['job' => $job])
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">My Shortlists ({{ $acceptedapplications->count() }})</div>
                    @if ($acceptedapplications->count())
                        @foreach ($acceptedapplications as $app)
                            <div class="mb-3 p-3 border rounded bg-white">

                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <strong>Job:</strong> {{ $app->jobpost->job_title ?? 'N/A' }}
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Name:</strong> {{ $app->name }}
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">No Shortlists.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .card-header {
            font-weight: bold;
        }

        .card-body {
            background-color: #f8f8f8;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: auto;
        }

        /* Make nav links black */
        .nav-tabs .nav-link {
            color: black !important;
        }

        /* Optional: Make active link bold */
        .nav-tabs .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid black;
            /* Optional for styling */
        }
    </style>

@endsection
