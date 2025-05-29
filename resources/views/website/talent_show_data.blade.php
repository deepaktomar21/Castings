@extends('website.layouts.app')

@section('title', 'Talent Show Data')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>
    <h1 class="text-center"></h1>
    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
        }

        section {

            overflow: hidden;
            background: #fff;
        }

        .mb-2-3,
        .my-2-3 {
            margin-bottom: 2.3rem;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .text-primary {
            color: #ceaa4d !important;
        }

        .text-secondary {
            color: #15395A !important;
        }

        .font-weight-600 {
            font-weight: 600;
        }

        .display-26 {
            font-size: 1.3rem;
        }

        @media screen and (min-width: 992px) {
            .p-lg-7 {
                padding: 4rem;
            }
        }

        @media screen and (min-width: 768px) {
            .p-md-6 {
                padding: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {
            .p-sm-2-3 {
                padding: 2.3rem;
            }
        }

        .p-1-9 {
            padding: 1.9rem;
        }

        .bg-secondary {
            background: #15395A !important;
        }

        @media screen and (min-width: 576px) {

            .pe-sm-6,
            .px-sm-6 {
                padding-right: 3.5rem;
            }
        }

        @media screen and (min-width: 576px) {

            .ps-sm-6,
            .px-sm-6 {
                padding-left: 3.5rem;
            }
        }

        .pe-1-9,
        .px-1-9 {
            padding-right: 1.9rem;
        }

        .ps-1-9,
        .px-1-9 {
            padding-left: 1.9rem;
        }

        .pb-1-9,
        .py-1-9 {
            padding-bottom: 1.9rem;
        }

        .pt-1-9,
        .py-1-9 {
            padding-top: 1.9rem;
        }

        .mb-1-9,
        .my-1-9 {
            margin-bottom: 1.9rem;
        }

        @media (min-width: 992px) {
            .d-lg-inline-block {
                display: inline-block !important;
            }
        }

        .rounded {
            border-radius: 0.25rem !important;
        }
    </style>

    <section class="bg-light">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    @if (is_array($talent->photos) && count($talent->photos) > 0)
                                        <div id="talentCarousel{{ $talent->id }}" class="carousel slide w-100"
                                            data-bs-ride="carousel">

                                            <!-- Carousel Indicators (Dots) -->
                                            <div class="carousel-indicators">
                                                @foreach ($talent->photos as $index => $photo)
                                                    <button type="button"
                                                        data-bs-target="#talentCarousel{{ $talent->id }}"
                                                        data-bs-slide-to="{{ $index }}"
                                                        class="{{ $index == 0 ? 'active' : '' }}"
                                                        aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                                        aria-label="Slide {{ $index + 1 }}"></button>
                                                @endforeach
                                            </div>

                                            <!-- Carousel Inner (Images) -->
                                            <div class="carousel-inner">
                                                @foreach ($talent->photos as $index => $photo)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img src="{{ asset($photo) }}" class="d-block w-100 rounded"
                                                            style="max-height: 400px; object-fit: contain;"
                                                            alt="Talent Image {{ $index + 1 }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('default-image.jpg') }}" class="rounded w-100"
                                            style="max-height: 400px; object-fit: contain;" alt="Default Image">
                                    @endif
                                </div>

                                <div class="col-lg-6 px-xl-10">
                                    <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                        <h3 class="h2 text-white mb-0">{{ $talent->name }} {{ $talent->last_name }}</h3>

                                        <h6 class=" text-white mb-0">{{ $talent->pronoun }}</h6>
                                    </div>
                                    <ul class="list-unstyled mb-1-9">
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">{{ $talent->professional_title }}</span>
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Profession:</span>
                                            {{ $talent->professional_title }}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Stage Name:</span>
                                            {{ $talent->stage_name }}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Language:</span>
                                            {{ $talent->languages }} </li>
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Email:</span>
                                            {{ $talent->email }}</li>
                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Mobile:</span>
                                            {{ $talent->mobile }}</li>

                                        <li class="mb-2 mb-xl-3 display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Gender:</span>
                                            {{ ucfirst($talent->gender) }}</li>
                                        <li class="display-28"><span
                                                class="display-26 text-secondary me-2 font-weight-600">Phone:</span>
                                            {{ $talent->phone }}</li>
                                    </ul>
                                    <ul class="social-icon-style1 list-unstyled mb-0 ps-0 d-flex gap-3 align-items-center">
                                        <li>
                                            <a href="{{ $talent->instagram }}" target="_blank">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $talent->linkedin }}" target="_blank">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $talent->youtube }}" target="_blank">
                                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $talent->imdb }}" target="_blank">
                                                <i class="fa fa-imdb" aria-hidden="true"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ $talent->facebook }}" target="_blank">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $talent->other_url }}" target="_blank">
                                                <i class="fa fa-other_url" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div>
                        <span class="section-title text-primary mb-3 mb-sm-4">About</span>
                        <p>{{ $talent->bio }}.</p>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-4 mb-sm-5">
                            <div class="mb-4 mb-sm-5">
                                <span class="section-title text-primary mb-3 mb-sm-4">Skills</span>

                                @php
                                    $skills = explode(',', $talent->skills);
                                @endphp

                                @foreach ($skills as $skill)
                                    @php
                                        $skill = trim($skill);
                                    @endphp

                                    <div class="progress-text">
                                        <div class="row">
                                            <div class="col-6 text-capitalize">{{ $skill }}</div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div>
                                <span class="section-title text-primary mb-3 mb-sm-4">Other Skills</span>
                                @php
                                    $skills = explode(',', $talent->other_skills);
                                @endphp

                                @foreach ($skills as $skill)
                                    @php
                                        $skill = trim($skill);
                                    @endphp

                                    <div class="progress-text">
                                        <div class="row">
                                            <div class="col-6 text-capitalize">{{ $skill }}</div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            {{-- {{ education }} --}}
                            <div>
                                <span class="section-title text-primary mb-3 mb-sm-4">Education</span>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span
                                            class="display-26 text-secondary me-2 font-weight-600">School:</span>{{ $talent->school }}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28"><span
                                            class="display-26 text-secondary me-2 font-weight-600">Degree:</span>
                                        {{ $talent->degree }}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span
                                            class="display-26 text-secondary me-2 font-weight-600">PassOut Year:</span>
                                        {{ $talent->passout_year }}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span
                                            class="display-26 text-secondary me-2 font-weight-600">Language:</span>
                                        {{ $talent->languages }} </li>
                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection
