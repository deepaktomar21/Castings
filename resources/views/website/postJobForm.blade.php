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

        @if (session('LoggedAdminInfo'))
            <input type="hidden" name="user_id" id="user-id-input" value="{{ session('LoggedAdminInfo') }}">
        @endif



        <div class="container py-4" id="step1">
            <div class="listing-section text-center">
                <h4 class="fw-bold">Welcome, {{ session('LoggedAdminName') }}, what type of talent do you need?</h4>
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
                            <div class="tile-button text-center p-4 shadow-sm border rounded h-100 position-relative">
                                <input type="checkbox" name="talents[]" value="{{ $talent['key'] }}" class="d-none" />

                                <!-- Optional checkmark indicator -->
                                <span class="checkmark-icon position-absolute top-0 end-0 m-2 d-none">
                                    <i data-feather="check-circle" class="text-success"></i>
                                </span>

                                <i data-feather="{{ $talent['icon'] }}" class="mb-3" width="40" height="40"></i>
                                <h5 class="fw-bold">{{ $talent['name'] }}</h5>
                                <p class="text-muted small">{{ $talent['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">

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
                            <div class="tile-button text-center p-4 shadow-sm border rounded h-100 position-relative">
                                <input type="checkbox" name="projects[]" value="{{ $project['key'] }}" class="d-none" />

                                <!-- Optional checkmark icon -->
                                <span class="checkmark-icon position-absolute top-0 end-0 m-2 d-none">
                                    <i data-feather="check-circle" class="text-success"></i>
                                </span>

                                <h5 class="fw-bold">{{ $project['name'] }}</h5>
                                <p class="text-muted small">{{ $project['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="d-flex justify-content-between">

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
                    {{-- @foreach ($organizations as $org)

                    <div class="col-md-4 col-sm-6 col-12 my-3 org-option" data-value="{{ $org }}">
                        <div class="tile-button text-center p-4 shadow-sm border rounded h-100">
                            <h5 class="fw-bold">{{ ucfirst(str_replace('_', ' ', $org)) }}</h5>
                        </div>
                    </div>
                    @endforeach --}}
                    @foreach ($organizations as $org)
                        <div class="col-md-4 col-sm-6 col-12 my-3 org-option" data-value="{{ $org }}">
                            <div class="tile-button text-center p-4 shadow-sm border rounded h-100 position-relative">
                                <input type="checkbox" name="organizations[]" value="{{ $org }}" class="d-none" />

                                <!-- Optional checkmark icon -->
                                <span class="checkmark-icon position-absolute top-0 end-0 m-2 d-none">
                                    <i data-feather="check-circle" class="text-success"></i>
                                </span>

                                <h5 class="fw-bold">{{ ucfirst(str_replace('_', ' ', $org)) }}</h5>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="d-flex justify-content-between">

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
                <br>
                <h4 class="fw-bold">Project Details</h4>

                <div class="row justify-content-center mt-3">
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Title*</label>
                        <input type="text" name="project_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Production Description*</label>
                        <textarea name="project_description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Production type*</label>
                        <input type="text" name="project_type" class="form-control" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold d-block mb-2">Union Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="union_status" id="union"
                                value="Union" required>
                            <label class="form-check-label" for="union">Union</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="union_status" id="nonunion"
                                value="Nonunion">
                            <label class="form-check-label" for="nonunion">Nonunion</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="union_status" id="na"
                                value="N/A">
                            <label class="form-check-label" for="na">N/A</label>
                        </div>
                    </div>


                </div>



                <input type="hidden" name="talent_types" id="talents-input">
                <input type="hidden" name="project_type" id="projects-input">
                <input type="hidden" name="organization_type" id="orgs-input">

                <div class="d-flex justify-content-between">

                    <button type="button" class="btn btn-secondary prev-step" data-step="3">Back</button>
                    <button type="submit" class="btn btn-primary next-step" data-step="5">Next <i
                            data-feather="arrow-right" class="ms-2"></i></button>

                </div>
            </div>

        </div>

        {{-- step5 --}}
        <div class="container py-4 d-none" id="step5">
            <div class="listing-section text-center mb-4">
                <h4 class="fw-bold">Payment Information</h4>
            </div>


            <!-- Will you be paying talent? -->
            <div class="mb-4">
                <label class="fw-bold mb-2">Will you be paying talent?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="talent_compensation" id="compensation-radioP"
                        value="Yes" checked onchange="toggleFields()">
                    <label class="form-check-label" for="compensation-radioP">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="talent_compensation" id="compensation-radioN"
                        value="No" onchange="toggleFields()">
                    <label class="form-check-label" for="compensation-radioN">No</label>
                </div>
            </div>

            <!-- Work duration -->
            <div class="mb-4" id="work-duration-section">
                <label class="fw-bold mb-2">How long will the work take?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationH"
                        value="Less than a day" checked>
                    <label class="form-check-label" for="compensationH">Less than a day</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationD"
                        value="Less than a week">
                    <label class="form-check-label" for="compensationD">Less than a week</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationW"
                        value="Less than a month">
                    <label class="form-check-label" for="compensationW">Less than a month</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationM"
                        value="More than a month">
                    <label class="form-check-label" for="compensationM">More than a month</label>
                </div>
            </div>

            <!-- Pay rate section -->

            <div class="row mb-4 align-items-end" id="pay-rate-section">
                <label class="fw-bold mb-2">How much will they be paid?</label>
                <br>
                <div class="row mb-4 align-items-end d-flex">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="fw-bold mb-2">Rate Type</label>
                        <select class="form-select" name="pay_rate_frequency" id="pay_rate_frequency">
                            <option value="Flat Rate">Flat Rate</option>
                            <option value="Hourly">Hourly</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="fw-bold mb-2">Currency</label>
                        <select class="form-select" id="pay_rate_currency" name="pay_rate_currency"
                            onchange="updateCurrencySymbol()">
                            <option value="USD" data-symbol="$">U.S. Dollar</option>
                            <option value="GBP" data-symbol="£">Pound Sterling</option>
                            <option value="EUR" data-symbol="€">Euro</option>
                            <option value="CAD" data-symbol="$">Canadian Dollar</option>
                            <option value="AUD" data-symbol="$">Australian Dollar</option>
                            <option value="NZD" data-symbol="$">New Zealand Dollar</option>
                            <option value="INR" data-symbol="₹">Rupee</option>
                            <option value="ARS" data-symbol="$">Argentine Peso</option>
                            <option value="ZAR" data-symbol="R">South African Rand</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="fw-bold mb-2">Amount</label>
                        <div class="input-group">
                            <span class="input-group-text" id="currencySymbol">$</span>
                            <input type="number" class="form-control" id="pay_rate_amount" placeholder="Enter amount">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contract details -->
            <div class="mb-4" id="contract-details-section">
                <label class="fw-bold" for="contract_details">Additional Compensation/Contract Details</label>
                <textarea class="form-control" id="contract_details" name="contract_details" rows="4" maxlength="650"
                    placeholder="e.g., 'Pays $100/day, plus travel and meals provided. The producers plan to apply for a SAG-AFTRA agreement.'"></textarea>
                <small class="form-text text-muted">Max 650 characters.</small>
            </div>

            <script>
                function updateCurrencySymbol() {
                    const currencySelect = document.getElementById("pay_rate_currency");
                    const selectedOption = currencySelect.options[currencySelect.selectedIndex];
                    const symbol = selectedOption.getAttribute("data-symbol");
                    document.getElementById("currencySymbol").innerText = symbol;
                }

                function toggleFields() {
                    const compensationYes = document.getElementById("compensation-radioP").checked;
                    const contractDetailsSection = document.getElementById("contract-details-section");
                    const workDurationSection = document.getElementById("work-duration-section");
                    const payRateSection = document.getElementById("pay-rate-section");

                    if (compensationYes) {
                        workDurationSection.style.display = "block";
                        payRateSection.style.display = "block";
                        contractDetailsSection.style.display = "block";
                    } else {
                        workDurationSection.style.display = "none";
                        payRateSection.style.display = "none";
                        contractDetailsSection.style.display = "block";
                    }
                }


                toggleFields();
            </script>


            <!-- Tip box -->
            <div class="alert alert-warning">
                <strong>Tip:</strong> Be clear about the project compensation with an informative description.
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-step" data-step="4">Back</button>
                <button type="button" class="btn btn-primary next-step" data-step="6">Next <i
                        data-feather="arrow-right" class="ms-2"></i></button>
            </div>

        </div>

        {{-- step6 --}}
        <div class="container py-4 d-none" id="step6">
            <div class="listing-section text-center mb-4">
                <h4 class="fw-bold">Dates & Locations</h4>
            </div>

            <!-- Listing Expiry -->
            <div class="row mb-4">
                <label class="fw-bold mb-2">When should this listing expire?</label>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control gray" name = 'expire_date_listing'
                            placeholder="Select date" value="May 16, 2025">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="text" class="form-control gray" name = 'expire_time_listing'
                            placeholder="Select time" value="05:29 AM">
                    </div>
                </div>
            </div>

            <!-- Key Dates & Locations -->
            <div class="mb-4">
                <label for="prod_info" class="fw-bold">Key Dates & Locations</label>
                <textarea class="form-control gray" rows="3" id="prod_info" name="production_info" maxlength="1000"
                    placeholder="e.g., 'Rehearses in the spring in CA. Shoots in the fall in NYC.'">nm</textarea>
                <div class="character-limit">2 characters (1000 limit)</div>
            </div>

            <!-- Locations -->
            <div class="form-group mb-4">
                <label class="fw-bold">Locations</label>
                <p>Where are you auditioning or interviewing talent?</p>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeL" name="location_type"
                        value="Local" checked>
                    <label class="form-check-label" for="location_typeL">Local</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeN" name="location_type"
                        value="Nationwide">
                    <label class="form-check-label" for="location_typeN">Nationwide</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeW" name="location_type"
                        value="Worldwide">
                    <label class="form-check-label" for="location_typeW">Worldwide</label>
                </div>
            </div>

            <!-- Country Selection -->
            <div class="form-group select2-custom mb-4">
                <label for="audition_locations" class="fw-bold">Please select the country you’re seeking talent
                    from.</label>
                <select class="form-select gray" id="audition_locations" name="audition_country"
                    aria-label="Select Country">
                    <option value="" disabled hidden>Select Country</option>
                    <optgroup label="Popular">
                        <option value="India"> India</option>

                    </optgroup>

                </select>
            </div>
            <div class="d-flex flex-column flex-md-row">
                <div class="form-group">
                    <div class="position-relative"><label for="special_instructions">Do you have any special submission or
                            audition instructions?</label></div>
                    <textarea class="form-control gray" rows="3" id="special_instructions" name="audition_special_instructions"
                        maxlength="3000"
                        placeholder="e.g., 'In your cover letter, note your availability. Include a video with your submission. For the auditions, be prepared to sing. For more info about the project, visit www.example.com.'"></textarea>
                    <div class="character-limit">0 characters (3000 limit)</div>
                </div>

            </div>

            <div class="divider"></div>
            <div class="listing-section text-center mb-4">
                <h4 class="fw-bold">Additional Materials</h4>
                <div class="row mb-4">
                    <label class="fw-bold mb-2">Additional Text (e.g. script sides)?</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control gray" name="script_title"
                                placeholder="Enter title" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control gray" name="script_description"
                                placeholder="Enter description" value="">
                        </div>

                    </div>

                </div>



                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary prev-step" data-step="5">Back</button>
                    <button type="button" class="btn btn-primary next-step" data-step="7">Next</button>
                </div>


            </div>



        </div>

        {{-- step7 --}}

        <div class="container py-4 d-none" id="step7">
            <div class="listing-section text-center mb-4">
                <h4 class="fw-bold">Add and edit roles for your project</h4>
            </div>
            <section class="bg-white rounded-4 shadow-sm p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h2 class="fw-bold fs-5">Actors & Performers.</h2>





                </div>
                <p class="mb-0">Add actor roles to start discovering the on-screen and on-stage talent you are
                    looking for. Excludes voiceover..</p>

                {{-- <div class="p-3 rounded-3 mb-3" style="background-color: #dcdbdb; cursor: pointer;"
                    data-bs-toggle="modal" data-bs-target="#representationModal">

                 <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                        a Role</button>
                </div> --}}


                {{-- <!-- role Modal -->
                <div class="modal fade" id="representationModal" tabindex="-1"
                    aria-labelledby="representationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
                        <!-- Changed here -->
                        <div class="modal-content rounded-4">
                            <div class="modal-header border-0">
                                <h5 class="modal-title fw-semibold" id="representationModalLabel">Please tell us about the
                                    actor you're casting</h5> <br>
                                <p class="mb-0">Add actor roles to start discovering the on-screen and on-stage talent
                                    you
                                    are looking for. Excludes voiceover.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body pt-0">

                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT') --}}

                <div class="mb-3">
                    <label class="form-label fw-bold">Role Name *</label>
                    <input type="text" class="form-control" name="role_name" value="{{ old('role_name') }}"
                        placeholder="Enter Role Name" required style="background-color: #f8f9fa;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Role Type *</label>
                    <input type="text" class="form-control" name="role_type" value="{{ old('role_type') }}"
                        placeholder="Enter Role Type" required style="background-color: #f8f9fa;">
                </div>

                <div class="mb-3">
                    <label class="fw-bold d-block mb-2">Is this a remote/work-from-home
                        opportunity?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="remote_opportunity" id="yes"
                            value="Yes">
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="remote_opportunity" id="no"
                            value="No">
                        <label class="form-check-label" for="no">No</label>
                    </div>

                </div>

                <div class="mb-3 ">
                    <label class="form-label fw-bold d-flex align-items-center gap-1">
                        Gender(s) I identify as <span class="text-danger">*</span>
                        <i class="fa fa-info-circle" data-bs-toggle="tooltip"
                            title="Select the gender(s) you identify with. You can update it anytime later."></i>
                    </label>
                    <select name="gender" class="form-select mt-1" required>
                        <option name = "role_gender" value="">Select Gender</option>
                        @foreach (['Male', 'Female', 'Transgender Male', 'Transgender Female', 'Non-binary', 'Other', 'Prefer not to say'] as $gender)
                            <option value="{{ $gender }}" {{ old('gender') == $gender ? 'selected' : '' }}>
                                {{ $gender }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Minimum Age *</label>
                        <input type="number" class="form-control" placeholder="Enter minimum age" min="0"
                            name="role_min_age" value="{{ old('role_min_age') }}">
                    </div>

                    <!-- Maximum Age -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Maximum Age *</label>
                        <input type="number" class="form-control" placeholder="Enter maximum age" min="0"
                            name="role_max_age" value="{{ old('role_max_age') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Ethnicities (Optional)</label>
                    <select class="form-select" name="role_ethnicity">
                        <option value="">Select Ethnicity</option>
                        @php
                            $ethnicities = [
                                'Asian',
                                'Black / African Descent',
                                'Latino / Hispanic',
                                'Middle Eastern',
                                'Native American',
                                'Pacific Islander',
                                'South Asian',
                                'White / European Descent',
                                'Multiracial',
                                'Other',
                            ];
                        @endphp
                        @foreach ($ethnicities as $ethnicity)
                            <option value="{{ $ethnicity }}"
                                {{ old('role_ethnicity') == $ethnicity ? 'selected' : '' }}>
                                {{ $ethnicity }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Company Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Skills</label>
                    <input type="text" class="form-control" name="role_skills" value="{{ old('role_skills') }}"
                        placeholder="Enter Skills" style="background-color: #f8f9fa;">
                </div>

                <!-- Role Description (Recommended) 1 -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Role Description (Recommended)</label>
                    <input type="text" class="form-control" name="role_description"
                        value="{{ old('role_description') }}" placeholder="Role Description (Recommended)"
                        style="background-color: #f8f9fa;">
                </div>
                <div class="alert alert-info" style="background-color: #b1d4f8;">
                    Pre-Screen Requests have been relocated to their own workflow step to simplify
                    pre-screen configuration.
                </div>

                <div class="mb-3">
                    <label class="fw-bold d-block mb-2">Media required from applicants
                        (Optional)</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="media_required[]" id="resume"
                            value="Resume">
                        <label class="form-check-label" for="resume">Resume</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="media_required[]" id="cover_letter"
                            value="Cover Letter">
                        <label class="form-check-label" for="cover_letter">Cover Letter</label>
                    </div>


                </div>
                <div class="mb-3">
                    <label class="fw-bold d-block mb-2">Does this role require nudity?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role_require_nudity" id="yes"
                            value="Yes">
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role_require_nudity" id="no"
                            value="No">
                        <label class="form-check-label" for="no">No</label>
                    </div>

                </div>




                {{-- 
                                </form>

                            </div> --}}

                {{-- </div>
                    </div>
                </div> --}}


                <div class="divider"></div>
                <h5 class="fw-bold">You can also add roles to this project for:(eg.)</h5>
                <p class="text-muted">+ Actor.</p>
                <p class="text-muted">+ Director.</p>
                <p class="text-muted">+ Producer.</p>
                <p class="text-muted">+ Writer.</p>
                <p class="text-muted">+ Cinematographer.</p>
                <p class="text-muted"> + Voiceover.</p>
                <p class="text-muted">+ Production Assistants</p>
                <p class="text-muted"> + Sound Mixers</p>
                <p class="text-muted"> + Other Crew</p>
                <p class="text-muted"> + Content Creators</p>
                <p class="text-muted"> + Models</p>
                <p class="text-muted"> + Other</p>
                <p class="text-muted"> + Real People</p>

            </section>









            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-step" data-step="6">Back</button>
                <button type="submit" class="btn btn-primary next-step" data-step="">Submit <i
                        data-feather="arrow-right" class="ms-2"></i></button>
            </div>

        </div>












    </form>
    <style>
        .talent-option.selected .tile-button {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
        }

        .talent-option.selected .checkmark-icon {
            display: block !important;
        }

        .project-option.selected .tile-button {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
        }

        .project-option.selected .checkmark-icon {
            display: block !important;
        }

        .org-option.selected .tile-button {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
        }

        .org-option.selected .checkmark-icon {
            display: block !important;
        }
    </style>


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
