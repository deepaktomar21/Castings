@extends('website.layouts.app')

@section('title', 'Profile')

@section('content')


    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4">
        <br>
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h4 class="mb-0">Your Profile</h4>
                    <p class="mb-0">Manage your profile information and settings.</p>
                    @if (isset($profile) && $profile->is_complete)
                        <p class="text-success">Your profile is complete!</p>
                    @else
                        <p class="text-warning">Your profile is incomplete. Please fill out all sections.</p>
                    @endif

                    @php
                        // Retrieve the user from the database (assuming you're using the authenticated user)
$user = auth()->user();

// Fields to check in the profile
$profileFields = [
    'name',
    'last_name',
    'email',
    'phone',
    'role',
    'photos',
    'city_id',
    'postal_code',
    'stage_name',
    'contact',
    'location',
    'gender',
    'max_age',
    'ethnicity',
    'height_feet',
    'height_inches',
    'weight',
    'body_type',
    'hair_color',
    'eye_color',
    'bio',
    'acting_techniques',
    'theater_experience',
    'reel_video',
    'visibility',
];

// Points per completed field
$pointsPerField = 4;
$totalPoints = count($profileFields) * $pointsPerField;
$completedPoints = 0;
foreach ($profileFields as $field) {
    if (!empty($user->$field)) {
        $completedPoints += $pointsPerField;
    }
}

$percentage = ($completedPoints / $totalPoints) * 100;
$roundedPercentage = round($percentage);

