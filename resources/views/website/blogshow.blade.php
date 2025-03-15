@extends('website.layouts.app')

@section('title', $post->title)

@section('content')

<section id="blog_details" class="p_3 bg-light">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_details_box shadow_box p-4 bg-white">
                    <h1 class="mb-3">{{ $post->title }}</h1>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-user me-1 col_blue"></i> 
                            <a href="#">{{ $post->author->name ?? 'Admin' }}</a> 
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-clock-o me-1 col_blue"></i> 
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-folder-open me-1 col_blue"></i> 
                            <span>{{ $post->category->name ?? 'General' }}</span>
                        </li>
                    </ul>
                    <img src="{{ asset($post->image) }}" class="w-100 rounded mb-3" alt="{{ $post->title }}">
                    <div class="blog_content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar shadow_box p-4 bg-white">
                    <h4 class="mb-3">Recent Blogs</h4>
                    <ul class="list-unstyled">
                        @foreach ($recentPosts as $recent)
                            <li class="mb-2">
                                <a href="{{ route('blogs.show', $recent->slug) }}">
                                    <i class="fa fa-chevron-right me-1"></i> {{ $recent->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
