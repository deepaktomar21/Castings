@extends('Frotent.layout')

@section('title', 'Course Details')

@section('content')
<!-- Hero Section -->
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="text-white mb-0">Course Details</h2>
                <!--<p class="text-white-50">Learn more about this course and start learning today!</p>-->
            </div>
        </div>
    </div>
</div>

<!-- Course Details Section -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <!-- Course Header -->
            <div class="course-header text-center mb-5">
                <h1 class="display-5">{{ $course->title }}</h1>
                <p class="lead text-muted">{{ $course->description }}</p>
            </div>

            <!-- Course Videos -->
            <div class="course-videos">
                <h3 class="text-center mb-4">Course Videos</h3>
                @if($course->video_link)
                    <div class="list-group">
                        <a href="{{ $course->video_link }}" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-play-circle me-3 text-primary" style="font-size: 1.5rem;"></i>
                            <span>{{ $course->title }}</span>
                        </a>
                    </div>
                @else
                    <p class="text-muted text-center">No videos available for this course at the moment.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
