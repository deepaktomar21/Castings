@extends('Frotent.layout')

@section('title', 'Home')

@section('content')

  <!-- ================ start banner Area ================= -->
  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-7">
          <h2 class="mb-0">About Us</h2>
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
    <span class="current">About Us</span>
  </div>
</div>

  <div class="container pt-5 mb-5">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="section-title-underline">
              <span>About LTMA</span>
            </h2>
          </div>
          <div class="col-lg-8">
            <p>We are passionate about empowering individuals with the tools, resources, and opportunities they need to thrive. Through innovative programs and personalized learning, we aim to create a transformative impact in education and career development.</p>
          </div>
          <!--<div class="col-lg-4">-->
          <!--  <p>Nam veniam tempore tenetur aliquam-->
          <!--  architecto, hic alias quia quisquam, obcaecati laborum dolores. Ex libero cumque veritatis numquam placeat?</p>-->
          <!--</div>-->
        </div>
  </div> 
<div class="site-section">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-lg-4 mb-5">
        <h2 class="section-title-underline mb-5">
          <span>Why LTMA Works</span>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
        <div class="feature-1 border">
          <div class="icon-wrapper a">
            <span class="fas fa-lightbulb text-white"></span>
            <!--<span class="flaticon-mortarboard text-white"></span>-->
          </div>
          <div class="feature-1-content">
            <h2>Why LTMA?</h2>
            <p>LTMA equips individuals with the tools and insights they need to grow personally and professionally, enabling them to unlock their full potential.</p>
            <p><a href="#" class="btn a px-4 rounded-0">Learn More</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
        <div class="feature-1 border">
          <div class="icon-wrapper a">
            <!--<span class="flaticon-school-material text-white"></span>-->
            <span class="fas fa-users text-white"></span>
          </div>
          <div class="feature-1-content">
            <h2>Talents Building</h2>
            <p>We focus on developing in-demand skills and connecting talent with career opportunities tailored to their goals.</p>
            <p><a href="#" class="btn a px-4 rounded-0">Learn More</a></p>
          </div>
        </div> 
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">
        <div class="feature-1 border">
          <div class="icon-wrapper a">
            <span class="fas fa-search text-white"></span>
            <!--<i class="flaticon-library text-white"></i>-->
          </div>
          <div class="feature-1-content">
            <h2>Job Finding</h2>
            <p>From networking to job placements, we bridge the gap between talent and employers, helping you land your dream role.</p>
            <p><a href="#" class="btn a px-4 rounded-0">Learn More</a></p>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>

<div class="site-section">
    <div class="container">
<!--        <div class="row mb-5">-->
<!--            <div class="col-lg-6 mb-lg-0 mb-4">-->
<!--                <img src="{{ asset('Frotent/images/course_4.jpg')}}" alt="Image" class="img-fluid"> -->
<!--            </div>-->
<!--            <div class="col-lg-5 ml-auto align-self-center">-->
<!--                <h2 class="section-title-underline mb-5">-->
<!--                    <span>Why LTMA Works</span>-->
<!--                </h2>-->
                <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque dolore libero corrupti! Itaque, delectus?</p>-->
                <!--<p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p>-->
<!--                <h5>1.Why LTMA?</h5>-->
<!--<p>LTMA equips individuals with the tools and insights they need to grow personally and professionally, enabling them to unlock their full potential.</p>-->
<!--<h5>2.Talent Building </h5>-->
<!--<p>We focus on developing in-demand skills and connecting talent with career opportunities tailored to their goals.</p>-->
<!--<h5>3.Job Finding </h5>-->
<!--<p>From networking to job placements, we bridge the gap between talent and employers, helping you land your dream role.</p>-->
<!--            </div>-->
<!--        </div>-->

        <div class="row">
                <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                    <img src="{{ asset('Frotent/images/3.jpg')}}" alt="Image" class="img-fluid"> 
                </div>
                <div class="col-lg-5 mr-auto align-self-center order-2 order-lg-1">
                    <h2 class="section-title-underline mb-5">
                        <span>Get Started Today</span>
                    </h2>
                    <p>Whether you’re looking to enhance your skills, find a job, market your talent, or grow your business, LTMA is here to guide you. Join our community of changemakers and take the next step in your professional journey.</p>
                    <!--<p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum totam facere.</p>-->
                </div>
            </div>
    </div>
