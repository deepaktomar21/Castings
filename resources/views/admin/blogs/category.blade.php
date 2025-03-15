@extends('admin.partials.layout')

@section('title', 'Manage Categories')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Categories Management</h1>
        @if (session('error'))
        <p class="text-center text-danger">{{ session('error') }}</p>
        @endif
        @if (session('success'))
        <p class="text-center text-success">{{ session('success') }}</p>
        @endif
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Categories</div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add Category</button>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="categoryName" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

