@extends('admin.partials.layout')

@section('title', 'Complaints Management')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Complaints Management</h1>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Complaints List</div>
            @if (session('error'))
            <p class="text-center text-danger">{{ session('error') }}</p>
            @endif
            @if (session('success'))
            <p class="text-center text-success">{{ session('success') }}</p>
            @endif
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reported By</th>
                        <th>Against</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $key => $complaint)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $complaint->user->name }}</td>
                            <td>{{ $complaint->reportedUser->name }}</td>
                            <td>{{ Str::limit($complaint->description, 50) }}</td>
                            <td>
                                <span class="badge badge-{{ $complaint->status == 'pending' ? 'warning' : ($complaint->status == 'resolved' ? 'success' : 'danger') }}">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.complaints.view', $complaint->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
