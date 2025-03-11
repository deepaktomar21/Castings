@extends('Frotent.layout')

@section('title', 'Home')

@section('content')

    <!-- ================ start banner Area ================= -->
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Course Details</h2>
              <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>-->
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        @if(auth()->user())
    <a href="{{route('user.dashboard')}}">Home</a>
    @else
    <a href="{{route('index')}}">Home</a>
    @endif
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Course Details</span>
      </div>
    </div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6 mb-4">
                <p>
                    <img src="{{ asset($courses->image) }}" alt="Image" class="img-fluid" >
                </p>
            </div>

            <!-- Course Details and Video Section -->
            <div class="col-lg-6 align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span>Course Details</span>
                </h2>
                
                <!--<p><strong class="text-black d-block">Teacher:</strong> Craig Daniel</p>-->
                <!--<p class="mb-5"><strong class="text-black d-block">Hours:</strong> 8:00 am &mdash; 9:30 am</p>-->
                <p>{{ $courses->description }}</p>
                <p>{{ $courses->optional_description }}</p>
                 <p><strong>About this Course:</strong> This course is designed for individuals who are looking to deepen their knowledge in the subject area. Whether you are a beginner or looking to expand your existing skills, this course provides valuable insights and practical examples to help you excel. You will learn through interactive lessons, real-world scenarios, and hands-on exercises, equipping you with the tools you need to succeed in this field.</p>

                <p><strong>What You Will Learn:</strong></p>
                <ul>
                    <li>Comprehensive understanding of key concepts</li>
                    <li>Hands-on experience with real-world applications</li>
                    <li>Practical skills to apply immediately in your work or personal projects</li>
                    <li>Guidance from expert instructors</li>
                    <li>Opportunities for networking with fellow learners</li>
                </ul>
                <!--<p>-->
                <!--    <a href="#" class="btn btn-primary rounded-0 btn-lg px-5">Enroll</a>-->
                <!--</p>-->

                <!-- Video Section -->
               <div class="video-container mt-4">
    <h4 class="mb-3">Course Content</h4>
    @php
        $videoLinks = json_decode($courses->video_link); // Decode the JSON to an array or object
    @endphp

    @if (!empty($videoLinks) && is_array($videoLinks))
        @foreach ($videoLinks as $link)
            <a href="{{ $link }}" target="_blank" class="btn  a mb-2">{{ $courses->title }}</a><br>
        @endforeach
    @else
        <p>No video links available for this course.</p>
    @endif
</div>

            </div>
        </div>
    </div>
</div>


   
      
    <!--================ End Course Details Area =================-->
    @endsection