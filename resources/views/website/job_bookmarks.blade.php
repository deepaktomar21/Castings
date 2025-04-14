@extends('website.layouts.app')

@section('title', 'My Saved Jobs')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="text-center">My Saved Jobs</h1>
    <p class="text-center">Find the latest jobs in your field</p>
    <section id="list" class="p_3 bg-light">
        <div class="container-xl">
            <div class="row list_1">
                @include('website.layouts.filter')
                <div class="col-md-8">
                    <div class="list_1r">

                        @if ($bookmarks->isEmpty())
                            <p class="text-center py-4">No jobs found </p>
                        @else
                            <div id="job-results">
                                @foreach ($bookmarks as $job)
                                    <div class="job_1l shadow_box bg-white p-4 mt-4 rounded">
                                        <div class="job_1li row align-items-center">
                                            <div class="col-md-2 text-center">
                                                <div class="job_1lil">
                                                    <span class="lh-1 col_blue"><i class="fa fa-buysellads fs-2"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">

                                                <div class="job_1lim">
                                                    <h5 class="fw-bold">{{ $job->jobPost->job_title }}</h5>
                                                    <h5 class="fw-bold"><strong>Status:</strong>
                                                        {{ ucfirst($job->status) }}</h5>

                                                    <h6 class="text-muted">
                                                        <span class="fw-bold col_blue">Location:
                                                            {{ $job->jobPost->city }}</span> •
                                                        {{ $job->jobPost->created_at->diffForHumans() }}
                                                    </h6>

                                                    <ul class="list-unstyled mt-3">

                                                        @if (!empty($job->jobPost->project_type))
                                                            <li><i class="fa fa-folder-open col_blue me-1"></i> Project
                                                                Type: {{ $job->jobPost->project_type }}</li>
                                                        @endif

                                                        @if (!empty($job->jobPost->organization_type))
                                                            <li><i class="fa fa-building col_blue me-1"></i> Organization
                                                                Type: {{ $job->jobPost->organization_type }}</li>
                                                        @endif


                                                        <li><i class="fa fa-clock-o col_blue me-1"></i> Company:
                                                            {{ $job->jobPost->company_name }}</li>

                                                    </ul>

                                                    <a href="{{ route('job.show', $job->jobPost->uuid) }}"
                                                        class="btn btn-info">View Job</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                        @endif
                    </div>
                </div>
            </div>
    </section>
@endsection
