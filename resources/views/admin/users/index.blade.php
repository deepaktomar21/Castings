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
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">User List</div>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Approval</th>
                                <th>Membership</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.approve', $user->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            <select name="is_approved"
                                                class="form-select form-select-sm w-auto text-{{ $user->is_approved ? 'success' : 'danger' }}"
                                                onchange="this.form.submit()">
                                                <option value="1" {{ $user->is_approved ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ !$user->is_approved ? 'selected' : '' }}>
                                                    Deactivate</option>
                                            </select>
                                        </form>
                                    </td>


                                    <td>{{ ucfirst($user->membership_plan) }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.activity', $user->id) }}" class="btn btn-info">View
                                            Activity</a>
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
