@extends('admin.partials.layout')

@section('title', 'Home')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">User List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <!--<li class="breadcrumb-item">User List</li>-->
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <h2>Activity Log - {{ $user->name }}</h2>

            @if (!empty($activityLog) && is_array($activityLog))
                <ul>
                    @foreach ($activityLog as $log)
                        <li>
                            {{ \Carbon\Carbon::parse($log['timestamp'])->format('d-m-Y h:i A') }} -
                            {{ $log['action'] ?? 'Unknown Action' }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No activity logs available.</p>
            @endif


            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
        </div>

    </div>
@endsection
