@extends('admin.partials.layout')

@section('title', 'Manage Blog Posts')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Manage Blog Posts</h1>
        @if (session('error'))
        <p class="text-center text-danger">{{ session('error') }}</p>
        @endif
        @if (session('success'))
        <p class="text-center text-success">{{ session('success') }}</p>
        @endif
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Blog Posts</div>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">+ New Post</a>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <form action="{{ route('admin.blogs.approve', $post->id) }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="pending" {{ $post->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </form>
                                @php
                                    $badgeClass = match ($post->status) {
                                        'draft' => 'secondary',
                                        'pending' => 'warning',
                                        'published' => 'success',
                                        default => 'light',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($post->status) }}</span>
                            </td>
                            <td class="d-flex gap-2">
                               
                                
                                <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
@endsection