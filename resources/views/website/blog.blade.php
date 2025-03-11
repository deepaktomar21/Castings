@extends('website.layouts.app')

@section('title', 'Home')

@section('content')


<section id="blog_h" class="p_3 bg-light">
  <div class="container-xl">
      <div class="row categ_top text-center mb-4">
          <div class="col-md-12">
              <h1>Read latest <span class="col_blue">industry updates & tips</span></h1>
              <p class="mb-0">Stay updated with the latest casting news, job opportunities, and expert advice.</p>
          </div>
      </div>
      <div class="row blog_h1">
          <div class="col-md-4">
              <div class="blog_h1i shadow_box position-relative">
                  <div class="blog_h1i1 position-relative">
                      <div class="blog_h1i1i">
                          <div class="grid clearfix">
                              <figure class="effect-jazz mb-0">
                                  <a href="#"><img src="{{ asset('website/img/audition_tips.jpg') }}" class="w-100" alt="Audition Tips"></a>
                              </figure>
                          </div>
                      </div>
                      <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
                          <h6 class="mb-0 d-inline-block bg_blue p-2 text-white px-4 rounded_30">Audition Advice</h6>
                      </div>
                  </div>
                  <div class="blog_h1i2 p-4 bg-white">
                      <ul>
                          <li class="d-inline-block"><i class="fa fa-user me-1 col_blue"></i> <a href="#">Casting Pro</a> <span class="text-muted mx-2">|</span></li>
                          <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_blue"></i> <a href="#">March 5, 2025</a> </li>
                      </ul>
                      <h5><a href="#">How to Nail Your First Audition</a></h5>
                      <p>Learn essential tips from industry professionals on how to impress casting directors in your first audition...</p>
                      <h6 class="mb-0 fw-bold"><a href="#">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="blog_h1i shadow_box position-relative">
                  <div class="blog_h1i1 position-relative">
                      <div class="blog_h1i1i">
                          <div class="grid clearfix">
                              <figure class="effect-jazz mb-0">
                                  <a href="#"><img src="{{ asset('website/img/casting_calls.jpg') }}" class="w-100" alt="Casting Calls"></a>
                              </figure>
                          </div>
                      </div>
                      <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
                          <h6 class="mb-0 d-inline-block bg_blue p-2 text-white px-4 rounded_30">Job Updates</h6>
                      </div>
                  </div>
                  <div class="blog_h1i2 p-4 bg-white">
                      <ul>
                          <li class="d-inline-block"><i class="fa fa-user me-1 col_blue"></i> <a href="#">Casting News</a> <span class="text-muted mx-2">|</span></li>
                          <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_blue"></i> <a href="#">March 4, 2025</a> </li>
                      </ul>
                      <h5><a href="#">Trending Casting Calls in India</a></h5>
                      <p>Explore the latest casting opportunities and job openings in the entertainment industry...</p>
                      <h6 class="mb-0 fw-bold"><a href="#">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="blog_h1i shadow_box position-relative">
                  <div class="blog_h1i1 position-relative">
                      <div class="blog_h1i1i">
                          <div class="grid clearfix">
                              <figure class="effect-jazz mb-0">
                                  <a href="#"><img src="{{ asset('website/img/interview_casting.jpg') }}" class="w-100" alt="Casting Director Interview"></a>
                              </figure>
                          </div>
                      </div>
                      <div class="blog_h1i1i1 text-end position-absolute w-100 bottom-0 p-3">
                          <h6 class="mb-0 d-inline-block bg_blue p-2 text-white px-4 rounded_30">Exclusive Insights</h6>
                      </div>
                  </div>
                  <div class="blog_h1i2 p-4 bg-white">
                      <ul>
                          <li class="d-inline-block"><i class="fa fa-user me-1 col_blue"></i> <a href="#">Film Insider</a> <span class="text-muted mx-2">|</span></li>
                          <li class="d-inline-block"><i class="fa fa-clock-o me-1 col_blue"></i> <a href="#">March 3, 2025</a> </li>
                      </ul>
                      <h5><a href="#">Interview with a Casting Director</a></h5>
                      <p>Get exclusive insights from a top casting director on what they look for in auditions...</p>
                      <h6 class="mb-0 fw-bold"><a href="#">Learn More <i class="fa fa-chevron-right ms-1 font_12"></i></a></h6>
                  </div>
              </div>
          </div>
      </div>
      <div class="row blog_h1 mt-4 text-center">
          <div class="col-md-12">
              <h6 class="mb-0"><a class="button" href="#">View All Blogs</a></h6>
          </div>
      </div>
  </div>
</section>

@endsection