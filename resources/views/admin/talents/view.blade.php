@extends('admin.partials.layout')

@section('title', 'Talent View')

@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Talent Details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
            </li>
            <div class="mt-3">
                <a href="{{ route('admin.talents.data') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </ol>
    </div>

    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Talent Profile</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>{{ $user->full_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Stage Name</th>
                        <td>{{ $user->stage_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>{{ $user->contact ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $user->location ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{ $user->bio ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Acting Techniques</th>
                        <td>{{ $user->acting_techniques ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Theater Experience</th>
                        <td>{{ $user->theater_experience ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Visibility</th>
                        <td>
                            <span class="badge {{ $user->visibility === 'public' ? 'badge-success' : 'badge-secondary' }}">
                                {{ ucfirst($user->visibility) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Reel Video</th>
                        <td>
                            @if ($user->reel_video)
                                <video width="250" controls autoplay muted>
                                    <source src="{{ asset($user->reel_video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                No Video Uploaded
                            @endif
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
