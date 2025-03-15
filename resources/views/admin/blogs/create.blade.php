@extends('admin.partials.layout')

@section('title', 'Create Blog Post')

@section('content')
<div class="content-wrapper">
    <div class="page-heading">
        <h1 class="page-title">Create Blog Post</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Blog</li>
            <li class="breadcrumb-item">Create</li>
            <div class="mt-3">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </ol>
    </div>

    @if (session('error'))
        <p class="text-center text-danger">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p class="text-center text-success">{{ session('success') }}</p>
    @endif

    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Write a Blog Post</div>
            </div>
            <div class="ibox-body">
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select id="category_id" name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags:</label>
                        <select id="tags" name="tags[]" class="form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Content:</label>
                     
                        <textarea id="ckeditor" name="content"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="draft" selected>Draft</option>
                            <option value="published">Published</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>

    CKEDITOR.replace('ckeditor');

</script>
@endsection
