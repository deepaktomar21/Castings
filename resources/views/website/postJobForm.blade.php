@extends('website.layouts.app')

@section('title', 'Post Job')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <style>
        .tile-button {
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .tile-button.selected {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>

    <form action="{{ route('saveTalentSelection') }}" method="POST">
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="container py-4" id="step1">
            <div class="listing-section text-center">
                <h4 class="fw-bold">Welcome, {{ auth()->user()->name ?? 'Guest' }}, what type of talent do you need?</h4>
                <label class="text-muted">Select all that apply</label>
                <div class="row justify-content-center mt-3">
                    @php
                        $talentTypes = [
                            [
                                'key' => 'actors',
                                'icon' => 'users',
                                'name' => 'Actors & Performers',
                                'desc' => 'Cast screen and stage talent',
                            ],
                            [
                                'key' => 'voiceover',
                                'icon' => 'mic',
                                'name' => 'Voiceover',
                                'desc' => 'Cast the perfect voice',
                            ],
                            [
                                'key' => 'production',
                                'icon' => 'film',
                                'name' => 'Creatives & Production Crew',
                                'desc' => 'Hire PAs, Sound, Camera, and more',
                            ],
                            [
                                'key' => 'content_creators',
                                'icon' => 'video',
                                'name' => 'Content Creators & Real People',
                                'desc' => 'Discover personalities and on-brand talent',
                            ],
                            [
                                'key' => 'models',
                                'icon' => 'image',
                                'name' => 'Models',
                                'desc' => 'Book lifestyle, commercial, and fashion models',
                            ],
                            [
                                'key' => 'editors',
                                'icon' => 'edit',
                                'name' => 'Video Editors',
                                'desc' => 'Hire remote and on-site editors',
                            ],
                        ];
                    @endphp
                    @foreach ($talentTypes as $talent)
                        <div class="col-lg-4 col-md-6 col-sm-12 my-3 talent-option" data-value="{{ $talent['key'] }}">
                            <div class="tile-button text-center p-4 shadow-sm border rounded h-100">
                                <i data-feather="{{ $talent['icon'] }}" class="mb-3" width="40" height="40"></i>
                                <h5 class="fw-bold">{{ $talent['name'] }}</h5>
                                <p class="text-muted small">{{ $talent['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary next-step" data-step="2">Next <i
                            data-feather="arrow-right" class="ms-2"></i></button>
                </div>
            </div>
        </div>

        <div class="container py-4 d-none" id="step2">
            <div class="listing-section text-center">
                <h4 class="fw-bold">What type of project do you need?</h4>
                <label class="text-muted">Select one that best describes your production</label>
                <div class="row justify-content-center mt-3">
                    @php
                        $projectTypes = [
                            ['key' => 'theater', 'name' => 'Theater', 'desc' => 'e.g., Play, Musical'],
                            [
                                'key' => 'film',
                                'name' => 'Film',
                                'desc' => 'e.g., Feature Film, Short Film, Student Film',
                            ],
                            [
                                'key' => 'tv_series',
                                'name' => 'TV / Series',
                                'desc' => 'e.g., Scripted Show, Reality TV, Documentary',
                            ],
                            [
                                'key' => 'branded_content',
                                'name' => 'Branded Content / Commercial',
                                'desc' => 'Content produced by you',
                            ],
                            [
                                'key' => 'ugc',
                                'name' => 'User Generated Content (UGC)',
                                'desc' => 'Produced by customers, influencers, and content creators',
                            ],
                        ];
                    @endphp
                    @foreach ($projectTypes as $project)
                        <div class="col-md-4 col-sm-6 col-12 my-3 project-option" data-value="{{ $project['key'] }}">
                            <div class="tile-button text-center p-4 shadow-sm border rounded h-100">
                                <h5 class="fw-bold">{{ $project['name'] }}</h5>
                                <p class="text-muted small">{{ $project['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary prev-step" data-step="1">Back</button>
                    <button type="button" class="btn btn-primary next-step" data-step="3">Next <i
                            data-feather="arrow-right" class="ms-2"></i></button>
                </div>
            </div>
        </div>

        <div class="container py-4 d-none" id="step3">
            <div class="listing-section text-center">
                <h4 class="fw-bold">What type of organization are you working with?</h4>
                <label class="text-muted">Select one that best describes your organization</label>
                <div class="row justify-content-center mt-3">
                    @php
                        $organizations = [
                            'brand',
                            'agency',
                            'production_company',
                            'theater',
                            'studio',
                            'casting_office',
                            'school',
                            'personal_project',
                            'other',
                        ];
                    @endphp
                    @foreach ($organizations as $org)
                        <div class="col-md-4 col-sm-6 col-12 my-3 org-option" data-value="{{ $org }}">
                            <div class="tile-button text-center p-4 shadow-sm border rounded h-100">
                                <h5 class="fw-bold">{{ ucfirst(str_replace('_', ' ', $org)) }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary prev-step" data-step="2">Back</button>
                    <button type="button" class="btn btn-primary next-step" data-step="4">Next <i
                            data-feather="arrow-right" class="ms-2"></i></button>
                </div>
            </div>
        </div>

        <div class="container py-4 d-none" id="step4">
            <div class="listing-section text-center">
                <h4 class="fw-bold">Your Details</h4>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Company Name*</label>
                        <input type="text" name="company_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Company Website</label>
                        <input type="text" name="company_website" class="form-control">
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Your Job Title / Role*</label>
                        <input type="text" name="job_title" class="form-control" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">City*</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                </div>
                <input type="hidden" name="talent_types" id="talents-input">
                <input type="hidden" name="project_type" id="projects-input">
                <input type="hidden" name="organization_type" id="orgs-input">

                <div class="mt-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary prev-step" data-step="3">Back</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>

        {{-- //step5 --}}

    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {


            let selectedData = {
                talents: [],
                projects: [],
                orgs: []
            };

            function handleSelection(className, category) {
                document.querySelectorAll('.' + className).forEach(option => {
                    option.addEventListener('click', function() {
                        let value = this.getAttribute('data-value');
                        this.classList.toggle('selected');

                        if (selectedData[category].includes(value)) {
                            selectedData[category] = selectedData[category].filter(item => item !==
                                value);
                        } else {
                            selectedData[category].push(value);
                        }

                        // Update hidden input field
                        document.getElementById(category + "-input").value = selectedData[category]
                            .join(",");
                    });
                });
            }

            handleSelection('talent-option', 'talents');
            handleSelection('project-option', 'projects');
            handleSelection('org-option', 'orgs');

            // Handle Step Navigation
            function showStep(step) {
                document.querySelectorAll('.container.py-4').forEach(section => section.classList.add('d-none'));
                document.getElementById('step' + step).classList.remove('d-none');
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }

            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    let stepNumber = this.getAttribute('data-step');
                    showStep(stepNumber);
                });
            });

            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    let stepNumber = this.getAttribute('data-step');
                    showStep(stepNumber);
                });
            });
        });
    </script>

@endsection
