@extends('website.layouts.app')

@section('title', 'Blogs')

@section('content')

<section id="blog_h" class="p_3 bg-light">
    <div class="container-fluid">
        <div class="row categ_top text-center mb-4">
            <div class="col-md-12">
                <h1>Read latest <span class="col_blue">industry updates & tips</span></h1>
                <p class="mb-0">Stay updated with the latest casting news, job opportunities, and expert advice.</p>
            </div>
        </div>

        <!-- Search Form -->
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <form method="GET" action="{{ route('blogs.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search all blogs..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Show All Search Results -->
        @if(request('search'))
            <div class="row blog_h1">
                <div class="col-md-12">
                    <h3 class="text-center">Showing results for: <span class="col_blue">"{{ request('search') }}"</span></h3>
                </div>
                @foreach ($allBlogs as $blog)
                    <div class="col-md-3">
                        <div class="blog_h1i shadow_box position-relative">
                            <div class="blog_h1i1 position-relative">
                                <div class="blog_h1i1i">
                                    <div class="grid clearfix">
                                        <figure class="effect-jazz mb-0">
                                            <a href="{{ route('blogs.show', $blog->slug) }}">
                                                <img src="{{ asset($blog->image) }}" class="w-100" alt="{{ $blog->title }}">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
                                    <h6 class="mb-0 d-inline-block bg_blue p-2 text-white px-4 rounded_30">
                                        {{ $blog->category->name ?? 'General' }}
                                    </h6>
                                </div>
                            </div>
                            <div class="blog_h1i2 p-4 bg-white">
                                <h5><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                <p>{{ Str::limit(strip_tags($blog->content), 100, '...') }}</p>
                                <h6 class="mb-0 fw-bold">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">Learn More 
                                        <i class="fa fa-chevron-right ms-1 font_12"></i>
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Paginated Blogs -->
            <div class="row blog_h1">
                @foreach ($blogs as $blog)
                    <div class="col-md-3">
                        <div class="blog_h1i shadow_box position-relative">
                            <div class="blog_h1i1 position-relative">
                                <div class="blog_h1i1i">
                                    <div class="grid clearfix">
                                        <figure class="effect-jazz mb-0">
                                            <a href="{{ route('blogs.show', $blog->slug) }}">
                                                <img src="{{ asset($blog->image) }}" class="w-100" alt="{{ $blog->title }}">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
                                    <h6 class="mb-0 d-inline-block bg_blue p-2 text-white px-4 rounded_30">
                                        {{ $blog->category->name ?? 'General' }}
                                    </h6>
                                </div>
                            </div>
                            <div class="blog_h1i2 p-4 bg-white">
                                <h5><a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a></h5>
                                <p>{{ Str::limit(strip_tags($blog->content), 100, '...') }}</p>
                                <h6 class="mb-0 fw-bold">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">Learn More 
                                        <i class="fa fa-chevron-right ms-1 font_12"></i>
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
           
            <!-- Pagination -->
            <div class="row blog_h1 mt-4 text-center">
                <div class="col-md-12">
                    <p class="mb-0">
                        Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} entries
                    </p>
                    {{ $blogs->links() }}

                </div>
            </div>
        @endif
    </div>
</section>

@endsection
