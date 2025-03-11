@extends('Frotent.layout')

@section('title', $talent->name . ' Profile')

@section('content')

   <!--<div class="intro-section" style="background-image: url('{{ asset('Frotent/images/hero_1.jpg')}}'); background-size: cover; padding: 60px 0;">-->
   <!--     <div class="container text-center text-white">-->
   <!--         <div class="row align-items-center">-->
   <!--             <div class="col-lg-12">-->
   <!--                 <h1 class="display-4 font-weight-bold">Join Our Team</h1>-->
   <!--                 <h2 class="lead">Explore career opportunities and grow with us.</h2>-->
   <!--             </div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </div>-->
      
  <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/1.jpg')}}')">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-7">
          <h2 class="mb-0">Talent</h2>
          <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>-->
    <!--      <p class="text-muted">-->
    <!--{{ $talent->name }}, a talented individual with expertise in {{ implode(', ', $talent->skills) }}, fluent in {{ implode(', ', $talent->languages) }}, and currently based in {{ $talent->current_location }}. Available for remote work: {{ $talent->remote_work ? 'Yes' : 'No' }}.-->
    <!--  </p>-->
        </div>
      </div>
    </div>
  </div> 
  

<div class="container py-5">
    <div class="profile-card shadow-lg p-4 bg-white rounded text-center">
        <!-- Profile Image -->
        <div class="profile-image mb-3">
            @if($talent->image)
                <img src="{{ asset($talent->image) }}" alt="{{ $talent->name }}" class="img-fluid rounded-circle border" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #f0c71e !important;">
            @else
                <img src="{{ asset('Frontend/images/default-talent-image.jpg') }}" alt="{{ $talent->name }}" class="img-fluid rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
            @endif
        </div>
        
        <!-- Profile Name -->
        <h3 class="mb-2">{{ $talent->name }}</h3>
        <p class="text-muted mb-4">"Are you ready for your next job?"</p>
        
        <!-- Badges -->
        <div class="badges mb-4">
            <i class="fas fa-star bi"></i>
            <i class="fas fa-briefcase bi"></i>
            <i class="fas fa-graduation-cap bi"></i>
            <i class="fas fa-certificate bi"></i>
            <i class="fas fa-thumbs-up bi"></i>
        </div>
        
        <!-- Tabs Section -->
        <div class="row">
            <div class="col-6 mb-3">
                <button class="btn a w-100" data-bs-toggle="modal" data-bs-target="#personalInfoModal">
                    Personal Info</button>
            </div>
            <div class="col-6 mb-3">
                <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#educationModal">
                    Education 
                </button>
            </div>
            <div class="col-6 mb-3">
                <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#skillsModal">Skills  Qualifications</button>
            </div>
            <div class="col-6 mb-3">
                <button class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#workExperienceModal">
                    Work Experience 
                </button>
            </div>
        </div>
        
        <!-- Contact Button -->
        <a href="mailto:{{ $talent->email }}" class="btn a px-4 py-2 rounded-pill shadow">
            <i class="fas fa-envelope"></i> Get in Touch
        </a>
    </div>
</div>

