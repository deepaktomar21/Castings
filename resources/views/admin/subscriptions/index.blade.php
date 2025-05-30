@extends('admin.partials.layout')

@section('title', 'Subscriptions List')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Subscriptions List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <!--<li class="breadcrumb-item">User List</li>-->
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                @if (session('error'))
                    <p class="text-center text-danger">{{ session('error') }}</p>
                @endif
                @if (session('success'))
                    <p class="text-center text-success">{{ session('success') }}</p>
                @endif
                <div class="ibox-head">
                    <h2>All Plans</h2>
                    <a href="{{ route('subscriptions.create') }}" class="btn btn-primary mb-3">Create New Plan</a>


                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>S no.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Job Post Limit</th>
                                <th>Resume View Limit</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{ $i++ }}</td>

                                    <td>{{ $plan->name ?? 'N/A' }} </td>
                                    <td>{{ $plan->price ?? 'N/A' }}</td>
                                    <td>{{ $plan->duration ?? 'N/A' }}</td>
                                    <td>{{ $plan->job_post_limit ?? 'N/A' }}</td>
                                    <td>{{ $plan->resume_view_limit ?? 'N/A' }}</td>
                                    <td>{{ $plan->description ?? 'N/A' }}</td>



                                    <td>{{ $plan->is_active ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('subscriptions.edit', $plan->id) }}" class="btn btn-primary"><i
                                                class="fa fa-pen"></i> Edit</a>

                                        <form action="{{ route('subscriptions.destroy', $plan->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
