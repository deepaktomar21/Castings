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

                            {{-- headshot  --}}
                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">Headshot</h2>

                                    <!-- Edit Button (Only visible after successful save) -->
                                    <button type="button"
                                        class="btn btn-link p-0 text-decoration-none d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#editHeadshotModal"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%; display: none;"
                                        id="editButton">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <!-- Image Layout -->
                                <div class="d-flex justify-content-between">
                                    <!-- Left Column: Large Image (Clickable) -->
                                    <div class="col-md-7 mb-3">
                                        <div class="card position-relative" onclick="openMediaPicker('large')"
                                            style="cursor: pointer; height: 300px; object-fit: cover; background-color: #f7f7f7;">
                                            <div class="card-body text-center">
                                                <button class="btn btn-link text-danger p-0" data-bs-toggle="modal"
                                                    data-bs-target="#editImageModal" style="font-size: 20px; display: none;"
                                                    id="deleteLargeImageBtn">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </div>
                                            <!-- Media Icon to Change Image -->
                                            <div class="position-absolute top-50 start-50 translate-middle">
                                                <i class="fa fa-camera fa-2x text-white"
                                                    style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 10px;"
                                                    onclick="openMediaPicker('large')"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column: 4 Smaller Images (Clickable) -->
                                    <div class="col-md-4 mb-3">
                                        <div class="row row-cols-2 g-3">
                                            <!-- Image 1 -->
                                            <div class="col">
                                                <div class="card position-relative" onclick="openMediaPicker('image1')"
                                                    style="cursor: pointer; height: 150px; object-fit: cover; background-color: #f7f7f7;">
                                                    <div class="card-body text-center">
                                                        <button class="btn btn-link text-danger p-0" data-bs-toggle="modal"
                                                            data-bs-target="#editImageModal"
                                                            style="font-size: 20px; display: none;" id="deleteImage1Btn">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                    <!-- Media Icon to Change Image -->
                                                    <div class="position-absolute top-50 start-50 translate-middle">
                                                        <i class="fa fa-camera fa-2x text-white"
                                                            style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 10px;"
                                                            onclick="openMediaPicker('image1')"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Image 2 -->
                                            <div class="col">
                                                <div class="card position-relative" onclick="openMediaPicker('image2')"
                                                    style="cursor: pointer; height: 150px; object-fit: cover; background-color: #f7f7f7;">
                                                    <div class="card-body text-center">
                                                        <button class="btn btn-link text-danger p-0" data-bs-toggle="modal"
                                                            data-bs-target="#editImageModal"
                                                            style="font-size: 20px; display: none;" id="deleteImage2Btn">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                    <!-- Media Icon to Change Image -->
                                                    <div class="position-absolute top-50 start-50 translate-middle">
                                                        <i class="fa fa-camera fa-2x text-white"
                                                            style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 10px;"
                                                            onclick="openMediaPicker('image2')"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Image 3 -->
                                            <div class="col">
                                                <div class="card position-relative" onclick="openMediaPicker('image3')"
                                                    style="cursor: pointer; height: 150px; object-fit: cover; background-color: #f7f7f7;">
                                                    <div class="card-body text-center">
                                                        <button class="btn btn-link text-danger p-0" data-bs-toggle="modal"
                                                            data-bs-target="#editImageModal"
                                                            style="font-size: 20px; display: none;" id="deleteImage3Btn">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                    <!-- Media Icon to Change Image -->
                                                    <div class="position-absolute top-50 start-50 translate-middle">
                                                        <i class="fa fa-camera fa-2x text-white"
                                                            style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 10px;"
                                                            onclick="openMediaPicker('image3')"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Image 4 -->
                                            <div class="col">
                                                <div class="card position-relative" onclick="openMediaPicker('image4')"
                                                    style="cursor: pointer; height: 150px; object-fit: cover; background-color: #f7f7f7;">
                                                    <div class="card-body text-center">
                                                        <button class="btn btn-link text-danger p-0"
                                                            data-bs-toggle="modal" data-bs-target="#editImageModal"
                                                            style="font-size: 20px; display: none;" id="deleteImage4Btn">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                    <!-- Media Icon to Change Image -->
                                                    <div class="position-absolute top-50 start-50 translate-middle">
                                                        <i class="fa fa-camera fa-2x text-white"
                                                            style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 10px;"
                                                            onclick="openMediaPicker('image4')"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button to Add New Image -->
                                <button class="btn btn-primary mt-3" data-bs-toggle="modal"
                                    data-bs-target="#addImageModal">+ Add Image</button>

                                <!-- Modal to Edit Headshot -->
                                <div class="modal fade" id="editHeadshotModal" tabindex="-1"
                                    aria-labelledby="editHeadshotModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editHeadshotModalLabel">Edit
                                                    Headshot</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">Upload or edit your profile headshot here.</p>
                                                <div class="mb-3">
                                                    <label for="headshotUpload" class="form-label fw-bold">Choose
                                                        Headshot</label>
                                                    <input type="file" class="form-control" id="headshotUpload">
                                                </div>
                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="submit" class="btn btn-primary rounded-pill px-4"
                                                        onclick="updateHeadshot()">Upload</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal to Add New Image -->
                                <div class="modal fade" id="addImageModal" tabindex="-1"
                                    aria-labelledby="addImageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="addImageModalLabel">Add New Image
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">Upload a new image to your profile gallery.</p>
                                                <div class="mb-3">
                                                    <label for="imageUpload" class="form-label fw-bold">Choose an
                                                        Image</label>
                                                    <input type="file" class="form-control" id="imageUpload">
                                                </div>
                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="submit" class="btn btn-primary rounded-pill px-4"
                                                        onclick="updateImage()">Upload</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <script>
                                function openMediaPicker(imageId) {
                                    // Trigger file input dialog based on the clicked image
                                    const mediaInput = document.createElement('input');
                                    mediaInput.type = 'file';
                                    mediaInput.accept = 'image/*';
                                    mediaInput.onchange = function(event) {
                                        // Handle image file selection
                                        const file = event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                document.getElementById(imageId).src = e.target.result;
                                                showEditButton();
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    };
                                    mediaInput.click();
                                }

                                function showEditButton() {
                                    document.getElementById('editButton').style.display = 'block';
                                }

                                function updateHeadshot() {
                                    // Add logic to update headshot (e.g., upload to server)
                                    alert("Headshot uploaded successfully!");
                                }

                                function updateImage() {
                                    // Add logic to update the image (e.g., upload to server)
                                    alert("Image uploaded successfully!");
                                }
                            </script>
                            {{-- personal --}}
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-start bg-light p-4 border-bottom">
                                <!-- Left Side -->
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <h1 class="h2 fw-bold text-dark mb-0">{{ $profile->name }}
                                            {{ $profile->last_name }}
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
                                        <button type="button"
                                            class="btn btn-primary btn-sm ms-2 rounded-circle shadow-sm"
                                            onclick="window.location='{{ route('profile.edit', $profile->id) }}'">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                </div>

                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="basicInfoModal" tabindex="-1"
                                aria-labelledby="basicInfoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content rounded-4 shadow">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title fw-bold" id="basicInfoModalLabel">Basic Talent Info
                                            </h5>
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



                            <!-- Representation Section -->
                            <section class="bg-white rounded-4 shadow-sm p-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">Representation</h2>

                                    <button type="button"
                                        class="btn btn-link text-primary text-decoration-none p-0 d-flex align-items-center justify-content-center gap-1"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%;"
                                        data-bs-toggle="modal" data-bs-target="#representationModal">
                                        <i class="fa fa-plus text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <div class="p-3 rounded-3 mb-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#representationModal">
                                    <p class="text-muted mb-1">Represented? Add your agent or manager details.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                                        Representation</button>
                                </div>


                                <!-- Representation Modal -->
                                <div class="modal fade" id="representationModal" tabindex="-1"
                                    aria-labelledby="representationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
                                        <!-- Changed here -->
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="representationModalLabel">Add
                                                    Representation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">

                                                <form>
                                                    <!-- Representation Type -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold d-block mb-2">Representation Type
                                                            *</label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="representation_type" id="agent" value="Agent"
                                                                required>
                                                            <label class="form-check-label" for="agent">Agent</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="representation_type" id="manager" value="Manager"
                                                                required>
                                                            <label class="form-check-label" for="manager">Manager</label>
                                                        </div>
                                                    </div>

                                                    <!-- Name -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Name *</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Enter Name" required
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <!-- Company Name -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Company Name</label>
                                                        <input type="text" class="form-control" name="company_name"
                                                            placeholder="Enter Company Name"
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <div class="row">
                                                        <!-- Phone Number -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Phone Number</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">+91</span>
                                                                <input type="text" class="form-control"
                                                                    name="phone_number" placeholder="Phone Number"
                                                                    style="background-color: #f8f9fa;">
                                                            </div>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Email *</label>
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Enter Email" required
                                                                style="background-color: #f8f9fa;">
                                                        </div>
                                                    </div>

                                                    <!-- Website -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Website</label>
                                                        <input type="url" class="form-control" name="website"
                                                            placeholder="Enter Website URL"
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <!-- Address 1 -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Address Line 1</label>
                                                        <input type="text" class="form-control" name="address1"
                                                            placeholder="Enter Address Line 1"
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <!-- Address 2 -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Address Line 2</label>
                                                        <input type="text" class="form-control" name="address2"
                                                            placeholder="Enter Address Line 2"
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <div class="row">
                                                        <!-- City -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">City</label>
                                                            <input type="text" class="form-control" name="city"
                                                                placeholder="Enter City"
                                                                style="background-color: #f8f9fa;">
                                                        </div>

                                                        <!-- State -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">State</label>
                                                            <select class="form-select" name="state">
                                                                <option value="">Select State</option>
                                                                <option value="New York">New York</option>
                                                                <option value="California">California</option>
                                                                <option value="Texas">Texas</option>
                                                                <option value="Florida">Florida</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <!-- Zip -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Zip Code</label>
                                                            <input type="text" class="form-control" name="zip"
                                                                placeholder="Enter Zip Code"
                                                                style="background-color: #f8f9fa;">
                                                        </div>

                                                        <!-- Country -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Country</label>
                                                            <select class="form-select" name="country">
                                                                <option value="United States" selected>United States
                                                                </option>
                                                                <option value="India">India</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                            </select>
                                                        </div>
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



                            </section>



                            <br>
                            <!-- Credits & Experience Modal -->
                            <section class="bg-white rounded-4 shadow-sm p-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">Credits & Experience</h2>

                                    <button type="button"
                                        class="btn btn-link text-primary text-decoration-none p-0 d-flex align-items-center justify-content-center gap-1"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%;"
                                        data-bs-toggle="modal" data-bs-target="#creditsExperienceModal">
                                        <i class="fa fa-plus text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <div class="p-3 rounded-3 mb-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#creditsExperienceModal">
                                    <p class="text-muted mb-1">You haven't added any credits or work experience.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                                        Credits</button>
                                </div>

                                <!-- Credits & Experience Modal -->
                                <div class="modal fade" id="creditsExperienceModal" tabindex="-1"
                                    aria-labelledby="creditsExperienceModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="creditsExperienceModalLabel">Add
                                                    Credits & Experience</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <form>
                                                    <!-- Production Type -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Production Type *</label>
                                                        <select class="form-select" name="production_type" required>
                                                            <option value="">Select Production Type</option>
                                                            <option value="Film">Film</option>
                                                            <option value="TV">TV</option>
                                                            <option value="Theatre">Theatre</option>
                                                            <option value="Commercial">Commercial</option>
                                                            <option value="Voiceover">Voiceover</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>

                                                    <!-- Project Name -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Project Name *</label>
                                                        <input type="text" class="form-control" name="project_name"
                                                            placeholder="Enter Project Name" required
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <!-- Role -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Role *</label>
                                                        <input type="text" class="form-control" name="role"
                                                            placeholder="Enter Your Role" required
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <!-- Director/Production Company -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Director/Production
                                                            Company</label>
                                                        <input type="text" class="form-control"
                                                            name="director_production"
                                                            placeholder="e.g. John Doe, Director"
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <!-- Location -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Location (if on-site)</label>
                                                        <input type="text" class="form-control" name="location"
                                                            placeholder="Enter Location"
                                                            style="background-color: #f8f9fa;">
                                                    </div>

                                                    <div class="row">
                                                        <!-- Month -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Month</label>
                                                            <select class="form-select" name="month">
                                                                <option value="">Select Month</option>
                                                                <option value="January">January</option>
                                                                <option value="February">February</option>
                                                                <option value="March">March</option>
                                                                <option value="April">April</option>
                                                                <option value="May">May</option>
                                                                <option value="June">June</option>
                                                                <option value="July">July</option>
                                                                <option value="August">August</option>
                                                                <option value="September">September</option>
                                                                <option value="October">October</option>
                                                                <option value="November">November</option>
                                                                <option value="December">December</option>
                                                            </select>
                                                        </div>

                                                        <!-- Year -->
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label fw-bold">Year *</label>
                                                            <input type="number" class="form-control" name="year"
                                                                placeholder="Enter Year" required
                                                                style="background-color: #f8f9fa;" min="1900"
                                                                max="2100">
                                                        </div>
                                                    </div>

                                                    <!-- Production or Company Website -->
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Production or Company
                                                            Website</label>
                                                        <input type="url" class="form-control" name="website"
                                                            placeholder="Enter Website URL"
                                                            style="background-color: #f8f9fa;">
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
                            </section>
                            <br>
                            {{-- skills section --}}
                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">Skills</h2>

                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-link p-0 text-decoration-none d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#editSkillsModal"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%;">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <!-- Skills Section -->
                                <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#editSkillsModal">
                                    <p class="text-muted mb-1">You haven’t added any skills yet :(</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                                        skills</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editSkillsModal" tabindex="-1"
                                    aria-labelledby="editSkillsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editSkillsModalLabel">Add Skills
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">Search for a skill to add:</p>

                                                <div class="mb-3">
                                                    <label for="skillInput" class="form-label fw-bold">Skills</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" id="skillInput"
                                                            placeholder="Search for a skill to add" />
                                                        <button type="button" class="btn btn-primary ms-2"
                                                            id="addSkillButton">Add</button>
                                                    </div>
                                                </div>

                                                <!-- Skills Display Inside Modal -->
                                                <div class="p-3 rounded-3 mt-3" id="skillsList"
                                                    style="background-color: #f1f1f1;">
                                                    <!-- Dynamically added skills will appear here -->
                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="button" class="btn btn-primary rounded-pill px-4"
                                                        id="saveSkillsButton">Save Skills</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <script>
                                // Array to store the skills
                                let skills = [];

                                // Function to add skills to the list inside the modal
                                document.getElementById('addSkillButton').addEventListener('click', function() {
                                    const skillInput = document.getElementById('skillInput');
                                    const skillValue = skillInput.value.trim();

                                    if (skillValue) {
                                        // Add the skill to the skills array
                                        skills.push(skillValue);

                                        // Update the skills list in the modal
                                        const skillsList = document.getElementById('skillsList');
                                        const skillDiv = document.createElement('div');
                                        skillDiv.classList.add('badge', 'bg-primary', 'text-white', 'mr-2', 'mb-2');
                                        skillDiv.textContent = skillValue;
                                        skillsList.appendChild(skillDiv);

                                        // Clear the input after adding
                                        skillInput.value = '';
                                    }
                                });

                                // Function to save the skills (you can implement the storage logic here)
                                document.getElementById('saveSkillsButton').addEventListener('click', function() {
                                    // Here you can send the `skills` array to the server via an AJAX request, for example
                                    console.log('Skills to save:', skills);

                                    // For now, you can close the modal after saving
                                    alert('Skills saved successfully!');
                                    // Close the modal
                                    var myModal = new bootstrap.Modal(document.getElementById('editSkillsModal'));
                                    myModal.hide();
                                });
                            </script>


                            <br>
                            <!-- Education Section -->
                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary">Education & Training</h2>

                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-link p-0 text-decoration-none d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#editEducationModal"
                                        style="width: 40px; height: 40px; background-color: #007bff; border-radius: 50%;">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <!-- Education Section -->
                                <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#editEducationModal">
                                    <p class="text-muted mb-1">You haven't added any education or training.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add education
                                        & training</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editEducationModal" tabindex="-1"
                                    aria-labelledby="editEducationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editEducationModalLabel">Add
                                                    Education or Training</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">Fill in the details of your education or
                                                    training:</p>

                                                <div class="mb-3">
                                                    <label for="school"
                                                        class="form-label fw-bold">School/Institution</label>
                                                    <input type="text" class="form-control" id="school"
                                                        placeholder="Enter school name" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="degree" class="form-label fw-bold">Degree/Course</label>
                                                    <input type="text" class="form-control" id="degree"
                                                        placeholder="Enter degree or course name" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="instructor" class="form-label fw-bold">Instructor</label>
                                                    <input type="text" class="form-control" id="instructor"
                                                        placeholder="Enter instructor's name" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="location" class="form-label fw-bold">Location (if
                                                        on-site)</label>
                                                    <input type="text" class="form-control" id="location"
                                                        placeholder="Enter location (optional)" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="yearComplete" class="form-label fw-bold">Year
                                                        Completed</label>
                                                    <input type="number" class="form-control" id="yearComplete"
                                                        placeholder="Enter year of completion" />
                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex gap-2 mt-4">
                                                    <button type="button"
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
                            <br>
                            <div class="row">
                                {{-- resume / document --}}
                                <section class="bg-white rounded-4 shadow-sm p-4 col-6">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="fw-semibold fs-5 text-secondary">Add Documents</h2>
                                    </div>

                                    <!-- Clickable Div to Add Documents -->
                                    <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#editDocumentsModal">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <i class="fa fa-file-text-o text-primary" style="font-size: 40px;"></i>
                                        </div>

                                        <button
                                            class="btn btn-link text-primary p-0 mt-2 text-decoration-none d-block mx-auto">+
                                            Add documents</button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editDocumentsModal" tabindex="-1"
                                        aria-labelledby="editDocumentsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header border-0">
                                                    <!-- Document Name (Header) -->
                                                    <h5 class="modal-title fw-semibold" id="editDocumentsModalLabel">Add
                                                        Documents</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body pt-0">
                                                    <p class="text-muted mb-4">You can add documents here:</p>

                                                    <!-- Documents List -->
                                                    <div class="mb-3">
                                                        <!-- Header -->
                                                        <label for="docs" class="form-label fw-bold">Docs (0)</label>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <input type="checkbox" id="selectAllDocs"
                                                                    onclick="toggleSelectAll()" />
                                                                <label for="selectAllDocs" class="ms-2">Select
                                                                    All</label>
                                                            </div>
                                                            <input type="text" id="searchDocs" class="form-control"
                                                                placeholder="Search for documents"
                                                                style="width: 200px;" />
                                                        </div>
                                                    </div>

                                                    <!-- Document List (currently empty) -->
                                                    <div id="documentList" class="mb-3">
                                                        <!-- No documents to display -->
                                                    </div>

                                                    <!-- Selected Files Display (Will show selected files) -->
                                                    <div id="selectedFilesList" class="mt-3">
                                                        <!-- Display selected file names here -->
                                                    </div>

                                                </div>

                                                <!-- Footer with Upload New centered -->
                                                <div class="modal-footer justify-content-center">
                                                    <!-- File Upload Button to Open File Picker -->
                                                    <button type="button" class="btn btn-outline-primary"
                                                        onclick="triggerFileInput()">Upload New</button>
                                                    <!-- Hidden File Input -->
                                                    <input type="file" class="d-none" id="uploadNew" multiple
                                                        onchange="handleFileSelect(event)" />
                                                </div>

                                                <!-- Modal Action Buttons -->
                                                <div class="d-flex gap-2 mt-4 justify-content-center">
                                                    <button type="button" class="btn btn-primary rounded-pill px-4"
                                                        onclick="addSelectedDocuments()">Add Selected Documents</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <script>
                                    // Function to toggle the select all checkbox
                                    function toggleSelectAll() {
                                        const selectAllCheckbox = document.getElementById('selectAllDocs');
                                        const checkboxes = document.querySelectorAll('.doc-checkbox');
                                        checkboxes.forEach(checkbox => {
                                            checkbox.checked = selectAllCheckbox.checked;
                                        });
                                    }

                                    // Function to handle file selection when 'Upload New' is clicked
                                    function triggerFileInput() {
                                        const fileInput = document.getElementById('uploadNew');
                                        fileInput.click(); // Triggers the hidden file input
                                    }

                                    // Function to handle file input change (display selected files)
                                    function handleFileSelect(event) {
                                        const files = event.target.files;
                                        const selectedFilesList = document.getElementById('selectedFilesList');
                                        selectedFilesList.innerHTML = ''; // Clear existing list

                                        if (files.length > 0) {
                                            Array.from(files).forEach(file => {
                                                const fileName = document.createElement('p');
                                                fileName.textContent = file.name;
                                                selectedFilesList.appendChild(fileName);
                                            });
                                        }
                                    }

                                    // Function to add selected documents (For demonstration purposes)
                                    function addSelectedDocuments() {
                                        const selectedDocuments = [];
                                        const checkboxes = document.querySelectorAll('.doc-checkbox:checked');
                                        checkboxes.forEach(checkbox => {
                                            selectedDocuments.push(checkbox.closest('.d-flex').querySelector('label').textContent);
                                        });

                                        if (selectedDocuments.length > 0) {
                                            alert("Selected Documents: " + selectedDocuments.join(', '));
                                        } else {
                                            alert("No documents selected!");
                                        }
                                    }
                                </script>
                                {{-- licenced --}}
                                <section class="bg-white rounded-4 shadow-sm p-4 col-6">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="fw-semibold fs-5 text-secondary">License & Passport</h2>

                                        <!-- Edit Button -->
                                        <button type="button"
                                            class="btn btn-primary d-flex align-items-center justify-content-center p-0"
                                            data-bs-toggle="modal" data-bs-target="#editLicensePassportModal"
                                            style="width: 40px; height: 40px; border-radius: 50%; padding: 0;">
                                            <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                        </button>
                                    </div>


                                    <!-- Clickable Div to Add License & Passport -->
                                    <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#editLicensePassportModal">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <i class="fa fa-id-card text-primary" style="font-size: 40px;"></i>
                                        </div>

                                        <button
                                            class="btn btn-link text-primary p-0 mt-2 text-decoration-none d-block mx-auto">
                                            + Add your license and passport status
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editLicensePassportModal" tabindex="-1"
                                        aria-labelledby="editLicensePassportModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4">
                                                <div class="modal-header border-0">
                                                    <!-- Modal Title -->
                                                    <h5 class="modal-title fw-semibold"
                                                        id="editLicensePassportModalLabel">License & Passport</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body pt-0">
                                                    <p class="text-muted mb-4">Let people know if you have a driver's
                                                        license or a passport. You can select the options below:</p>

                                                    <!-- License & Passport Options -->
                                                    <div class="mb-3">
                                                        <!-- Header -->
                                                        <label class="form-label fw-bold">Select your documents</label>

                                                        <div>
                                                            <input type="checkbox" id="driversLicense"
                                                                class="doc-checkbox" />
                                                            <label for="driversLicense" class="ms-2">I have a driver's
                                                                license</label>
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" id="passport"
                                                                class="doc-checkbox" />
                                                            <label for="passport" class="ms-2">I have a
                                                                passport</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Footer with Save and Cancel -->
                                                <div class="modal-footer justify-content-start">
                                                    <button type="button" class="btn btn-primary rounded-pill px-4"
                                                        onclick="saveLicensePassport()">Save</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <script>
                                    // Function to save selected documents
                                    function saveLicensePassport() {
                                        const driversLicense = document.getElementById('driversLicense').checked;
                                        const passport = document.getElementById('passport').checked;

                                        let selectedDocuments = [];

                                        if (driversLicense) {
                                            selectedDocuments.push("Driver's License");
                                        }

                                        if (passport) {
                                            selectedDocuments.push("Passport");
                                        }

                                        if (selectedDocuments.length > 0) {
                                            alert("Selected Documents: " + selectedDocuments.join(', '));
                                        } else {
                                            alert("No documents selected!");
                                        }
                                    }
                                </script>


                                <script>
                                    // Function to save selected documents
                                    function saveLicensePassport() {
                                        const driversLicense = document.getElementById('driversLicense').checked;
                                        const passport = document.getElementById('passport').checked;

                                        let selectedDocuments = [];

                                        if (driversLicense) {
                                            selectedDocuments.push("Driver's License");
                                        }

                                        if (passport) {
                                            selectedDocuments.push("Passport");
                                        }

                                        if (selectedDocuments.length > 0) {
                                            alert("Selected Documents: " + selectedDocuments.join(', '));
                                        } else {
                                            alert("No documents selected!");
                                        }
                                    }
                                </script>
                            </div>

                            <br>

                            {{-- highlights --}}
                            <!-- Highlights Section -->
                            <section class="bg-white rounded-4 shadow-sm p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-semibold fs-5 text-secondary mb-0">Highlights</h2>

                                    <!-- Edit Button -->
                                    <button type="button"
                                        class="btn btn-primary d-flex align-items-center justify-content-center p-0"
                                        data-bs-toggle="modal" data-bs-target="#editHighlightsModal"
                                        style="width: 40px; height: 40px; border-radius: 50%;">
                                        <i class="fa fa-pencil text-white" style="font-size: 18px;"></i>
                                    </button>
                                </div>

                                <!-- Clickable Highlights Section -->
                                <div class="p-3 rounded-3" style="background-color: #dcdbdb; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#editHighlightsModal">
                                    <p class="text-muted mb-1">Share career highlights, achievements, or testimonials from
                                        people in your network.</p>
                                    <button class="btn btn-link text-primary p-0 mt-2 text-decoration-none">+ Add
                                        highlights</button>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editHighlightsModal" tabindex="-1"
                                    aria-labelledby="editHighlightsLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold" id="editHighlightsLabel">Career
                                                    Highlights</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body pt-0">
                                                <p class="text-muted mb-4">Share career highlights, achievements, or
                                                    testimonials from people in your network.</p>

                                                <!-- Textarea for Career Highlights -->
                                                <div class="mb-3">
                                                    <label for="highlights" class="form-label fw-bold">Post something
                                                        about yourself</label>
                                                    <textarea class="form-control" id="highlights" rows="6" style="height: 150px;"
                                                        placeholder="Share a significant achievement or testimonial."></textarea>
                                                </div>

                                                <!-- Optional Date Checkbox -->
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="dontShowDate">
                                                    <label class="form-check-label" for="dontShowDate">Don't show the
                                                        date for this post</label>
                                                </div>

                                                <!-- Footer with Save and Cancel -->
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