if ($roundedPercentage < 40) {
    $emoji = '😟';
} elseif ($roundedPercentage < 80) {
    $emoji = '😐';
} else {
    $emoji = '😄';
                        }
                    @endphp

                    <div>
                        <p><strong>Profile Completion Percentage:</strong> {{ $roundedPercentage }}%</p>
                        <div class="progress"
                            style="height: 25px; width: 100%; background-color: #e9ecef; border-radius: 6px;">
                            <div class="progress-bar bg-info text-dark" role="progressbar"
                                style="width: {{ $roundedPercentage }}%; border-radius: 6px; line-height: 25px;">
                                {{ $roundedPercentage }}%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-header text-black text-center py-3">
                            <p class="text-muted">Note: All fields marked with * are required.</p>
                            <p class="text-muted">You can update your profile at any time.</p>

                            <p class="mb-0">Please fill out the form below to create or update your profile.</p>


                        </div>


                        <style>
                            .w-md-25 {
                                width: 320px;
                            }
                        </style>

                        <div class="card-body">


                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-start bg-light p-4 border-bottom">
                                <!-- Left Side -->
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <h1 class="h2 fw-bold text-dark mb-0">{{ $profile->name }} {{ $profile->last_name }}
                                        </h1>
                                        <button type="button" class="btn btn-primary btn-sm rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#basicInfoModal">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                    <h5 class="text-muted mb-0">Actor • New York, NY</h5>
                                    <h6 class="text-secondary small">Male • He/Him</h6>
                                </div>

                                <!-- Right Side -->
                                <div class="mt-4 mt-md-0 bg-white p-4 rounded-3 shadow-lg"
                                    style="width: 250px; height: 180px; border: 1px solid #e0e0e0;">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div>
                                            <h5 class="fw-bold text-dark mb-1">Edit Contact Information</h5>
                                            <p class="text-muted small mb-0">Your contact information will be visible in
                                                applications but not in your public profile.</p>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm ms-2 rounded-circle shadow-sm">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="basicInfoModal" tabindex="-1" aria-labelledby="basicInfoModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content rounded-4 shadow">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fw-bold" id="basicInfoModalLabel">Basic Talent Info</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Stage Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your stage name">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Pronoun (optional)</label>
                                                <select class="form-select">
                                                    <option value="He/him">He/him</option>
                                                    <option value="She/her">She/her</option>
                                                    <option value="They/them">They/them</option>
                                                </select>
                                            </div>


                                            <!-- Your page content -->
                                            <div class="mb-3 position-relative">
                                                <label class="form-label fw-bold d-flex align-items-center gap-1">
                                                    Gender(s) I identify as
                                                    <span class="text-danger">*</span>
                                                    <i class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Select the gender(s) you identify with. You can update it anytime later."></i>
                                                </label>
                                                <select class="form-select mt-1">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Transgender Male">Transgender Male</option>
                                                    <option value="Transgender Female">Transgender Female</option>
                                                    <option value="Non-binary">Non-binary</option>
                                                    <option value="Other">Other</option>
                                                    <option value="Prefer not to say">Prefer not to say</option>
                                                </select>
                                            </div>


                                            <!-- Tooltip Activation Script -->
                                            <script>
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                                                    return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                            </script>


                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Professional/Working Title</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your Professional/Working Title">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Location (if on-site)
                                                </label>
                                                <p>Select or type to search locations</p>
                                                <select class="form-select select2" name="city_id">
                                                    <option value="">Select City</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Profile Visibility
                                                </label>
                                                <br>
                                                <input type="radio" name="visibility" value="private"
                                                    class="form-check-input" id="privateVisibility">
                                                <label for="privateVisibility" class="form-check-label">Private</label>
                                                <input type="radio" name="visibility" value="public"
                                                    class="form-check-input" id="publicVisibility">
                                                <label for="publicVisibility" class="form-check-label">Public</label>
                                            </div>

                                        </div>
                                        <div class="modal-footer border-0 d-flex justify-content-start">
                                            <button type="button" class="btn btn-primary rounded-2">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-2"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <!-- About Me -->

                            <br>


                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">About Me</h2>

                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-link p-0 text-decoration-none d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#editAboutMeModal"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%;">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>

                                </div>

                                <!-- Clickable Bio Section -->
                                <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#editAboutMeModal">
                                    <p class="text-muted mb-1">Go beyond the headshot! Showcase your personality and talent
                                        with a captivating bio.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                                        bio</button>
                                </div>



                                <!-- Modal -->
                                <div class="modal fade" id="editAboutMeModal" tabindex="-1"
                                    aria-labelledby="editAboutMeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editAboutMeModalLabel">Edit About
                                                    Me</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">This is your chance to shine! Share your story,
                                                    experiences, and what makes you unique.</p>

                                                <div class="mb-3">
                                                    <label for="bio" class="form-label fw-bold">Bio</label>
                                                    <textarea class="form-control" id="bio" placeholder="Write your bio here... max. 500 words"
                                                        style="height: 300px;"></textarea>
                                                </div>


                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="submit"
                                                        class="btn btn-primary rounded-pill px-4">Save</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>

                            <br>

                            <!-- Appearance Section -->
                            <section class="bg-white rounded-4 shadow-sm p-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">Appearance</h2>
                                    <button type="button"
                                        class="btn btn-link text-primary text-decoration-none p-0 d-flex align-items-center justify-content-center gap-1"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%;"
                                        data-bs-toggle="modal" data-bs-target="#appearanceModal">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <!-- Appearance Modal -->
                                <div class="modal fade" id="appearanceModal" tabindex="-1"
                                    aria-labelledby="appearanceModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="appearanceModalLabel">Appearance
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">
                                                    We’ve expanded the list of available genders on Backstage! You can now
                                                    view and update your gender(s) under “Basic Details” by clicking the
                                                    icon next to your name.
                                                </p>

                                                <form>
                                                    <div class="row">
                                                        <!-- Minimum Age -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Minimum Age *</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter minimum age" min="0"
                                                                value="">
                                                            <small class="text-muted">Age range cannot exceed 20
                                                                years</small>
                                                        </div>

                                                        <!-- Maximum Age -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Maximum Age *</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter maximum age" min="0"
                                                                value="">

                                                        </div>
                                                    </div>


                                                    <!-- Ethnicities -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Ethnicities (Optional)</label>
                                                        <select class="form-select" name="ethnicity">
                                                            <option value="">Select Ethnicity</option>
                                                            <option value="Asian">Asian</option>
                                                            <option value="Black / African Descent">Black / African Descent
                                                            </option>
                                                            <option value="Latino / Hispanic">Latino / Hispanic</option>
                                                            <option value="Middle Eastern">Middle Eastern</option>
                                                            <option value="Native American">Native American</option>
                                                            <option value="Pacific Islander">Pacific Islander</option>
                                                            <option value="South Asian">South Asian</option>
                                                            <option value="White / European Descent">White / European
                                                                Descent</option>
                                                            <option value="Multiracial">Multiracial</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>


                                                    <!-- Height -->
                                                    <!-- Height -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Height (US Metric)</label>
                                                        <div class="d-flex gap-2">
                                                            <input type="number" class="form-control" placeholder="Feet"
                                                                min="0" value="5">
                                                            <input type="number" class="form-control"
                                                                placeholder="Inches" min="0" value="">
                                                        </div>
                                                    </div>

                                                    <!-- Weight -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Weight (in Kilograms)</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Kilograms" min="0" value="">
                                                    </div>


                                                    <!-- Body Type -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Body Type</label>
                                                        <select class="form-select">
                                                            <option value="">Select Body Type</option>
                                                            <option value="Slim">Slim</option>
                                                            <option value="Average">Average</option>
                                                            <option value="Athletic">Athletic</option>
                                                            <option value="Muscular">Muscular</option>
                                                            <option value="Curvy">Curvy</option>
                                                            <option value="Plus-size">Plus-size</option>
                                                        </select>
                                                    </div>

                                                    <!-- Hair Color -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Hair Color</label>
                                                        <select class="form-select">
                                                            <option value="">Select Hair Color</option>
                                                            <option value="Black">Black</option>
                                                            <option value="Brown">Brown</option>
                                                            <option value="Blonde">Blonde</option>
                                                            <option value="Red">Red</option>
                                                            <option value="Gray">Gray</option>
                                                            <option value="White">White</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>

                                                    <!-- Eye Color -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Eye Color</label>
                                                        <select class="form-select">
                                                            <option value="">Select Eye Color</option>
                                                            <option value="Black">Black</option>
                                                            <option value="Brown">Brown</option>
                                                            <option value="Blue">Blue</option>
                                                            <option value="Green">Green</option>
                                                            <option value="Hazel">Hazel</option>
                                                            <option value="Gray">Gray</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>




                                                    <!-- Save and Cancel Buttons -->
                                                    <div class="d-flex gap-2 mt-4">
                                                        <button type="submit"
                                                            class="btn btn-primary rounded px-4">Save</button>
                                                        <button type="button" class="btn btn-secondary rounded px-4"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row text-secondary small">
                                    <div class="col-md-4 mb-3">
                                        <p class="fw-semibold mb-1">Attributes:</p>
                                        <ul class="list-unstyled mb-0">
                                            <li>5'5" / 165 cm (Height)</li>
                                            <li>145 lbs / 66 kg (Weight)</li>
                                            <li>Muscular (Build)</li>
                                            <li>Black (Hair)</li>
                                            <li>Black (Eyes)</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <p class="fw-semibold mb-1">Playing Age:</p>
                                        <p class="mb-0">22-34 (Age Range)</p>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <p class="fw-semibold mb-1">Ethnicities:</p>
                                        <p class="mb-0">Asian</p>
                                    </div>
                                </div>
                            </section>
                            <br>
                            <!-- Websites/Social Media Section -->
                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary mb-0">Websites/Social Media</h2>

                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center p-0"
                                        data-bs-toggle="modal" data-bs-target="#editSocialMediaModal"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>


                                <!-- Clickable Section -->
                                <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#editSocialMediaModal">
                                    <p class="text-muted mb-1">Add any links to your websites or social media.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add site
                                        links</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editSocialMediaModal" tabindex="-1"
                                    aria-labelledby="editSocialMediaLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editSocialMediaLabel">
                                                    Websites/Social Media
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">
                                                    Enter the link URL for your personal website or social media pages.
                                                </p>

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Primary Links</label>

                                                    <!-- Instagram Input -->
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text bg-white">
                                                            <i class="fa fa-instagram text-danger"></i>
                                                        </span>
                                                        <input type="url" class="form-control"
                                                            placeholder="Instagram Link">
                                                    </div>

                                                    <!-- YouTube Input -->
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text bg-white">
                                                            <i class="fa fa-youtube text-danger"></i>
                                                        </span>
                                                        <input type="url" class="form-control"
                                                            placeholder="YouTube Link">
                                                    </div>

                                                    <!-- IMDB Input -->
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text bg-white">
                                                            IMDB
                                                        </span>
                                                        <input type="url" class="form-control"
                                                            placeholder="IMDB Link">
                                                    </div>

                                                    <!-- LinkedIn Input -->
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text bg-white">
                                                            <i class="fa fa-linkedin text-primary"></i>
                                                        </span>
                                                        <input type="url" class="form-control"
                                                            placeholder="LinkedIn Link">
                                                    </div>

                                                    <!-- Facebook Input -->
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text bg-white">
                                                            <i class="fa fa-facebook text-primary"></i>
                                                        </span>
                                                        <input type="url" class="form-control"
                                                            placeholder="Facebook Link">
                                                    </div>
                                                    <br>
                                                    <h2 class="fw-semibold fs-5"> Other Links</h2>


                                                    <p>Add links to other sites such as personal websites etc</p>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text bg-white">
                                                            Other Url
                                                        </span>
                                                        <input type="url" class="form-control"
                                                            placeholder="other url">
                                                    </div>




                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="submit" class="btn btn-primary rounded-2"
                                                        style="background-color: #566ae9;">Save</button>
                                                    <button type="button" class="btn btn-secondary rounded-2"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>

                            <style>
                                .btn-link:hover {
                                    text-decoration: underline;
                                }
                            </style>
                            <br>
                            <!-- Self-Recording Section -->
                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary mb-0">Self-Recording</h2>

                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center p-0"
                                        data-bs-toggle="modal" data-bs-target="#editselfrecordingModal"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <!-- Clickable Self-Recording Section -->
                                <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#editselfrecordingModal">
                                    <p class="text-muted mb-1">Describe Your Self-Recording Setup.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                                        Self-Recording</button>
                                </div>



                                <!-- Modal -->
                                <div class="modal fade" id="editselfrecordingModal" tabindex="-1"
                                    aria-labelledby="editselfrecordingLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editselfrecordingLabel">
                                                    Self-Recording</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">
                                                    We recommend having a quality camera, able to record in 1080p HD
                                                    resolution or higher, and good audio capturing.</p>

                                                <div class="mb-3">
                                                    <label for="selfrecording" class="form-label fw-bold">Describe
                                                        self-recording setup</label>
                                                    <!-- Increased rows and custom CSS for height -->
                                                    <textarea class="form-control" id="selfrecording" rows="12" style="height: 250px;"
                                                        placeholder="EG: I use a Shure SM7B microphone and Adobe Audition as my editing software. I have a pop-filter and have sound-proofed my home studio. I offer directed sessions through Source-Connect and audio/video conferencing."></textarea>
                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="submit"
                                                        class="btn btn-primary rounded-pill px-4">Save</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </section>




                        </div>



                    </div>



                </div>

            </div>
        </div>
    </div>
    </div>

@endsection
