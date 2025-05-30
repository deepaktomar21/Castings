@extends('website.layouts.app')

@section('title', 'Find Perfect Talent')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <br>
    <h1 class="text-center">Find Local Actors & Talent for Hire</h1>

    <form action="{{ route('findtalentfilter') }}" method="GET" class="popover-filter-panel mb-4 mt-5">
        <div class="row g-3">
            <!-- Gender -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                    <select class="form-select" name="gender">
                        <option selected disabled>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="transgender">Transgender</option>
                        <option value="Other">Other</option>

                    </select>
                </div>
            </div>

            <!-- Age Range -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    <input type="number" class="form-control" name="age_min" placeholder="Min Age" min="10"
                        max="100">
                    <input type="number" class="form-control" name="age_max" placeholder="Max Age" min="10"
                        max="100">
                </div>
            </div>

            <!-- Location (Searchable Dropdown from Cities Table) -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                    <select class="form-select select2" name="location" id="location">
                        <option selected disabled>Select Location</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- jQuery (Required for Select2) -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!-- Select2 CSS & JS -->
            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

            <!-- Initialize Select2 -->
            <script>
                $(document).ready(function() {
                    $('#location').select2({
                        placeholder: "Search for a city",
                        allowClear: true,

                    });
                });
            </script>


            <!-- professional_title -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lightbulb"></i></span>
                    <input type="text" class="form-control" name="professional_title" placeholder="professional_title">
                </div>
            </div>


            <!-- Skills -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lightbulb"></i></span>
                    <input type="text" class="form-control" name="skills" placeholder="Skills">
                </div>
            </div>



            <!-- Search Button -->
            <div class="col-md-4">
                <button type="submit" class="btn btn-dark w-100">Search</button>
            </div>
        </div>
    </form>


    <div class="container">
        <h2 class="mb-4">Search Results</h2>

        <!-- Items Per Page -->
        <div class="d-flex justify-content-end align-items-center mb-3">
            <div>
                <label for="per_page" class="fw-bold me-2">Show:</label>
                <select id="per_page" class="form-select d-inline-block w-auto">
                    <option value="18">18</option>
                    <option value="36">36</option>
                    <option value="54">54</option>
                </select>
            </div>
        </div>

        <!-- Talent Grid -->
        @if ($talents->isEmpty())
            <p class="text-center">No talents found matching your criteria.</p>
        @else
            <div class="row g-4" id="talent-results">
                @foreach ($talents as $talent)
                    <div class="col-md-3">
                        <a href="{{ route('talent.show', $talent->name) }}" class="text-decoration-none">
                            <div class="card shadow-sm">
                                <div class="card-body d-flex align-items-center">

                                    <!-- Talent Image -->
                                    <div class="flex-shrink-0 me-3">
                                        @if (is_array($talent->photos) && count($talent->photos) > 0)
                                            <div id="talentCarousel{{ $talent->id }}" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <!-- Carousel Indicators (Dots) -->
                                                <div class="carousel-indicators">
                                                    @foreach ($talent->photos as $index => $photo)
                                                        <button type="button"
                                                            data-bs-target="#talentCarousel{{ $talent->id }}"
                                                            data-bs-slide-to="{{ $index }}"
                                                            class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"
                                                            aria-label="Slide {{ $index + 1 }}"></button>
                                                    @endforeach
                                                </div>

                                                <!-- Carousel Inner (Images) -->
                                                <div class="carousel-inner">
                                                    @foreach ($talent->photos as $index => $photo)
                                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                            <img src="{{ asset($photo) }}" class="d-block w-100 rounded"
                                                                style="height: 120px; object-fit: cover;"
                                                                alt="Talent Image {{ $index + 1 }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('website/img/images (1).jpg') }}" class="rounded"
                                                style="width: 120px; height: 120px; object-fit: cover;"
                                                alt="Default Image">
                                        @endif
                                    </div>


                                </div>
                                <div class="card-body">

                                    <div class="flex-grow-1">
                                        <h5 class="card-title">Full Name: {{ $talent->name }} {{ $talent->last_name }}
                                        </h5>
                                        <p class="card-text">Professional Title:
                                            {{ $talent->professional_title ?? 'N/A' }}</p>
                                        <p class="card-text">Location: {{ $talent->city->name }}</p>
                                        <p class="card-text">Gender: {{ $talent->gender ?? 'N/A' }}</p>
                                        <p class="card-text">Age:
                                            {{ $talent->min_age ?? 'N/A' }}-{{ $talent->max_age ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Card Footer (View More) -->
                                <div class="card-footer text-center">
                                    <a class="text-primary fw-bold" data-bs-toggle="collapse"
                                        href="#contact-{{ $talent->id }}" role="button">
                                        View More
                                    </a>

                                    <!-- Collapsible Contact Options -->
                                    <div class="collapse text-center mt-2" id="contact-{{ $talent->id }}">
                                        <a href="tel:{{ $talent->contact }}" class="btn btn-primary w-100 mb-2">
                                            <i class="fa fa-phone"></i> Contact
                                        </a>
                                        <a href="mailto:{{ $talent->email }}" class="btn btn-outline-primary w-100">
                                            <i class="fa fa-envelope"></i> Message
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <style>
                /* Remove blue color and underline on hover */
                .card-link {
                    text-decoration: none;
                    color: inherit;
                    /* Inherit color from the parent (black in this case) */
                }

                .card-link:hover {
                    color: inherit;
                    /* Maintain black color on hover */
                    text-decoration: none;
                    /* Ensure no underline on hover */
                }
            </style>
            <!-- AJAX Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <p class="mb-0">
                    Showing <strong>{{ $talents->firstItem() }}</strong> to <strong>{{ $talents->lastItem() }}</strong>
                    of <strong>{{ $talents->total() }}</strong> talents
                </p>
                <nav id="pagination-links">
                    <ul class="pagination">
                        <li class="page-item {{ $talents->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $talents->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Prev</span>
                            </a>
                        </li>

                        @for ($page = 1; $page <= $talents->lastPage(); $page++)
                            <li class="page-item {{ $talents->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ $talents->url($page) }}">{{ $page }}</a>
                            </li>
                        @endfor

                        <li class="page-item {{ $talents->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $talents->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


        @endif
    </div>

    <!-- AJAX Script for Pagination & Items Per Page -->
    <script>
        $(document).ready(function() {
            function fetchData(page = 1) {
                let perPage = $('#per_page').val();

                $.ajax({
                    url: `?page=${page}&per_page=${perPage}`,
                    success: function(response) {
                        $('#talent-results').html($(response).find('#talent-results').html());
                        $('#pagination-links').html($(response).find('#pagination-links').html());
                    }
                });
            }

            // AJAX Pagination
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetchData(page);
            });

            // Per Page Change
            $('#per_page').change(function() {
                fetchData();
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                let formData = $(this).serialize(); // Get form data

                $.ajax({
                    url: "{{ route('findtalentfilter') }}", // Ensure this matches your route
                    type: "GET",
                    data: formData,
                    beforeSend: function() {
                        $('#talent-results').html('<p>Loading...</p>'); // Show loader
                    },
                    success: function(response) {
                        $('#talent-results').html(response.html); // Inject updated content
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
