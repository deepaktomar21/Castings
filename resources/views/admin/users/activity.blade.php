@extends('admin.partials.layout')

@section('title', 'Home')

@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">User List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}"><i class="la la-home font-20"></i></a>
            </li>
            <!--<li class="breadcrumb-item">User List</li>-->
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <h2>Activity Log - {{ $user->name }}</h2>

        @if(!empty($user->activity_log) && is_array($user->activity_log))
        <ul>
            @foreach ($user->activity_log as $log)
            <li>{{ $log['timestamp'] ?? 'N/A' }} - {{ $log['action'] ?? 'Unknown Action' }}</li>
            @endforeach
        </ul>
        @else
        <p>No activity logs available.</p> {{-- ✅ Prevents error if empty --}}
        @endif

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection