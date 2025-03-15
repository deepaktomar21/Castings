@extends('admin.partials.layout')

@section('title', 'Complaint Details')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Complaint Details</h1>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Complaint Information</div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Reported By</th>
                    <td>{{ $complaint->user->name }}</td>
                </tr>
                <tr>
                    <th>Against</th>
                    <td>{{ $complaint->reportedUser->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $complaint->description }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <form action="{{ route('admin.complaints.updateStatus', $complaint->id) }}" method="POST">
                            @csrf
                            <select name="status" class="form-control">
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="rejected" {{ $complaint->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
