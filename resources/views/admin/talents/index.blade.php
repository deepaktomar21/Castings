@extends('admin.partials.layout')

@section('title', 'Talent Profile List')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Profile List</h1>
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
                    <div class="ibox-title">Talent's Profile List</div>
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
                                <th>S no.</th>

                                <th>Full Name</th>
                                <th>Stage Name</th>
                                <th>Contact</th>
                                <th>Location</th>
                                <th>Profession</th>
                                <th>Visibility</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>

                                    <td>{{ $user->name ?? 'N/A' }} {{ $user->last_name ?? 'N/A' }}</td>
                                    <td>{{ $user->stage_name ?? 'N/A' }}</td>
                                    <td>{{ $user->contact ?? 'N/A' }}</td>
                                    <td>{{ $user->location ?? 'N/A' }}</td>
                                    <td>{{ $user->professional_title ?? 'N/A' }}</td>

                                    <td>
                                        <span
                                            class="badge {{ $user->visibility === 'public' ? 'badge-success' : 'badge-secondary' }}">
                                            {{ ucfirst($user->visibility) }}
                                        </span>
                                    </td>
                                    <td>{{ ucfirst($user->status) }}</td>
                                    <td>
                                        <a href="{{ route('admin.talents.dataView', $user->id) }}"
                                            class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                        @if ($user->status === 'pending')
                                            <form action="{{ route('admin.talents.verify', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button class="btn btn-success">Verify</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.talents.feature', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button class="btn {{ $user->is_featured ? 'btn-warning' : 'btn-secondary' }}">
                                                {{ $user->is_featured ? 'Unfeature' : 'Feature' }}
                                            </button>
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
