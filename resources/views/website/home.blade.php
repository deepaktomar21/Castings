@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
{{-- search --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                        <section id="search-talent" class="p-3 bg-light">
                            <div class="container-xl">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="search-left pt-5 pb-5">
                                            <h1>Find the <span class="col_blue">Perfect Talent</span> <br> or Your Next Casting Call</h1>
                                            <p class="mt-3">Search thousands of talented actors and models, or discover the latest casting calls that match your skills.</p>
                        
                                                <form action="{{ route('searchTalent') }}" method="GET" class="search-box row bg-white p-3 mx-0 mt-4 rounded shadow">
                                                    <div class="col-md-4">
                                                        <div class="search-input mt-1">
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-transparent border-0">
                                                                    <i class="fa fa-venus-mars"></i>
                                                                </span>
                                                                <select class="form-select border-0" name="gender">
                                                                    <option selected disabled>Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <div class="search-input mt-1">
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-transparent border-0">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input type="number" class="form-control border-0" name="age" placeholder="Age">
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                        <div class="search-input mt-1">
                                                            <div class="input-group">
                                                                <span class="input-group-text bg-transparent border-0">
                                                                    <i class="fa fa-map-marker"></i>
                                                                </span>
                                                                <input type="text" class="form-control border-0" name="location" placeholder="Location">
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4 mt-3">
                                                        <button type="submit" class="btn btn-dark w-100">Search</button>
                                                    </div>
                                                </form>
                                                
                                    
                        
                                            <h5 class="mt-4">Are you a casting director? <a class="col_dark" href="{{ route('postjobForm') }}">Post a Job</a></h5>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="search-right">
                                            <div class="grid clearfix">
                                                <figure class="effect-jazz mb-0">
                                                    <a href="#"><img src="{{ asset('website/img/man-1253004_1280.jpg') }}" class="w-100 rounded shadow" alt="Talent Search"></a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        


<!-- Featured Casting Calls Section -->
<section id="featured-jobs" class="p_3 bg-white">
    <div class="container-xl">
        <h2 class="text-center mb-4">🔥 Featured Casting Calls</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="featured-job-box p-3 bg-light">
                    <h5>🎬 Lead Role in Bollywood Film</h5>
                    <p>Budget: ₹10L</p>
                    <a href="#" class="btn btn-dark">Apply Now</a>
                    <a href="#" class="view-details">View Details</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featured-job-box p-3 bg-light">
                    <h5>📸 Fashion Shoot in Mumbai</h5>
                    <p>Pay: ₹50K Per Day</p>
                    <a href="#" class="btn btn-dark">Apply Now</a>
                    <a href="#" class="view-details">View Details</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featured-job-box p-3 bg-light">
                    <h5>🎤 Voice-over for Animated Film</h5>
                    <p>Pay: ₹30K</p>
                    <a href="#" class="btn btn-dark">Apply Now</a>
                    <a href="#" class="view-details">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>

    {{-- join us --}}
    <section id="join-now" class="p-5 text-center bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Join the Best Casting Platform – <span class="text-primary">Connect with Top Directors &
                            Talents!</span></h1>
                    <p class="mb-4">Sign up today and start your journey in the entertainment industry.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-dark btn-lg">
                            🎭 I'm an Actor
                        </a>
                        <a href="#" class="btn btn-dark btn-lg">
                            🎬 I'm a Casting Director
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- category  --}}
    <section id="categories" class="p-5" style="background-color: #adade0;">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Choose Your Industry Role</h2>
                <p class="text-muted">Select a category that fits your talent and start exploring opportunities.</p>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card p-4 border-0 shadow-sm">
                        <span class="fs-1">🎭</span>
                        <h4 class="mt-3">Acting</h4>
                        <p>Find film, TV, theatre, and digital roles.</p>
                        <a href="#" class="btn btn-dark">Explore</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 border-0 shadow-sm">
                        <span class="fs-1">📸</span>
                        <h4 class="mt-3">Modeling</h4>
                        <p>Fashion, commercial, and promotional modeling jobs.</p>
                        <a href="#" class="btn btn-dark">Explore</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 border-0 shadow-sm">
                        <span class="fs-1">🎤</span>
                        <h4 class="mt-3">Voice-Over Artist</h4>
                        <p>Dubbing, animation, audiobook, and radio jobs.</p>
                        <a href="#" class="btn btn-dark">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    



    {{-- find project  --}}
    <section id="find-talent" class="p_3">
        <div class="container-xl">
            <div class="row categ_top text-center mb-4">
                <div class="col-md-12">
                    <h1>Find the <span class="col_blue">Perfect Talent</span> for Your Project</h1>
                    <p class="mb-0">Post a casting call, browse actor profiles, and connect with talent effortlessly.</p>
                </div>
            </div>

            <div class="row job_1">
                <div class="col-md-4">
                    <div class="job_1l shadow_box p-4 text-center">
                        <span class="font_60 lh-1 col_blue"><i class="fa fa-bullhorn"></i></span>
                        <h5><a href="#">Post a Casting Call</a></h5>
                        <p>Share your project details and let talent apply to your casting call.</p>
                        <a href="#" class="btn btn-dark">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job_1l shadow_box p-4 text-center">
                        <span class="font_60 lh-1 col_blue"><i class="fa fa-user"></i></span>
                        <h5><a href="#">Browse Actor Profiles</a></h5>
                        <p>Explore a diverse range of talent and find the perfect match for your project.</p>
                        <a href="#" class="btn btn-dark">Start Browsing</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job_1l shadow_box p-4 text-center">
                        <span class="font_60 lh-1 col_blue"><i class="fa fa-comments"></i></span>
                        <h5><a href="#">Shortlist & Chat with Talent</a></h5>
                        <p>Connect with shortlisted actors, schedule auditions, and finalize casting.</p>
                        <a href="#" class="btn btn-dark">Connect Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- talent --}}
    <section id="talent" class="p_3 bg-light">
        <div class="container-xl">
            <div class="row job_2">
                <div class="col-md-6">
                    <div class="job_2l pt-5 pb-5">
                        <h1>Showcase Your Talent <br> <span class="col_blue">Join 21000+ Actors & Models</span> <br> and
                            Get Discovered</h1>
                        <p class="mt-3">Create a stunning portfolio, apply for casting calls, and get notified when
                            you're shortlisted for auditions.</p>
                        <h6 class="mb-0 mt-4">
                            <a class="button dark" href="#">Create Your Portfolio</a>
                        </h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="job_2r">
                        <div class="grid clearfix">
                            <figure class="effect-jazz mb-0">
                                <a href="#"><img src="{{ asset('website/img/10.jpg') }}" class="w-100"alt="Talent Showcase"></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- blog  --}}
    <section id="blog_h" class="p_3 bg-light">
        <div class="container-fluid">
            <div class="row categ_top text-center mb-4">
                <div class="col-md-12">
                    <h1>Read latest <span class="col_dark">industry updates & tips</span></h1>
                    <p class="mb-0">Stay updated with the latest casting news, job opportunities, and expert advice.</p>
                </div>
            </div>
    
            @foreach ($blogs->chunk(4) as $blogRow)
                <div class="row blog_h1">
                    @foreach ($blogRow as $blog)
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
                                    <ul>
                                        <li class="d-inline-block">
                                            <i class="fa fa-user me-1 col_blue"></i> 
                                            <a href="#">{{ $blog->author->name ?? 'Admin' }}</a> 
                                            <span class="text-muted mx-2">|</span>
                                        </li>
                                        <li class="d-inline-block">
                                            <i class="fa fa-clock-o me-1 col_blue"></i> 
                                            <a href="#">{{ $blog->created_at->format('M d, Y') }}</a>
                                        </li>
                                    </ul>
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
            @endforeach
    
            <div class="row blog_h1 mt-4 text-center">
                <div class="col-md-12">
                    <h6 class="mb-0"><a class="button" href="{{ route('blogs.index') }}">View All Blogs</a></h6>
                </div>
            </div>
        </div>
    </section>
    
    
@endsection
