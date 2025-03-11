@extends('Frotent.layout')

@section('title', 'Job List')

@section('content')

    <!--<div class="intro-section" style="background-image: url('{{ asset('Frotent/images/1.jpg')}}'); ">-->
    <!--  <div class="container">-->
    <!--    <div class="row align-items-center">-->
    <!--      <div class="col-lg-12 text-overlay" data-aos="fade-up">-->
            <!--<h1>You Can Learn Anything</h1>-->
    <!--           <h1 class="responsive-text">Find a Job</h1>-->
                <!--<h2>Explore career opportunities and grow with us.</h3>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <div class="hero-slide owl-carousel site-blocks-cover mt-5">
  <div class="intro-section">
    <img src="{{ asset('Frotent/images/1.jpg') }}" alt="Identify New Talents" class="responsive-image">
    <div class="text-overlay">
      <h1 class="responsive-text">Find a Job</h1>
    </div>
  </div>
  </div>
<style>
  /* Container to make cards equal height */
  .row {
    display: flex;
    flex-wrap: wrap;
  }
.course-1-item {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.course-1-content {
  flex-grow: 1;
}

  .feature-1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    border: 1px solid #ddd;
    padding: 20px;
    transition: transform 0.3s ease-in-out;
  }

  .feature-1:hover {
    transform: translateY(-10px);
  }

  .feature-1-content {
    flex-grow: 1;
  }

  .icon-wrapper.a {
    background-color: #f0c71e;
    padding: 15px;
    border-radius: 50%;
    display: inline-block;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
  }

  .icon-wrapper.a:hover {
    transform: scale(1.1);
  }

  .btn.a:hover {
    background-color: #f0c71e;
    color: #fff;
    transition: all 0.3s ease-in-out;
  }
  .hero-slide {
  position: relative;
}

.intro-section {
  position: relative;
       /*height: 100vh;*/
  overflow: hidden;
}

.responsive-image {
  width: 100%;
  height: auto; /* Maintains aspect ratio */
}

.text-overlay {
  position: absolute;
  top: 50%; /* Center vertically */
  left: 50%; /* Center horizontally */
  transform: translate(-50%, -50%);
  text-align: center;
}

.responsive-text {
  font-size: 4vw; /* Adjust size based on viewport width */
  font-weight: bold;
  color: white;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
  margin: 0;
}

