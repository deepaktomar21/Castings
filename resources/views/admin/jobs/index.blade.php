@extends('admin.partials.layout')

@section('title', 'Manage Jobs')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Job List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
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
                                <th>Recruiter Name</th>
                                <th>Talent Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->recruiter->name }}</td>
                                    <td>{{ $job->talent_types }}</td>
                                    <td>{{ ucfirst($job->status) }}</td>
                                    <td>
                                        <form action="{{ route('jobs.updateStatus', $job->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()" class="form-control">
                                                <option value="">-- Change Status --</option>
                                                <option value="active" {{ $job->status == 'active' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="inactive" {{ $job->status == 'inactive' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </form>
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
