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
                        value="P" checked onchange="toggleFields()">
                    <label class="form-check-label" for="compensation-radioP">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="talent_compensation" id="compensation-radioN"
                        value="N" onchange="toggleFields()">
                    <label class="form-check-label" for="compensation-radioN">No</label>
                </div>
            </div>

            <!-- Work duration -->
            <div class="mb-4" id="work-duration-section">
                <label class="fw-bold mb-2">How long will the work take?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationH"
                        value="H" checked>
                    <label class="form-check-label" for="compensationH">Less than a day</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationD"
                        value="D">
                    <label class="form-check-label" for="compensationD">Less than a week</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationW"
                        value="W">
                    <label class="form-check-label" for="compensationW">Less than a month</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="expected_duration" id="compensationM"
                        value="M">
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
                        <select class="form-select" id="pay_rate_frequency">
                            <option value="F">Flat Rate</option>
                            <option value="H">Hourly</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="fw-bold mb-2">Currency</label>
                        <select class="form-select" id="pay_rate_currency" onchange="updateCurrencySymbol()">
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
                            <input type="number" class="form-control" id="pay_rate_maximum" placeholder="Enter amount">
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

                // Initial call to set visibility based on default selection (Yes by default)
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
                        <input type="text" class="form-control gray" placeholder="Select date" value="May 16, 2025">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="text" class="form-control gray" placeholder="Select time" value="05:29 AM">
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
                        value="L" checked>
                    <label class="form-check-label" for="location_typeL">Local</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeN" name="location_type"
                        value="N">
                    <label class="form-check-label" for="location_typeN">Nationwide</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="location_typeW" name="location_type"
                        value="W">
                    <label class="form-check-label" for="location_typeW">Worldwide</label>
                </div>
            </div>

            <!-- Country Selection -->
            <div class="form-group select2-custom mb-4">
                <label for="audition_locations" class="fw-bold">Please select the country you’re seeking talent
                    from.</label>
                <select class="form-select gray" id="audition_locations" aria-label="Select Country">
                    <option value="" disabled hidden>Select Country</option>
                    <optgroup label="Popular">
                        <option value="234">United States</option>
                        <option value="77">United Kingdom</option>
                        <option value="38">Canada</option>
                        <option value="13">Australia</option>
                        <option value="102">Ireland</option>
                        <option value="172">New Zealand</option>
                    </optgroup>
                    <optgroup label="Other">
                        <option value="3">Afghanistan</option>
                        <option value="15">Aland Islands</option>
                        <option value="6">Albania</option>
                        <option value="62">Algeria</option>
                        <option value="11">American Samoa</option>
                        <option value="1">Andorra</option>
                        <option value="8">Angola</option>
                        <option value="5">Anguilla</option>
                        <option value="9">Antarctica</option>
                        <option value="4">Antigua and Barbuda</option>
                        <option value="10">Argentina</option>
                        <option value="7">Armenia</option>
                        <option value="14">Aruba</option>
                        <option value="12">Austria</option>
                        <option value="16">Azerbaijan</option>
                        <option value="32">Bahamas</option>
                        <option value="23">Bahrain</option>
                        <option value="19">Bangladesh</option>
                        <option value="18">Barbados</option>
                        <option value="36">Belarus</option>
                        <option value="20">Belgium</option>
                        <option value="37">Belize</option>
                        <option value="25">Benin</option>
                        <option value="27">Bermuda</option>
                        <option value="33">Bhutan</option>
                        <option value="29">Bolivia</option>
                        <option value="30">Bonaire, Saint Eustatius and Saba</option>
                        <option value="17">Bosnia and Herzegovina</option>
                        <option value="35">Botswana</option>
                        <option value="34">Bouvet Island</option>
                        <option value="31">Brazil</option>
                        <option value="106">British Indian Ocean Territory</option>
                        <option value="240">British Virgin Islands</option>
                        <option value="28">Brunei</option>
                        <option value="22">Bulgaria</option>
                        <option value="21">Burkina Faso</option>
                        <option value="24">Burundi</option>
                        <option value="117">Cambodia</option>
                        <option value="47">Cameroon</option>
                        <option value="52">Cape Verde</option>
                        <option value="125">Cayman Islands</option>
                        <option value="41">Central African Republic</option>
                        <option value="216">Chad</option>
                        <option value="46">Chile</option>
                        <option value="48">Mainland China</option>
                        <option value="54">Christmas Island</option>
                        <option value="39">Cocos Islands</option>
                        <option value="49">Colombia</option>
                        <option value="119">Comoros</option>
                        <option value="45">Cook Islands</option>
                        <option value="50">Costa Rica</option>
                        <option value="98">Croatia</option>
                        <option value="51">Cuba</option>
                        <option value="53">Curacao</option>
                        <option value="55">Cyprus</option>
                        <option value="56">Czechia</option>
                        <option value="40">Democratic Republic of the Congo</option>
                        <option value="59">Denmark</option>
                        <option value="58">Djibouti</option>
                        <option value="60">Dominica</option>
                        <option value="61">Dominican Republic</option>
                        <option value="63">Ecuador</option>
                        <option value="65">Egypt</option>
                        <option value="211">El Salvador</option>
                        <option value="88">Equatorial Guinea</option>
                        <option value="67">Eritrea</option>
                        <option value="64">Estonia</option>
                        <option value="69">Ethiopia</option>
                        <option value="72">Falkland Islands</option>
                        <option value="74">Faroe Islands</option>
                        <option value="71">Fiji</option>
                        <option value="70">Finland</option>
                        <option value="75">France</option>
                        <option value="80">French Guiana</option>
                        <option value="176">French Polynesia</option>
                        <option value="217">French Southern Territories</option>
                        <option value="76">Gabon</option>
                        <option value="85">Gambia</option>
                        <option value="79">Georgia</option>
                        <option value="57">Germany</option>
                        <option value="82">Ghana</option>
                        <option value="83">Gibraltar</option>
                        <option value="89">Greece</option>
                        <option value="84">Greenland</option>
                        <option value="78">Grenada</option>
                        <option value="87">Guadeloupe</option>
                        <option value="92">Guam</option>
                        <option value="91">Guatemala</option>
                        <option value="81">Guernsey</option>
                        <option value="86">Guinea</option>
                        <option value="93">Guinea-Bissau</option>
                        <option value="94">Guyana</option>
                        <option value="99">Haiti</option>
                        <option value="96">Heard Island and McDonald Islands</option>
                        <option value="97">Honduras</option>
                        <option value="95">Hong Kong</option>
                        <option value="100">Hungary</option>
                        <option value="109">Iceland</option>
                        <option value="105">India</option>
                        <option value="101">Indonesia</option>
                        <option value="108">Iran</option>
                        <option value="107">Iraq</option>
                        <option value="104">Isle of Man</option>
                        <option value="103">Israel</option>
                        <option value="110">Italy</option>
                        <option value="44">Ivory Coast</option>
                        <option value="112">Jamaica</option>
                        <option value="114">Japan</option>
                        <option value="111">Jersey</option>
                        <option value="113">Jordan</option>
                        <option value="126">Kazakhstan</option>
                        <option value="115">Kenya</option>
                        <option value="118">Kiribati</option>
                        <option value="123">Kosovo</option>
                        <option value="124">Kuwait</option>
                        <option value="116">Kyrgyzstan</option>
                        <option value="127">Laos</option>
                        <option value="136">Latvia</option>
                        <option value="128">Lebanon</option>
                        <option value="133">Lesotho</option>
                        <option value="132">Liberia</option>
                        <option value="137">Libya</option>
                        <option value="130">Liechtenstein</option>
                        <option value="134">Lithuania</option>
                        <option value="135">Luxembourg</option>
                        <option value="149">Macao</option>
                        <option value="145">North Macedonia</option>
                        <option value="143">Madagascar</option>
                        <option value="157">Malawi</option>
                        <option value="159">Malaysia</option>
                        <option value="156">Maldives</option>
                        <option value="146">Mali</option>
                        <option value="154">Malta</option>
                        <option value="144">Marshall Islands</option>
                        <option value="151">Martinique</option>
                        <option value="152">Mauritania</option>
                        <option value="155">Mauritius</option>
                        <option value="247">Mayotte</option>
                        <option value="158">Mexico</option>
                        <option value="73">Micronesia</option>
                        <option value="140">Moldova</option>
                        <option value="139">Monaco</option>
                        <option value="148">Mongolia</option>
                        <option value="141">Montenegro</option>
                        <option value="153">Montserrat</option>
                        <option value="138">Morocco</option>
                        <option value="160">Mozambique</option>
                        <option value="147">Myanmar</option>
                        <option value="161">Namibia</option>
                        <option value="170">Nauru</option>
                        <option value="169">Nepal</option>
                        <option value="167">Netherlands</option>
                        <option value="252">Netherlands Antilles</option>
                        <option value="162">New Caledonia</option>
                        <option value="166">Nicaragua</option>
                        <option value="163">Niger</option>
                        <option value="165">Nigeria</option>
                        <option value="171">Niue</option>
                        <option value="164">Norfolk Island</option>
                        <option value="121">North Korea</option>
                        <option value="150">Northern Mariana Islands</option>
                        <option value="168">Norway</option>
                        <option value="173">Oman</option>
                        <option value="179">Pakistan</option>
                        <option value="186">Palau</option>
                        <option value="184">Palestinian Territory</option>
                        <option value="174">Panama</option>
                        <option value="177">Papua New Guinea</option>
                        <option value="187">Paraguay</option>
                        <option value="175">Peru</option>
                        <option value="178">Philippines</option>
                        <option value="182">Pitcairn</option>
                        <option value="180">Poland</option>
                        <option value="185">Portugal</option>
                        <option value="183">Puerto Rico</option>
                        <option value="188">Qatar</option>
                        <option value="42">Republic of the Congo</option>
                        <option value="189">Reunion</option>
                        <option value="190">Romania</option>
                        <option value="192">Russia</option>
                        <option value="193">Rwanda</option>
                        <option value="26">Saint Barthelemy</option>
                        <option value="201">Saint Helena</option>
                        <option value="120">Saint Kitts and Nevis</option>
                        <option value="129">Saint Lucia</option>
                        <option value="142">Saint Martin</option>
                        <option value="181">Saint Pierre and Miquelon</option>
                        <option value="238">Saint Vincent and the Grenadines</option>
                        <option value="245">Samoa</option>
                        <option value="206">San Marino</option>
                        <option value="210">Sao Tome and Principe</option>
                        <option value="194">Saudi Arabia</option>
                        <option value="207">Senegal</option>
                        <option value="191">Serbia</option>
                        <option value="251">Serbia and Montenegro</option>
                        <option value="196">Seychelles</option>
                        <option value="205">Sierra Leone</option>
                        <option value="200">Singapore</option>
                        <option value="212">Sint Maarten</option>
                        <option value="204">Slovakia</option>
                        <option value="202">Slovenia</option>
                        <option value="195">Solomon Islands</option>
                        <option value="208">Somalia</option>
                        <option value="248">South Africa</option>
                        <option value="90">South Georgia and the South Sandwich Islands</option>
                        <option value="122">South Korea</option>
                        <option value="198">South Sudan</option>
                        <option value="68">Spain</option>
                        <option value="131">Sri Lanka</option>
                        <option value="197">Sudan</option>
                        <option value="209">Suriname</option>
                        <option value="203">Svalbard and Jan Mayen</option>
                        <option value="214">Eswatini</option>
                        <option value="199">Sweden</option>
                        <option value="43">Switzerland</option>
                        <option value="213">Syria</option>
                        <option value="229">Taiwan</option>
                        <option value="220">Tajikistan</option>
                        <option value="230">Tanzania</option>
                        <option value="219">Thailand</option>
                        <option value="222">Timor Leste</option>
                        <option value="218">Togo</option>
                        <option value="221">Tokelau</option>
                        <option value="225">Tonga</option>
                        <option value="227">Trinidad and Tobago</option>
                        <option value="224">Tunisia</option>
                        <option value="226">Turkey</option>
                        <option value="223">Turkmenistan</option>
                        <option value="215">Turks and Caicos Islands</option>
                        <option value="228">Tuvalu</option>
                        <option value="241">U.S. Virgin Islands</option>
                        <option value="232">Uganda</option>
                        <option value="231">Ukraine</option>
                        <option value="2">United Arab Emirates</option>
                        <option value="233">United States Minor Outlying Islands</option>
                        <option value="235">Uruguay</option>
                        <option value="236">Uzbekistan</option>
                        <option value="243">Vanuatu</option>
                        <option value="237">Vatican</option>
                        <option value="239">Venezuela</option>
                        <option value="242">Vietnam</option>
                        <option value="244">Wallis and Futuna</option>
                        <option value="66">Western Sahara</option>
                        <option value="246">Yemen</option>
                        <option value="249">Zambia</option>
                        <option value="250">Zimbabwe</option>
                    </optgroup>
                </select>
            </div>
            <div class="d-flex flex-column flex-md-row">
                <div class="form-group">
                    <div class="position-relative"><label for="special_instructions">Do you have any special submission or
                            audition instructions?</label></div>
                    <textarea class="form-control gray" rows="3" id="special_instructions" name="special_instructions"
                        maxlength="3000"
                        placeholder="e.g., 'In your cover letter, note your availability. Include a video with your submission. For the auditions, be prepared to sing. For more info about the project, visit www.example.com.'"></textarea>
                    <div class="character-limit">2 characters (3000 limit)</div>
                </div>

            </div>

            <div class="divider"></div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary prev-step" data-step="5">Back</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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