/* Media Queries for Fine-Tuning */
@media (max-width: 1200px) {
  .responsive-text {
    font-size: 5vw;
  }
   .intro-section h1 {
    font-size: 4rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}

@media (max-width: 992px) {
  .responsive-text {
    font-size: 6vw;
  }
   .intro-section h1 {
    font-size: 3rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}

@media (max-width: 768px) {
  .responsive-text {
    font-size: 7vw;
  }
  .intro-section h1 {
    font-size: 3rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}

@media (max-width: 576px) {
  /*.responsive-text {*/
  /*  font-size: 8vw;*/
  /*}*/
  .intro-section h1{
      font-size: 1rem;
  }
  .intro-section, .intro-section .container .row{
          /* height: 100vh; */
     min-height: 0px;
  }
  .intro-section, .intro-section .container .row {
    /* height: 57vh; */
    /*min-height: 0px;*/
}
.owl-carousel .owl-item img {
    margin-top: 88px;
}

.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}
@media (max-width: 476px) {
  /* Adjusting text size for smaller screens */
  .intro-section h1 {
    font-size: 1rem; /* Reducing font size */
  }

  .intro-section,
  .intro-section .container .row {
    min-height: 0; /* Ensuring no minimum height */
  }

  .intro-section {
    height: auto; /* Allow content to define height */
  }

  .owl-carousel .owl-item img {
    margin-top: 88px; /* Creating space above images */
  }
}
.hero-slide .owl-nav .owl-prev, .hero-slide .owl-nav .owl-next {
        top: 58%;
}
}
       </style>       
 <div class="site-section">
    <div class="container">


      <div class="row  justify-content-center text-center">
        <div class="col-lg-12 ">
          <h2 class="section-title-underline mb-3">
            <span>Job Listings and Career Opportunities</span>
          </h2>
          <!--<h3>Learn Skills That Matter</h3>-->
          <p>Explore a wide range of job opportunities with our job listing platform, connecting you to top employers in Namibia and beyond. We provide job readiness training to help you ace interviews, build resumes, and secure your dream job.
Visual Suggestion: Photos of happy job seekers shaking hands with recruiters, reviewing job offers, or working in professional environments.</p>
        </div>
      </div>
    </div>
  </div>
    <div class="site-section">
            <div class="container">
                <h1 style="    margin-bottom: revert; " class="text-black">Current <mark style="background: unset;" class="text-black">openings</mark></h1>
                 @if (auth()->user())
                    <form method="GET" action="{{ route('user.Careeruser') }}">
                    @else
                        <form method="GET" action="{{ route('Career') }}">
                @endif
                <div class="row mb-4">
                    <div class="col-md-2">
                    <span class="medium-uppercase" >		
                    Roles <span>({{$count}})</span>		
                    </span>
                    </div>
                    <div class="col-md-2">
                      <span class="medium-uppercase">Filter By:</span>
                    </div>
                    <div class="col-md-2">
                        <select name="location" class="form-control">
                            <option value="">Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location }}"
                                    {{ request('location') == $location ? 'selected' : '' }}>
                                    {{ $location }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="experience_level" class="form-control">
                            <option value="">Select Experience Level</option>
                            @foreach ($experienceLevels as $experienceLevel)
                                <option value="{{ $experienceLevel }}"
                                    {{ request('experience_level') == $experienceLevel ? 'selected' : '' }}>
                                    {{ $experienceLevel }}
                                </option>
                            @endforeach
                        </select>
                    </div>
<!--<div class="row mb-4">-->
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn a" style=" width: 161px;">Filter</button>
                        @if (auth()->user())
                            <a href="{{ route('user.Careeruser') }}" class="btn btn-secondary" style=" width: 161px;">Reset</a>
                        @else
                            <a href="{{ route('Career') }}" class="btn btn-secondary" style=" width: 161px;">Reset</a>
                        @endif
                    </div>
                <!--</div>-->
                </form>
                </div>
                <div class="current-opening-section">
               
@foreach ($jobs as $job)
    <div class="current-opening-dropdown item">
        <div class="opening-container" onclick="toggleDetails({{ $job->id }})">
            <div class="service-name">
                <h5>{{ $job->company_name }}</h5> <!-- Job title dynamically -->
            </div>
            <div class="service-details">
                <div class="location-name">
                    <img src="https://www.infobeans.com/wp-content/themes/infobeans-2023/src/static/assets/images/pin.svg" alt="Pin" role="presentation" aria-label="Pin">
                    <p class="tag-name">{{ $job->location }}</p> <!-- Static location or dynamic if needed -->
                </div>
                <div class="location-name">
                    <img src="https://www.infobeans.com/wp-content/themes/infobeans-2023/src/static/assets/images/briefcase.svg" alt="Service" role="presentation" aria-label="Service">
                    <p class="tag-name">{{ $job->job_title }}</p> <!-- Job category dynamically -->
                </div>
                <div class="location-name">
                    <img src="https://www.infobeans.com/wp-content/themes/infobeans-2023/src/static/assets/images/monitor.svg" alt="Years" role="presentation" aria-label="Years">
                    <p class="tag-name">{{ $job->experience_level }}+</p> <!-- Experience dynamically -->
                </div>
                <div class="location-name">
                    <!--<img src="https://www.infobeans.com/wp-content/themes/infobeans-2023/src/static/assets/images/monitor.svg" alt="Years" role="presentation" aria-label="Years">-->
                    <p class="text-white">@if (auth()->user())
                                 <a class="btn a" data-bs-toggle="modal" data-bs-target="#applyModal{{ $job->id }}">Apply Now</a>
                                    @else
                                    <a href="{{ route('user.login') }}" class="btn a">Apply</a>
                                    @endif</p> <!-- Experience dynamically -->
                </div>
            </div>
            <div class="carat-sign">
                <img src="https://www.infobeans.com/wp-content/themes/infobeans-2023/src/static/assets/images/arrow-wrap.svg" alt="Down Arrow" role="presentation" aria-label="Down Arrow">
            </div>
        </div>

        <!-- Job details section -->
        <div class="detail-container inactive" id="detailsContainer{{ $job->id }}">
            <div class="expanded-roll">
                <div class="highlighted-section left-section">
                    <div class="first-group">
                        <p class="small-uppercase text-white">Role:</p>
                        <p class="p2 base-light">{{ $job->job_title }}</p> <!-- Job title dynamically -->
                    </div>
                    <div class="second-group">
                        <p class="small-uppercase text-white">Location:</p>
                        <p class="p2 base-light">{{ $job->location }}</p> <!-- Location static or dynamic -->
                    </div>
                </div>
                <div class="highlighted-section right-section">
                    <div class="first-group">
                        <p class="small-uppercase text-white">Experience:</p>
                        <p class="p2 base-light">{{ $job->experience_level }}+ Years</p> <!-- Experience dynamically -->
                    </div>
                    <div class="second-group">
                        <p class="small-uppercase text-white">Key Skills:</p>
                        <p class="p2 base-light">{{ $job->skills }}</p> <!-- Job skills dynamically -->
                    </div>
                </div>
            </div>
            <div class="expanded-content">
                <div class="expanded-section">
                                         <div class="modal fade" id="applyModal{{ $job->id }}" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="applyModalLabel">Apply for {{ $job->job_title }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.JobApplicationuser') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="first_name" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="first_name" name="first_name"  value="{{ optional(auth()->user())->name }}"   placeholder="Enter your first name" required>
                                                                @if(auth()->user())
                                                                    <input type="text" class="form-control" id="user_id" value="{{ auth()->user()->id }}" name="user_id" hidden>
                                                                @else
                                                                    <input type="text" class="form-control" id="user_id" value="" name="user_id" hidden>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="last_name" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="last_name" name="last_name"  value="{{ optional(auth()->user())->last_name }}"  placeholder="Enter your last name" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="email" class="form-label">Email ID</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="{{ optional(auth()->user())->email }}" placeholder="Enter your email address" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="contact_number" class="form-label">Contact Number</label>
                                                                <input type="number" class="form-control" id="contact_number" name="contact_number" value="{{ optional(auth()->user())->phone }}" placeholder="Enter your contact number" required>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="location" class="form-label">Location</label>
                                                                <select class="form-control" id="location" name="location"  required>
                                                                    <option value="{{ $job->location }}">{{ $job->location }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="address" class="form-label">Address</label>
                                                                <textarea class="form-control" id="address" name="address" rows="3" value="" placeholder="Enter your address" required>{{ optional(auth()->user())->address }}</textarea>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="experience_level" class="form-label">Experience Level</label>
                                                                <input type="text" class="form-control" id="experience_level" value="{{ $job->experience_level }}"  name="experience_level" placeholder="Enter your experience level" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="post" class="form-label">Which Post You Apply</label>
                                                                <input type="text" class="form-control" id="post" placeholder="Enter the post you are applying for" name="post" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="current_ctc" class="form-label">Current CTC</label>
                                                                <input type="number" class="form-control" id="current_ctc" name="current_ctc" placeholder="Enter your current CTC" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="expected_ctc" class="form-label">Expected CTC</label>
                                                                <input type="number" class="form-control" id="expected_ctc" name="expected_ctc" placeholder="Enter your expected CTC" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="employment_type" class="form-label">Employment Type</label>
                                                                <select class="form-control" id="employment_type" name="employment_type" required>
                                                                    <option value="{{ $job->employment_type }}">{{ $job->employment_type }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="resume" class="form-label">Upload Resume</label>
                                                                <input type="file" class="form-control" id="resume" name="resume" required>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="cover_letter" class="form-label">Upload Cover Letter (Optional)</label>
                                                                <input type="file" class="form-control" id="cover_letter" name="cover_letter" placeholder="Upload your cover letter">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn a">Submit Application</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
<script>
    function toggleDetails(jobId) {
        const detailsContainer = document.getElementById('detailsContainer' + jobId);
        detailsContainer.classList.toggle('inactive');
    }
</script>

<style>
.medium-uppercase {
    /*font-size: 1rem;*/
    /*line-height: 1rem;*/
    text-transform: uppercase;
        margin: 0;
    /*font-size: 18px;*/
    font-weight: 600;
    color: #2c3e50;
}
mark{
        color: #ea1b3d;
}
.section-heading h1 {
    font-weight: 400;
}
.p2 {
    color: #2f2f39;
      text-transform: capitalize;
    line-height: 1.5rem;
}
 .service-details {
    display: flex
;
    align-items: flex-start;
    gap: 24px;
    width: 60.28%;
}
.service-name {
    width: 15.1%;
}

/*.location-name:first-child {*/
/*    width: 37.19%;*/
/*}*/
 .service-name h5 {
    font-weight: 400;
}
    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }
     .tag-name {
    font-size: .75rem;
    line-height: .75rem;
    text-transform: uppercase;
}
body:not(.wp-admin) p.p2.base-light {
    font-weight: 300;
        font-size: larger;
}
body:not(.wp-admin) .small-uppercase {
    font-size: 1rem;
    line-height: .8125rem;
    text-transform: uppercase;
}
    /*.current-opening-dropdown {*/
    /*    background: #fff;*/
    /*    border-radius: 8px;*/
    /*    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);*/
    /*    margin-bottom: 20px;*/
    /*    padding: 20px;*/
    /*    transition: transform 0.3s ease;*/
    /*}*/

    /*.current-opening-dropdown:hover {*/
    /*    transform: scale(1.02);*/
    /*}*/
    .expanded-roll .highlighted-section p.p2 {
    color: #2f2f39;
    line-height: 1.5rem;
}


.expanded-roll {
    display: flex
;
    padding: 24px;
    align-items: flex-start;
    background: #f0c71e;
}
    .opening-container {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        padding: 10px 0;
        align-items: center;
        transition: background-color 0.3s ease;
    }
.current-opening-dropdown {
    position: relative;
    padding: 4px 0;
    border-top: 1px solid #e6e6ed;
}
    .opening-container:hover {
        background-color: #f0f0f0;
    }

    .service-name h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
    }

    .service-details {
        display: flex;
        justify-content: space-between;
        /*width: 60%;*/
    }

    .location-name {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #7f8c8d;
            width: 0px;
    }

    .location-name img {
        margin-right: 5px;
    }

    .carat-sign img {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    /*.carat-sign {*/
    /*    cursor: pointer;*/
    /*}*/

    /*.detail-container {*/
    /*    margin-top: 15px;*/
    /*    display: none;*/
    /*    padding: 20px;*/
    /*    background-color: #ecf0f1;*/
    /*    border-radius: 8px;*/
    /*}*/

    .inactive {
        display: none;
    }

    .expanded-roll {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .highlighted-section {
        width: 48%;
    }

    .first-group, .second-group {
        margin-bottom: 10px;
    }

    .small-uppercase {
        font-size: 12px;
        text-transform: uppercase;
        color: #7f8c8d;
    }

    .p2 {
        font-size: 14px;
        color: #34495e;
        line-height: 1.6;
    }

    .wp-block-list {
        list-style-type: disc;
        margin-left: 20px;
    }

    .wp-block-list li {
        margin-bottom: 8px;
    }

    .expanded-content p {
        font-size: 16px;
        color: #34495e;
        font-weight: bold;
        margin-top: 20px;
    }

    .expanded-section {
        margin-top: 15px;
    }
     .current-opening-section {
    padding: 0 0 80px;
}
 /*new */
/* .opening-container {*/
/*    padding: 15px;*/
/*    border: 1px solid #ccc;*/
/*    margin-bottom: 10px;*/
/*    background-color: #f9f9f9;*/
/*    border-radius: 8px;*/
/*}*/

/*.service-details {*/
/*    gap: 10px;*/
/*}*/

/*.location-name {*/
/*    display: flex;*/
/*    align-items: center;*/
/*    font-size: 14px;*/
/*}*/

/*.location-name .icon {*/
/*    width: 20px;*/
/*    height: 20px;*/
/*}*/

@media (max-width: 768px) {
    .service-details {
        flex-direction: column;
        align-items: flex-start;
    }
    .tag-name {
        font-size: 12px;
    }
    .opening-container {
        flex-direction: column;
    }
    .service-name h5 {
    align-items: flex-start;
        
    }
    .service-name {
           width: 59%;
}
}
/*new end*/
</style>

                <!-- Filtering Form -->
               
                <!-- Job Listings -->
                <!--<div class="row">-->
                <!--    @foreach ($jobs as $job)-->
                <!--        <div class="col-md-4 mb-4">-->
                <!--            <div class="card">-->
                <!--                <div class="card-header">-->
                <!--                    <h5>{{ $job->job_title }}</h5>-->
                <!--                    <small>Company: {{ $job->company_name }}</small>-->
                <!--                </div>-->
                <!--                <div class="card-body">-->
                <!--                    <p><strong>Location:</strong> {{ $job->location }}</p>-->
                <!--                    <p><strong>Experience Level:</strong> {{ $job->experience_level }}</p>-->
                <!--                    <p><strong>Salary Range:</strong> {{ $job->salary_range }}</p>-->
                <!--                    <p><strong>Deadline:</strong> {{ $job->application_deadline }}</p>-->
                <!--                    @if (auth()->user())-->
                <!--                        <a href="{{ route('user.bloguser', $job->id) }}" class="btn a ">View-->
                <!--                            Details</a>-->
                <!--                    @else-->
                <!--                        <a href="{{ route('blog', $job->id) }}" class="btn a">View Details</a>-->
                <!--                    @endif-->
                <!--                  @if (auth()->user())-->
                <!--                 <a class="btn a" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>-->
                <!--                    @else-->
                <!--                    <a href="{{ route('user.login') }}" class="btn a">Apply</a>-->
                <!--                    @endif-->
                <!--                    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">-->
                <!--                         <div class="modal-dialog modal-lg">-->
                <!--                            <div class="modal-content">-->
                <!--                                <div class="modal-header">-->
                <!--                                    <h5 class="modal-title" id="applyModalLabel">Apply for {{ $job->job_title }}</h5>-->
                <!--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                <!--                                </div>-->
                <!--                                <div class="modal-body">-->
                <!--                                    <form action="{{ route('user.JobApplicationuser') }}" method="POST" enctype="multipart/form-data">-->
                <!--                                        @csrf-->
                <!--                                        <div class="row">-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="first_name" class="form-label">First Name</label>-->
                <!--                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>-->
                <!--                                                @if(auth()->user())-->
                <!--                                                    <input type="text" class="form-control" id="user_id" value="{{ auth()->user()->id }}" name="user_id" hidden>-->
                <!--                                                @else-->
                <!--                                                    <input type="text" class="form-control" id="user_id" value="" name="user_id" hidden>-->
                <!--                                                @endif-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="last_name" class="form-label">Last Name</label>-->
                <!--                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="email" class="form-label">Email ID</label>-->
                <!--                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="contact_number" class="form-label">Contact Number</label>-->
                <!--                                                <input type="number" class="form-control" id="contact_number" name="contact_number" placeholder="Enter your contact number" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-12 mb-3">-->
                <!--                                                <label for="location" class="form-label">Location</label>-->
                <!--                                                <select class="form-control" id="location" name="location" required>-->
                <!--                                                    <option value="{{ $job->location }}">{{ $job->location }}</option>-->
                <!--                                                </select>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-12 mb-3">-->
                <!--                                                <label for="address" class="form-label">Address</label>-->
                <!--                                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="experience_level" class="form-label">Experience Level</label>-->
                <!--                                                <input type="text" class="form-control" id="experience_level" value="{{ $job->experience_level }}" name="experience_level" placeholder="Enter your experience level" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="post" class="form-label">Which Post You Apply</label>-->
                <!--                                                <input type="text" class="form-control" id="post" placeholder="Enter the post you are applying for" name="post" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="current_ctc" class="form-label">Current CTC</label>-->
                <!--                                                <input type="number" class="form-control" id="current_ctc" name="current_ctc" placeholder="Enter your current CTC" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="expected_ctc" class="form-label">Expected CTC</label>-->
                <!--                                                <input type="number" class="form-control" id="expected_ctc" name="expected_ctc" placeholder="Enter your expected CTC" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="employment_type" class="form-label">Employment Type</label>-->
                <!--                                                <select class="form-control" id="employment_type" name="employment_type" required>-->
                <!--                                                    <option value="{{ $job->employment_type }}">{{ $job->employment_type }}</option>-->
                <!--                                                </select>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-6 mb-3">-->
                <!--                                                <label for="resume" class="form-label">Upload Resume</label>-->
                <!--                                                <input type="file" class="form-control" id="resume" name="resume" required>-->
                <!--                                            </div>-->
                <!--                                            <div class="col-md-12 mb-3">-->
                <!--                                                <label for="cover_letter" class="form-label">Upload Cover Letter (Optional)</label>-->
                <!--                                                <input type="file" class="form-control" id="cover_letter" name="cover_letter" placeholder="Upload your cover letter">-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                        <div class="modal-footer">-->
                <!--                                            <button type="submit" class="btn btn-primary">Submit Application</button>-->
                <!--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                <!--                                        </div>-->
                <!--                                    </form>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->

                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    @endforeach-->
                <!--  </div>-->
<!--                    <div class="row">-->
<!--                    <div class="col-lg-6 col-md-6 mb-4 course-1-content  pb-4">-->
<!--                         <h1>Our <span class="highlight">values</span></h1>-->
<!--      <p>-->
<!--        Our values are simple and the foundation of our culture stands on four pillars – -->
<!--        <strong>Excellence, Ownership, Compassion, and Openness.</strong> Be it managing team -->
<!--        expectations or customer experience; every process is led by our cultural pillars that -->
<!--        are at the core of each aspect of the business.-->
<!--      </p>-->
<!--      <a href="#" class="learn-more">Learn about life at InfoBeans →</a>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 col-md-6 mb-4 course-1-content  pb-4">-->
<!--                <div class="course-1-item ">-->
<!--                    <figure class="thumnail">-->
<!--                            <a href="course-single.html"><img src="{{ asset('Frotent/images/course_1.jpg')}}" alt="Image" class="img-fluid"></a>-->
<!--                    </figure>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        </div>-->
<!--            <div class="container-fluid">-->
<!--                <div class="row">-->
<!--            <div class="col-lg-12 col-md-6 mb-4 " style="background: #142848; color:#fff;">-->
<!--                <div class="course-1-item">-->
<!--                    <figure class="thumnail">-->
<!--                    <div class="text-center"><h3 class="">Our mission-->
<!--</h3></div>  -->
<!--                    </figure>-->
<!--                    <div class="course-1-content pb-4">-->
<!--                    <p class="desc mb-4">At [LTMA], our mission is to empower individuals and businesses by delivering innovative solutions that drive growth, inspire creativity, and transform ideas into impactful realities.-->

<!--We are dedicated to:-->

<!--Innovation: Continuously pushing boundaries to provide cutting-edge technologies and services.-->
<!--Excellence: Ensuring top-quality performance in everything we do.-->
<!--Collaboration: Building strong, lasting partnerships with our clients and communities.-->
<!--Sustainability: Creating solutions that are not only effective but also environmentally and socially responsible.-->
<!--By fostering a culture of trust, transparency, and inclusivity, we strive to make a positive difference in the world, one project at a time.-->

<!--Together, let’s create a future that’s brighter, smarter, and more connected.</p>-->
                    <!--<p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div></div>-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--             <div class="col-lg-6 col-md-6 mb-4 course-1-content">-->
<!--                <div class="course-1-item">-->
<!--                    <figure class="thumnail">-->
<!--                            <a href="course-single.html"><img src="{{ asset('Frotent/images/course_2.jpg')}}" alt="Image" class="img-fluid"></a>-->
<!--                    </figure>-->
<!--                </div>-->
<!--            </div>-->
<!--             <div class="col-lg-6 col-md-6 mb-4 course-1-content">-->
<!--                         <h1>Our <span class="highlight">Vision</span></h1>-->
<!--              <p>-->
<!--                    Our vision is to create a workplace where innovation thrives and every team member feels valued. -->
<!--                    We aim to lead the industry by fostering a culture of collaboration and continuous improvement.-->
<!--                </p>-->
<!--      <a href="#" class="learn-more">Learn about life at InfoBeans →</a>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
