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

    <form action="{{ route('recruiter.job.update', $job->id) }}" method="POST">
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



        <div class="container py-4">
            <div class="listing-section text-center">
                <h4 class="fw-bold">Welcome, {{ session('LoggedAdminName') }}, what type of talent do you need?</h4>

            </div>
            <br>

            @php
                $talentTypes = [
                    ['key' => 'actors', 'name' => 'Actors & Performers'],
                    ['key' => 'voiceover', 'name' => 'Voiceover'],
                    ['key' => 'production', 'name' => 'Creatives & Production Crew'],
                    ['key' => 'content_creators', 'name' => 'Content Creators & Real People'],
                    ['key' => 'models', 'name' => 'Models'],
                    ['key' => 'editors', 'name' => 'Video Editors'],
                ];

                $projectTypes = [
                    ['key' => 'theater', 'name' => 'Theater', 'desc' => 'e.g., Play, Musical'],
                    ['key' => 'film', 'name' => 'Film', 'desc' => 'e.g., Feature Film, Short Film, Student Film'],
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

            <div class="row mb-4 align-items-end">
                {{-- Talent Type --}}
                <div class="col-md-4 form-group mb-3">
                    <label for="talent_types" class="form-label fw-bold">Select Talent Type</label>
                    <select name="talent_types" id="talent_types" class="form-control">
                        @foreach ($talentTypes as $talent)
                            <option value="{{ $talent['key'] }}"
                                {{ old('talent_types', $job->talent_types ?? '') == $talent['key'] ? 'selected' : '' }}>
                                {{ $talent['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Project Type --}}
                <div class="col-md-4 form-group mb-3">
                    <label for="projects" class="form-label fw-bold">What type of project do you need?</label>
                    <select name="projects" id="projects" class="form-control">
                        @foreach ($projectTypes as $project)
                            <option value="{{ $project['key'] }}"
                                {{ old('projects', $job->projects ?? '') == $project['key'] ? 'selected' : '' }}>
                                {{ $project['name'] }} – {{ $project['desc'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Organization Type --}}
                <div class="col-md-4 form-group mb-3">
                    <label for="organizations" class="form-label fw-bold">What type of organization are you working
                        with?</label>
                    <select name="organizations" id="organizations" class="form-control">
                        @foreach ($organizations as $org)
                            <option value="{{ $org }}"
                                {{ old('organizations', $job->organizations ?? '') == $org ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $org)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br>
            <div class="listing-section text-center">
                <h4 class="fw-bold">Your Details</h4>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Company Name*</label>
                        <input type="text" name="company_name" class="form-control" value="{{ $job->company_name }}"
                            required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Company Website</label>
                        <input type="text" name="company_website" class="form-control "
                            value="{{ $job->company_website }}">
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Your Job Title / Role*</label>
                        <input type="text" name="job_title" class="form-control" value="{{ $job->job_title }}" required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">City*</label>
                        <input type="text" name="city" class="form-control" value="{{ $job->city }}" required>
                    </div>
                </div>
                <br>
                <h4 class="fw-bold">Project Details</h4>

                <div class="row justify-content-center mt-3">
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Title*</label>
                        <input type="text" name="project_name" class="form-control" value="{{ $job->project_name }}"
                            required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Production Description*</label>
                        <textarea name="project_description" class="form-control" rows="4" required>{{ $job->project_description }}</textarea>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold">Production type*</label>
                        <input type="text" name="project_type" class="form-control" value="{{ $job->project_type }}"
                            required>
                    </div>
                    <div class="col-md-6 my-2">
                        <label class="fw-bold d-block mb-2">Union Status</label>
                        <div class="form-check form-check-inline" value="{{ $job->union_status }}">
                            <input class="form-check-input" {{ $job->union_status == 'Union' ? 'checked' : '' }}
                                type="radio" name="union_status" id="union" value="Union" required>
                            <label class="form-check-label" for="union">Union</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" {{ $job->union_status == 'Nonunion' ? 'checked' : '' }}
                                type="radio" name="union_status" id="nonunion" value="Nonunion">
                            <label class="form-check-label" for="nonunion">Nonunion</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" {{ $job->union_status == 'N/A' ? 'checked' : '' }}
                                type="radio" name="union_status" id="na" value="N/A">
                            <label class="form-check-label" for="na">N/A</label>
                        </div>
                    </div>


                </div>



                <input type="hidden" name="talent_types" value="{{ $job->talent_types ?? '' }}" id="talents-input">
                <input type="hidden" name="project_type" value="{{ $job->project_type ?? '' }}" id="projects-input">
                <input type="hidden" name="organization_type" value="{{ $job->organization_type ?? '' }}"
                    id="orgs-input">


            </div>

            <br>
            <div class="listing-section text-center mb-4">
                <h4 class="fw-bold">Payment Information</h4>
            </div>


            <!-- Will you be paying talent? -->
            <div class="mb-4">
                <label class="fw-bold mb-2">Will you be paying talent?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="talent_compensation" id="compensation-radioP"
                        value="Yes" {{ $job->talent_compensation == 'Yes' ? 'checked' : '' }} checked
                        onchange="toggleFields()">
                    <label class="form-check-label" for="compensation-radioP">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="talent_compensation" id="compensation-radioN"
                        value="No" {{ $job->talent_compensation == 'No' ? 'checked' : '' }}
                        onchange="toggleFields()">
                    <label class="form-check-label" for="compensation-radioN">No</label>
                </div>
            </div>

            <!-- Work duration -->
            <div class="mb-4" id="work-duration-section">
                <label class="fw-bold mb-2">How long will the work take?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationH"
                        value="Less than a day" {{ $job->expected_duration == 'Less than a day' ? 'checked' : '' }}>
                    <label class="form-check-label" for="compensationH">Less than a day</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationD"
                        value="Less than a week" {{ $job->expected_duration == 'Less than a week' ? 'checked' : '' }}>
                    <label class="form-check-label" for="compensationD">Less than a week</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationW"
                        value="Less than a month" {{ $job->expected_duration == 'Less than a month' ? 'checked' : '' }}>
                    <label class="form-check-label" for="compensationW">Less than a month</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationM"
                        value="More than a month" {{ $job->expected_duration == 'More than a month' ? 'checked' : '' }}>
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
                            <option value="Flat Rate" {{ $job->pay_rate_frequency == 'Flat Rate' ? 'selected' : '' }}>Flat
                                Rate</option>
                            <option value="Hourly" {{ $job->pay_rate_frequency == 'Flat Rate' ? 'selected' : '' }}>Hourly
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="fw-bold mb-2">Currency</label>
                        <select class="form-select" id="pay_rate_currency" name="pay_rate_currency"
                            onchange="updateCurrencySymbol()">
                            <option value="USD" {{ $job->pay_rate_currency == 'USD' ? 'selected' : '' }}
                                data-symbol="$">U.S. Dollar</option>
                            <option value="GBP" {{ $job->pay_rate_currency == 'GBP' ? 'selected' : '' }}
                                data-symbol="£">Pound Sterling</option>
                            <option value="EUR" {{ $job->pay_rate_currency == 'EUR' ? 'selected' : '' }}
                                data-symbol="€">Euro</option>
                            <option value="CAD" {{ $job->pay_rate_currency == 'CAD' ? 'selected' : '' }}
                                data-symbol="$">Canadian Dollar</option>
                            <option value="AUD" {{ $job->pay_rate_currency == 'AUD' ? 'selected' : '' }}
                                data-symbol="$">Australian Dollar</option>
                            <option value="NZD" {{ $job->pay_rate_currency == 'NZD' ? 'selected' : '' }}
                                data-symbol="$">New Zealand Dollar</option>
                            <option value="INR" {{ $job->pay_rate_currency == 'INR' ? 'selected' : '' }}
                                data-symbol="₹">Rupee</option>
                            <option value="ARS" {{ $job->pay_rate_currency == 'ARS' ? 'selected' : '' }}
                                data-symbol="$">Argentine Peso</option>
                            <option value="ZAR" {{ $job->pay_rate_currency == 'ZAR' ? 'selected' : '' }}
                                data-symbol="R">South African Rand</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="fw-bold mb-2">Amount</label>
                        <div class="input-group">
                            <span class="input-group-text" id="currencySymbol">$</span>
                            <input type="number" class="form-control" id="pay_rate_amount" placeholder="Enter amount"
                                value="{{ $job->pay_rate_amount }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contract details -->
            <div class="mb-4" id="contract-details-section">
                <label class="fw-bold" for="contract_details">Additional Compensation/Contract Details</label>
                <textarea class="form-control" id="contract_details" name="contract_details" rows="4" maxlength="650"
                    placeholder="e.g., 'Pays $100/day, plus travel and meals provided. The producers plan to apply for a SAG-AFTRA agreement.'">{{ $job->contract_details }}</textarea>
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


            <br>
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
                            placeholder="Select date" value="{{ $job->expire_date_listing }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="text" class="form-control gray" name = 'expire_time_listing'
                            placeholder="Select time" value="{{ $job->expire_time_listing }}">
                    </div>
                </div>
            </div>

            <!-- Key Dates & Locations -->
            <div class="mb-4">
                <label for="prod_info" class="fw-bold">Key Dates & Locations</label>
                <textarea class="form-control gray" rows="3" id="prod_info" name="production_info" maxlength="1000"
                    placeholder="e.g., 'Rehearses in the spring in CA. Shoots in the fall in NYC.'">{{ $job->production_info }}</textarea>
                <div class="character-limit">0 characters (1000 limit)</div>
            </div>

            <!-- Locations -->
            <div class="form-group mb-4">
                <label class="fw-bold">Locations</label>
                <p>Where are you auditioning or interviewing talent?</p>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeL" name="location_type"
                        value="Local" {{ $job->location_type == 'Local' ? 'checked' : '' }}>
                    <label class="form-check-label" for="location_typeL">Local</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeN" name="location_type"
                        value="Nationwide" {{ $job->location_type == 'Nationwide' ? 'checked' : '' }}>
                    <label class="form-check-label" for="location_typeN">Nationwide</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeW" name="location_type"
                        value="Worldwide" {{ $job->location_type == 'Worldwide' ? 'checked' : '' }}>
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
                        <option value="India" {{ $job->audition_country == 'India' ? 'selected' : '' }}> India</option>

                    </optgroup>

                </select>
            </div>
            <div class="d-flex flex-column flex-md-row">
                <div class="form-group">
                    <div class="position-relative"><label for="special_instructions">Do you have any special submission or
                            audition instructions?</label></div>
                    <textarea class="form-control gray" rows="3" id="special_instructions" name="audition_special_instructions"
                        maxlength="3000"
                        placeholder="e.g., 'In your cover letter, note your availability. Include a video with your submission. For the auditions, be prepared to sing. For more info about the project, visit www.example.com.'">{{ $job->audition_special_instructions }}</textarea>
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
                                placeholder="Enter title" value="{{ $job->script_title }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control gray" name="script_description"
                                placeholder="Enter description" value="{{ $job->script_description }}">
                        </div>

                    </div>

                </div>



                <!-- Buttons -->



            </div>



            <br>
            <div class="listing-section text-center mb-4">
                <h4 class="fw-bold">Add and edit roles for your project</h4>
            </div>
            <section class="bg-white rounded-4 shadow-sm p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h2 class="fw-bold fs-5">Actors & Performers.</h2>





                </div>
                <p class="mb-0">Add actor roles to start discovering the on-screen and on-stage talent you are
                    looking for. Excludes voiceover..</p>



                <div class="mb-3">
                    <label class="form-label fw-bold">Role Name *</label>
                    <input type="text" class="form-control" name="role_name"
                        value="{{ old('role_name', $job->role_name) }}" placeholder="Enter Role Name" required
                        style="background-color: #f8f9fa;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Role Type *</label>
                    <input type="text" class="form-control" name="role_type"
                        value="{{ old('role_type', $job->role_type) }}" placeholder="Enter Role Type" required
                        style="background-color: #f8f9fa;">
                </div>

                <div class="mb-3">
                    <label class="fw-bold d-block mb-2">Is this a remote/work-from-home
                        opportunity?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="remote_opportunity" id="yes"
                            value="Yes"
                            {{ old('remote_opportunity', $job->remote_opportunity) == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="remote_opportunity" id="no"
                            value="No"
                            {{ old('remote_opportunity', $job->remote_opportunity) == 'No' ? 'checked' : '' }}>
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
                        <option value="">Select Gender</option>
                        @foreach (['Male', 'Female', 'Transgender Male', 'Transgender Female', 'Non-binary', 'Other', 'Prefer not to say'] as $gender)
                            <option value="{{ $gender }}"
                                {{ old('gender', $job->gender ?? '') == $gender ? 'selected' : '' }}>
                                {{ $gender }}
                            </option>
                        @endforeach
                    </select>


                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Minimum Age *</label>
                        <input type="number" class="form-control" placeholder="Enter minimum age" min="0"
                            name="role_min_age" value="{{ old('role_min_age', $job->role_min_age) }}">
                    </div>

                    <!-- Maximum Age -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Maximum Age *</label>
                        <input type="number" class="form-control" placeholder="Enter maximum age" min="0"
                            name="role_max_age" value="{{ old('role_max_age', $job->role_max_age) }}">
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
                                {{ old('role_ethnicity', $job->role_ethnicity ?? '') == $ethnicity ? 'selected' : '' }}>
                                {{ $ethnicity }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Company Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Skills</label>
                    <input type="text" class="form-control" name="role_skills"
                        value="{{ old('role_skills', $job->role_skills) }}" placeholder="Enter Skills"
                        style="background-color: #f8f9fa;">
                </div>

                <!-- Role Description (Recommended) 1 -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Role Description (Recommended)</label>
                    <input type="text" class="form-control" name="role_description"
                        value="{{ old('role_description', $job->role_description) }}"
                        placeholder="Role Description (Recommended)" style="background-color: #f8f9fa;">
                </div>
                <div class="alert alert-info" style="background-color: #b1d4f8;">
                    Pre-Screen Requests have been relocated to their own workflow step to simplify
                    pre-screen configuration.
                </div>

                @php
                    $mediaRequired = is_array($job->media_required)
                        ? $job->media_required
                        : explode(',', $job->media_required ?? '');
                @endphp

                <div class="mb-3">
                    <label class="fw-bold d-block mb-2">Media required from applicants (Optional)</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="media_required[]" id="resume"
                            value="Resume"
                            {{ in_array('Resume', old('media_required', $mediaRequired)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="resume">Resume</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="media_required[]" id="cover_letter"
                            value="Cover Letter"
                            {{ in_array('Cover Letter', old('media_required', $mediaRequired)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="cover_letter">Cover Letter</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold d-block mb-2">Does this role require nudity?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role_require_nudity" id="yes"
                            value="Yes"
                            {{ old('role_require_nudity', $job->role_require_nudity) == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role_require_nudity" id="no"
                            value="No"
                            {{ old('role_require_nudity', $job->role_require_nudity) == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="no">No</label>
                    </div>

                </div>

            </section>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-step">Back</button>
                <button type="submit" class="btn btn-primary next-step">Update <i data-feather="arrow-right"
                        class="ms-2"></i></button>
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




@endsection
