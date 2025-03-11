@extends('website.layouts.app')

@section('title', 'Home')

@section('content')

 {{-- talent --}}
 <section id="talent" class="p_3 bg-light">
  <div class="container-xl">
      <div class="row job_2">
          <div class="col-md-6">
              <div class="job_2l pt-5 pb-5">
                  <h1>Showcase Your Talent <br> <span class="col_blue">Join 21000+ Actors & Models</span> <br> and Get Discovered</h1>
                  <p class="mt-3">Create a stunning portfolio, apply for casting calls, and get notified when you're shortlisted for auditions.</p>
                  <h6 class="mb-0 mt-4">
                      <a class="button" href="#">Create Your Portfolio</a>
                  </h6>
              </div>
          </div>
          <div class="col-md-6">
              <div class="job_2r">
                  <div class="grid clearfix">
                      <figure class="effect-jazz mb-0">
                          <a href="#"><img src="{{ asset('website/img/10.jpg') }}" class="w-100" alt="Talent Showcase"></a>
                      </figure>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection