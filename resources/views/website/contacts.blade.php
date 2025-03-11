@extends('Frotent.layout')

@section('title', 'Home')

@section('content')
	<!-- ================ Start Header Area ================= -->
	
	<!-- ================ End Header Area ================= -->

	<!-- ================ start banner Area ================= -->
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{ asset('Frotent/images/bg_1.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h1 class="mb-3 text-white">Contact Us</h1>
                <!--<p class="text-white">We’d love to hear from you. Reach out to us anytime!</p>-->
            </div>
        </div>
    </div>
</div> 

<div class="custom-breadcrumbs border-bottom">
    <div class="container">
        @if(auth()->user())
            <a href="{{ route('user.dashboard') }}">Home</a>
        @else
            <a href="{{ route('index') }}">Home</a>
        @endif
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Contact</span>
    </div>
</div>

<div class="site-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-card bg-light p-5 rounded shadow">
                    <h2 class="text-center mb-4">Get in Touch</h2>
                    <div class="row mb-4">
                        <div class="col-md-6 text-center">
                            <div class="icon-box a text-white mb-3 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="icon-envelope" style="font-size: 32px;"></i>
                            </div>
                            <h4>Email Address</h4>
                            <p class="text-muted">{{ $email ?? 'leonardtma@gmail.com' }}</p>
                            <a href="mailto:{{ $email ?? 'leonardtma@gmail.com' }}" class="btn a btn-lg px-5">Email Us</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="icon-box a text-white mb-3 rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="icon-phone" style="font-size: 32px;"></i>
                            </div>
                            <h4>Phone Number</h4>
                            <p class="text-muted">{{ $phone ?? '+ 264812754280' }}</p>
                            <a href="tel:{{ $phone ?? '+264812754280' }}" class="btn a btn-lg px-5">Call Us</a>
                        </div>
                    </div>
                    <!--<div class="text-center">-->
                        
                        
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-box {
        font-size: 24px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .contact-card h4 {
        font-weight: 700;
        color: #333;
    }
    .contact-card p {
        font-size: 16px;
        margin-bottom: 0;
    }
</style>


      
	<!-- ================ End contact-page Area ================= -->
	@endsection