@extends('Frotent.layout')

@section('title', 'Home')

@section('content')

    <!-- ================ start banner Area ================= -->
    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">News Details</h2>
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
        <span class="current">News Details</span>
      </div>
    </div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6 mb-4">
                <p>
                    <img src="{{ asset($courses->image) }}" alt="Image" class="img-fluid" style="height: 500px; width:500px;">
                </p>
            </div>

            <!-- Course Details and Video Section -->
            <div class="col-lg-6 align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span>News Details</span>
                </h2>
                
                <p><strong class="text-black d-block">{{ $courses->title }}:</strong> </p>
                <!--<p class="mb-5"><strong class="text-black d-block">Hours:</strong> 8:00 am &mdash; 9:30 am</p>-->
                <p>{!! $courses->description !!}</p>

            </div>
        </div>
    </div>
</div>


   
      
    <!--================ End Course Details Area =================-->
    @endsection