<!-- Modals -->
<!-- Personal Info Modal -->
<div class="modal fade" id="personalInfoModal" tabindex="-1" aria-labelledby="personalInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personalInfoModalLabel">Personal Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> {{ $talent->name }}</p>
                <p><strong>Email:</strong> {{ $talent->email }}</p>
                <p><strong>Phone:</strong> {{ $talent->contact_number }}</p>
                <p><strong>Address:</strong> {{ $talent->address }}</p>
                <p><strong>Gender:</strong> {{ $talent->gender }}</p>
                <p><strong>DOB:</strong> {{ $talent->dob }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Education Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="educationModalLabel">Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <!--<ul>-->
                <p><strong><i class="fas fa-briefcase"></i> Industry Expertise:</strong> {{ $talent->industry_expertise }}</p>
                <p><strong><i class="fas fa-clock"></i> Working Hours:</strong> {{ $talent->working_hours }}</p>
                <p><strong><i class="fas fa-laptop-house"></i> Remote Work:</strong> {{ $talent->remote_work ? 'Yes' : 'No' }}</p>
                <p><strong><i class="fas fa-map-marker-alt"></i> Current Location:</strong> {{ $talent->current_location }}</p>
                <p><strong><i class="fas fa-exchange-alt"></i> Relocate:</strong> {{ $talent->relocate ? 'Yes' : 'No' }}</p>
                <p><strong><i class="fas fa-trophy"></i> Achievements:</strong> {{ $talent->achievements }}</p>
                <p><strong><i class="fas fa-smile"></i> Hobbies:</strong> {{ $talent->hobbies }}</p>
                <p><strong><i class="fas fa-rocket"></i> Career Objectives:</strong> {{ $talent->career_objectives }}</p>

                <!--</ul>-->
            </div>
        </div>
    </div>
</div>

<!-- Skills Modal -->
<div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="skillsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skillsModalLabel">Skills & Qualifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach($talent->skills as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
                 <p><strong>Requirements:</strong> {{ $talent->requirements }}</p>
                 <p><strong>Certifications:</strong></p>

<!-- Loop through certifications -->
@php
    $certifications = json_decode($talent->certifications, true);
@endphp

@if(is_array($certifications) && count($certifications) > 0)
    <ul>
        @foreach($certifications as $certification)
            <li>
                <a href="{{ asset('public/' . $certification) }}" 
                   class="btn a btn-sm" 
                   download>
                   Download {{ basename($certification) }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No certifications available.</p>
@endif
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Work Experience Modal -->
<div class="modal fade" id="workExperienceModal" tabindex="-1" aria-labelledby="workExperienceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workExperienceModalLabel">Work Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <!--<ul>-->
                <p><strong>Experience level:</strong> {{ $talent->experience_level }}</p>
                <p><strong>Experience Year:</strong> {{ $talent->years_experience }}</p>
                <!--</ul>-->
            </div>
        </div>
    </div>
</div>


<style>
.profile-card {
    max-width: 400px;
    margin: auto;
}
.badges i {
    font-size: 1.5rem;
    margin-right: 0.5rem;
}
.modal-body p, .modal-body ul {
    text-align: left;
}


    /* Profile Card Styling */
    /*.profile-card {*/
    /*    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);*/
    /*    padding: 20px;*/
    /*    border-radius: 15px;*/
    /*    transition: box-shadow 0.3s ease;*/
    /*}*/

    /*.profile-card:hover {*/
    /*    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);*/
    /*}*/

    /* Profile Image */
    /*.profile-image img {*/
    /*    transition: transform 0.3s ease, box-shadow 0.3s ease;*/
    /*}*/

    /*.profile-image img:hover {*/
    /*    transform: scale(1.1);*/
    /*    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);*/
    /*}*/

    /*.profile-status {*/
    /*    font-size: 0.8rem;*/
    /*    padding: 5px 10px;*/
    /*    background-color: #4caf50;*/
    /*    color: #fff;*/
    /*    border-radius: 15px;*/
    /*}*/

    /* Profile Info */
    /*.profile-info h2 {*/
    /*    color: #333;*/
    /*    font-weight: bold;*/
    /*    text-transform: capitalize;*/
    /*}*/

    /*.profile-info p {*/
    /*    font-size: 1rem;*/
    /*    color: #555;*/
    /*}*/

    /*.profile-info a {*/
    /*    text-decoration: none;*/
    /*    color: #007bff;*/
    /*    transition: color 0.3s ease;*/
    /*}*/

    /*.profile-info a:hover {*/
    /*    color: #0056b3;*/
    /*}*/

    /* Icon Styling */
    .bi {
        background-color:#fff;
        color: #f0c71e;
    }
</style>
<!-- Bootstrap 5 CSS -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">-->

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
