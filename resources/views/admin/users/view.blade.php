@extends('admin.partials.layout')

@section('title', 'User View')

@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">User View</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">View</li>
        </ol>
    </div>

    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">User Details</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Skills</th>
                        <td>{{ $user->skills }}</td>
                    </tr>
                    <tr>
                        <th>Designation</th>
                        <td>{{ $user->designation }}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{{ $user->message }}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            @if ($user->img)
                                <img src="{{ asset($user->img) }}" alt="User Image" width="120" class="img-thumbnail">
                            @else
                                No Image Uploaded
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>LinkedIn Profile</th>
                        <td>
                            @if ($user->linked_link)
                                <a href="{{ $user->LinkedIn_link }}" target="_blank">{{ $user->linked_link }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Portfolio Link</th>
                        <td>
                            @if ($user->portfolio_link)
                                <a href="{{ $user->portfolio_link }}" target="_blank">{{ $user->portfolio_link }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Resume</th>
                        <td>
                            @if ($user->resume)
                                <a href="{{ asset($user->resume) }}" target="_blank" class="btn btn-primary btn-sm">View Resume</a>
                            @else
                                No Resume Uploaded
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
