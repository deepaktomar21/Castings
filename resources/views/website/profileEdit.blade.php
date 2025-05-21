@extends('website.layouts.app')

@section('title', 'Account Settings')

@section('content')

    <div class="site-section">
        <div class="container">



            <br>
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <br>

            <div class="row listing-body">
                <div class="col-md-8 col-12">
                    <div class="listing-container" id="accordion" role="tablist" aria-multiselectable="true">

                        <!-- Account Settings Section -->
                        <div class="listing-section">
                            <div class="listing-section__header mb-3" role="tab" id="headingOne">
                                <h2>Account Settings</h2>
                            </div>


                            <!-- Basic Info -->
                            <div class="setting-group mb-4">
                                <div class="setting-group__header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Basic</h5>
                                    <button type="button" class="btn btn-sm btn-link text-primary p-0 text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#basicInfoModal">
                                        Edit
                                    </button>
                                </div>

                                <!-- Custom modal width -->
                                <style>
                                    .modal-dialog.modal-sm-custom {
                                        max-width: 420px;
                                    }

                                    /* Reduced height for the modal */
                                    .modal-dialog.modal-sm-custom {
                                        max-height: 220px;
                                    }

                                    /* Styling for the input fields */
                                    .form-control {
                                        height: 35px;
                                        /* Reduce the height of input fields */
                                        font-size: 14px;
                                        /* Make the text smaller */
                                        background-color: #f2f2f2;
                                        /* Dull background color */
                                    }

                                    /* Focus effect for input fields */
                                    .form-control:focus {
                                        background-color: #e9ecef;
                                        /* Slightly lighter background when focused */
                                        border-color: #007bff;
                                        /* Blue border color when focused */
                                    }
                                </style>

                                <!-- Modal -->
                                <div class="modal fade" id="basicInfoModal" tabindex="-1"
                                    aria-labelledby="basicInfoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm-custom">
                                        <div class="modal-content rounded-4 shadow">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-bold" id="basicInfoModalLabel">Basic Info</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('talent.basicInfoupdate', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <!-- First Name -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">First Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Enter your first name"
                                                            value="{{ old('name', $user->name) }}">
                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Last Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="last_name" class="form-control"
                                                            placeholder="Enter your last name"
                                                            value="{{ old('last_name', $user->last_name) }}">
                                                        @error('last_name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Enter your email"
                                                            value="{{ old('email', $user->email) }}">
                                                        @error('email')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer border-0 d-flex justify-content-start">
                                                    <button type="submit" class="btn btn-primary rounded-2">Save</button>
                                                    <button type="button" class="btn btn-secondary rounded-2"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="setting-group__content mt-2">
                                    <span class="setting-group__content--label">Name:</span>
                                    <span class="setting-group__content--desc">{{ $user->name }}
                                        {{ $user->last_name }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Email:</span>
                                    <span class="setting-group__content--desc">{{ $user->email }}</span>
                                    <button type="button" class="btn p-0 ms-2 text-primary" data-toggle="tooltip"
                                        data-placement="left"
                                        title="You do not need to add your email address to your profile. Casting Directors can contact you directly through the messaging system.">
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                </div>
                            </div>




                            <!-- My Details -->
                            <div class="setting-group mb-4">
                                <div class="setting-group__header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">My Details</h5>

                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-sm btn-link text-primary p-0 text-decoration-none"
                                        data-bs-toggle="modal" data-bs-target="#accountBasicDetailsInfo">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="accountBasicDetailsInfo" tabindex="-1"
                                        aria-labelledby="accountBasicDetailsInfoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm-custom">
                                            <div class="modal-content rounded-4 shadow">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="accountBasicDetailsInfoLabel">My Details
                                                    </h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('talent.MyDetailUpdate', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body">
                                                        <!-- Organization -->
                                                        <div class="form-group mb-3">
                                                            <label for="user-organization">Organization <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="user-organization" name="organization"
                                                                class="form-select" required>
                                                                <option value="" disabled
                                                                    {{ old('organization', $user->organization ?? '') == '' ? 'selected' : '' }}>
                                                                    Select Organization
                                                                </option>
                                                                @foreach (['Brand / Company', 'Creative / Marketing Agency', 'Production Company', 'Theater', 'Studio / Network', 'Casting Office', 'My School', 'Personal Project', 'Other'] as $option)
                                                                    <option value="{{ $option }}"
                                                                        {{ old('organization', $user->organization ?? '') == $option ? 'selected' : '' }}>
                                                                        {{ $option }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('organization')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Job Title -->
                                                        <div class="form-group mb-3">
                                                            <label for="jobTitle">Job Title/Role <span
                                                                    class="text-danger">*</span></label>
                                                            <select id="jobTitle" name="jobTitle" class="form-select"
                                                                required>
                                                                <option value="" disabled
                                                                    {{ old('jobTitle', $user->jobTitle ?? '') == '' ? 'selected' : '' }}>
                                                                    Select a job title
                                                                </option>
                                                                @foreach (['Founder / Co-Founder', 'CEO / Director', 'Creative Director', 'Casting Director', 'Production Manager', 'Talent Manager', 'Content Creator', 'Social Media Manager', 'Marketing Manager', 'Digital Marketing Executive', 'Brand Manager', 'Scriptwriter / Copywriter', 'Video Editor', 'Cinematographer', 'Photographer', 'Graphic Designer', 'UI/UX Designer', 'Web Developer', 'Software Engineer', 'Recruiter / HR Manager', 'Project Manager', 'Business Analyst', 'Sales Executive', 'Customer Support', 'Freelancer', 'Student', 'Other'] as $job)
                                                                    <option value="{{ $job }}"
                                                                        {{ old('jobTitle', $user->jobTitle ?? '') == $job ? 'selected' : '' }}>
                                                                        {{ $job }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('jobTitle')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Company Name -->
                                                        <div class="form-group mb-3">
                                                            <label for="accountSettingsCompanyName">Company Name</label>
                                                            <input type="text" class="form-control"
                                                                id="accountSettingsCompanyName"
                                                                name="accountSettingsCompanyName"
                                                                value="{{ old('accountSettingsCompanyName', $user->accountSettingsCompanyName ?? '') }}">
                                                        </div>

                                                        <!-- Company Website -->
                                                        <div class="form-group mb-3">
                                                            <label for="accountSettingsCompanyWebsite">Company, Production,
                                                                or Personal Website</label>
                                                            <input type="url" class="form-control"
                                                                id="accountSettingsCompanyWebsite"
                                                                name="accountSettingsCompanyWebsite"
                                                                placeholder="https://example.com"
                                                                value="{{ old('accountSettingsCompanyWebsite', $user->accountSettingsCompanyWebsite ?? '') }}">
                                                        </div>

                                                        <!-- Professional Link -->
                                                        <div class="form-group mb-3">
                                                            <label for="accountSettingsprofessionalLink">Professional
                                                                Link</label>
                                                            <input type="url" class="form-control"
                                                                id="accountSettingsprofessionalLink"
                                                                name="accountSettingsprofessionalLink"
                                                                value="{{ old('accountSettingsprofessionalLink', $user->accountSettingsprofessionalLink ?? '') }}">
                                                        </div>

                                                        <!-- Phone Number -->
                                                        <div class="form-group mb-3">
                                                            <label for="phoneNumberField">Phone Number</label>
                                                            <div class="input-group">
                                                                <input type="tel" class="form-control" name="phone"
                                                                    inputmode="numeric" placeholder="Enter phone number"
                                                                    value="{{ old('phone', $user->phone ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="setting-group__content mt-2">
                                    <span class="setting-group__content--label">Organization:</span>
                                    <span class="setting-group__content--desc">{{ $user->organization ?? '-' }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Job Title/Role:</span>
                                    <span class="setting-group__content--desc">{{ $user->jobTitle ?? '-' }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Company Name:</span>
                                    <span class="setting-group__content--desc">{{ $user->accountSettingsCompanyName ?? '-' }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Company Website:</span>
                                    <span class="setting-group__content--desc">{{ $user->accountSettingsCompanyWebsite ?? '-' }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Professional Link:</span>
                                    <span class="setting-group__content--desc">{{ $user->accountSettingsprofessionalLink ?? '-' }}</span>
                                </div>
                                <div class="setting-group__content">
                                    <span class="setting-group__content--label">Phone Number:</span>
                                    <span class="setting-group__content--desc">{{ $user->phone ?? '-' }}</span>
                                    <div class="alert alert-info mt-2 small">
                                        Your phone number is used for account verification purposes. It will only be visible
                                        to job posters if you apply to their projects, and no one else.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