</div>

  <!--<div class="section-bg style-1" style="background-image: url('{{ asset('Frotent/images/hero_1.jpg')}}');">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->
  <!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">-->
  <!--        <span class="icon flaticon-mortarboard"></span>-->
  <!--        <h3>Our Philosphy</h3>-->
  <!--        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>-->
  <!--      </div>-->
  <!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">-->
  <!--        <span class="icon flaticon-school-material"></span>-->
  <!--        <h3>Academics Principle</h3>-->
  <!--        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?-->
  <!--          Dolore, amet reprehenderit.</p>-->
  <!--      </div>-->
  <!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">-->
  <!--        <span class="icon flaticon-library"></span>-->
  <!--        <h3>Key of Success</h3>-->
  <!--        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?-->
  <!--          Dolore, amet reprehenderit.</p>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  

<!--<div class="site-section">-->
<!--  <div class="container">-->
<!--    <div class="row mb-5 justify-content-center text-center">-->
<!--      <div class="col-lg-4 mb-5">-->
<!--        <h2 class="section-title-underline mb-5">-->
<!--          <span>Our Teachers</span>-->
<!--        </h2>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">-->

<!--        <div class="feature-1 border person text-center">-->
<!--            <img src="{{ asset('Frotent/images/person_1.jpg')}}" alt="Image" class="img-fluid">-->
<!--          <div class="feature-1-content">-->
<!--            <h2>Craig Daniel</h2>-->
<!--            <span class="position mb-3 d-block">Math Teacher</span>    -->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">-->
<!--        <div class="feature-1 border person text-center">-->
<!--            <img src="{{ asset('Frotent/images/person_2.jpg')}}" alt="Image" class="img-fluid">-->
<!--          <div class="feature-1-content">-->
<!--            <h2>Taylor Simpson</h2>-->
<!--            <span class="position mb-3 d-block">Math Teacher</span>    -->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">-->
<!--        <div class="feature-1 border person text-center">-->
<!--            <img src="{{ asset('Frotent/images/person_3.jpg')}}" alt="Image" class="img-fluid">-->
<!--          <div class="feature-1-content">-->
<!--            <h2>Jonas Tabble</h2>-->
<!--            <span class="position mb-3 d-block">Math Teacher</span>    -->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->

<!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">-->

<!--        <div class="feature-1 border person text-center">-->
<!--            <img src="{{ asset('Frotent/images/person_4.jpg')}}" alt="Image" class="img-fluid">-->
<!--          <div class="feature-1-content">-->
<!--            <h2>Craig Daniel</h2>-->
<!--            <span class="position mb-3 d-block">Math Teacher</span>    -->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">-->
<!--        <div class="feature-1 border person text-center">-->
<!--            <img src="{{ asset('Frotent/images/person_2.jpg')}}" alt="Image" class="img-fluid">-->
<!--          <div class="feature-1-content">-->
<!--            <h2>Taylor Simpson</h2>-->
<!--            <span class="position mb-3 d-block">Math Teacher</span>    -->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-lg-4 col-md-6 mb-5 mb-lg-5">-->
<!--        <div class="feature-1 border person text-center">-->
<!--            <img src="{{ asset('Frotent/images/person_3.jpg')}}" alt="Image" class="img-fluid">-->
<!--          <div class="feature-1-content">-->
<!--            <h2>Jonas Tabble</h2>-->
<!--            <span class="position mb-3 d-block">Math Teacher</span>    -->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!--<div class="site-section ftco-subscribe-1" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg')}}')">-->
<!--  <div class="container">-->
<!--    <div class="row align-items-center">-->
<!--      <div class="col-lg-7">-->
<!--        <h2>Subscribe to us!</h2>-->
<!--        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,</p>-->
<!--      </div>-->
<!--      <div class="col-lg-5">-->
<!--        <form action="" class="d-flex">-->
<!--          <input type="text" class="rounded form-control mr-2 py-3" placeholder="Enter your email">-->
<!--          <button class="btn btn-primary rounded py-3 px-4" type="submit">Send</button>-->
<!--        </form>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div> -->

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
</style>
  <!-- ================ End Testimonials Area ================= -->
  @endsection