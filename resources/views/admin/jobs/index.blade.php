@extends('admin.partials.layout')

@section('title', 'Manage Jobs')

@section('content')
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Job List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.dashboard')}}"><i class="la la-home font-20"></i></a>
            </li>
            <!--<li class="breadcrumb-item">User List</li>-->
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Job List</div>
                @if (session('error'))
                <p class="text-center text-danger">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                <p class="text-center text-success">{{ session('success') }}</p>
                @endif
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Premium</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->category->name }}</td>
                            <td>{{ ucfirst($job->status) }}</td>
                            <td>{{ $job->is_premium ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('jobs.approve', $job) }}" class="btn btn-success">Approve</a>
                                <a href="{{ route('jobs.reject', $job) }}" class="btn btn-danger">Reject</a>
                                <a href="{{ route('jobs.toggle-premium', $job) }}" class="btn btn-warning">Toggle Premium</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
</script>

@endsection