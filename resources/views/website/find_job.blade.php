@extends('website.layouts.app')

@section('title', 'Find Perfect Job')

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
    <h1 class="text-center">Find Perfect Job & Get Hired</h1>
  
    <form action="{{ route('findjobfilter') }}" method="GET" id="jobFilterForm" data-url="{{ route('findjobfilter') }}">

        @csrf
        <div class="row g-3">
            
            <!-- Filter Checkboxes -->
            <div class="filter-container">
                <label class="filter-btn">
                   
                    <input type="checkbox" class="filter-checkbox" name="talent_types[]" value="all"> 

                    <span>All Jobs</span>
                </label>
                <label class="filter-btn">
                    <input type="checkbox" class="filter-checkbox" name="talent_types[]" value="actors"> 
                    <span>Actors</span>
                </label>
                <label class="filter-btn">
                    <input type="checkbox" class="filter-checkbox" name="talent_types[]" value="voiceover"> 
                    <span>Voiceover</span>
                </label>
                <label class="filter-btn">
                    <input type="checkbox" class="filter-checkbox" name="talent_types[]" value="crew"> 
                    
                    <span>Crew</span>
                </label>
                <label class="filter-btn">
                    <input type="checkbox" class="filter-checkbox" name="talent_types[]" value="modeling"> 

                    <span>Modeling</span>
                </label>
                <label class="filter-btn">
                    <input type="checkbox" class="filter-checkbox" name="talent_types[]" value="content"> 

                    <span>Content Creating</span>
                </label>
            </div>
    
            <!-- Location Filter (Searchable Select2 Dropdown) -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                    <select class="form-select select2" name="location" id="location">
                        <option value="">Select Location</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <!-- Search Button -->
            <div class="col-md-4">
                <button type="submit" class="btn btn-dark w-100">Search</button>
            </div>
        </div>
    </form>
    
    <!-- jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $(".select2").select2(); // Initialize Select2 dropdown
    
            // Handle Talent Type Checkbox Selection
            $(".filter-checkbox").on("change", function () {
                let selectedValues = $(".filter-checkbox:checked").map(function () {
                    return $(this).val();
                }).get().join(","); // Convert selected checkboxes to a comma-separated string
    
                $("#selectedTalentType").val(selectedValues); // Set hidden input value
            });
    
            // AJAX Form Submission
            $('#jobFilterForm').on('submit', function (e) {
                e.preventDefault(); // Prevent page reload
    
                let formData = $(this).serialize(); // Serialize form data
                let formUrl = $(this).attr('data-url'); // Get route from `data-url` attribute
    
                $.ajax({
                    url: formUrl, // Use dynamically set route
                    type: "GET",
                    data: formData,
                    beforeSend: function () {
                        $('#job-results').html('<p>Loading...</p>'); // Show loader
                    },
                    success: function (response) {
                        $('#job-results').html(response.html); // Inject updated job results
                    },
                    error: function (xhr) {
                        console.error("Error:", xhr.responseText);
                    }
                });
            });
        });
    </script>
    
    {{-- <script>
        $(document).ready(function () {
    $(".select2").select2(); // Initialize Select2

    $(".filter-checkbox").on("change", function () {
        let selectedValues = $(".filter-checkbox:checked").map(function () {
            return $(this).val();
        }).get().join(","); // Get checked values as comma-separated string

        $("#selectedTalentType").val(selectedValues); // Set hidden input value

        console.log("Selected Talent Types:", selectedValues); // Debugging
    });
});
    </script> --}}
    
    <style>
        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
    
        .filter-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
    
        .filter-btn input[type="checkbox"] {
            display: none; /* Hide checkbox */
        }
    
        .filter-btn span {
            font-size: 14px;
        }
    
        .filter-btn input[type="checkbox"]:checked + span {
            font-weight: bold;
            color: white;
            background-color: black;
            padding: 5px;
            border-radius: 3px;
        }
    </style>
    






<section id="list" class="p_3 bg-light">
	<div class="container-xl">
		<div class="row list_1">
			<div class="col-md-4">
				<div class="list_1l bg-white p-4">
					<div class="list_1l1">
						<div class="input-group border_1 p-2">
							<span class="input-group-btn">
								<button class="btn btn-primary bg-transparent rounded-0 fs-5 border-0 col_blue"
									type="button">
									<i class="fa fa-search"></i> </button>
							</span>
							<input type="text" class="form-control border-0" placeholder="Job Title or Company">
						</div>
						<div class="input-group border_1 p-2 mt-3">
							<span class="input-group-btn">
								<button class="btn btn-primary bg-transparent rounded-0 fs-5 border-0 col_blue"
									type="button">
									<i class="fa fa-map-marker"></i> </button>
							</span>
							<input type="text" class="form-control border-0" placeholder="City, State, or Pin Code">
						</div>
						<p class="mt-3">Radius around selected location</p>
						<h5 class="mt-4">Project type</h5>
						<hr>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Past 24 hours</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Past Week</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Past Month</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Any time</label>
						</div>
						<h5 class="mt-4">Locations</h5>
						<hr>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">New York, NZ
								(133)</label>
						</div>
						
						<h5 class="mt-4">Type of Role</h5>
						<hr>
						
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Civil Engineering
								<span>(1490)</span></label>
						</div>
						<h5 class="mt-4">Top Companies</h5>
						<hr>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Google <span>(32470)</span></label>
						</div>
						
						<h5 class="mt-4">Experience</h5>
						<hr>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Fresher</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Less than 1 year</label>
						</div>
						
						<h5 class="mt-4">Job Type</h5>
						<hr>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Full Time</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Part-Time</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Freelance</label>
						</div>
						<div class="form-check mt-3">
							<input type="checkbox" class="form-check-input" id="customCheck1">
							<label class="form-check-label" for="customCheck1">Temporary</label>
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-8">
				<div class="list_1r">
					<div class="list_1ri row">
						<div class="col-md-9">
							<div class="list_1ril">
								<h6><a href="">Home</a> <span class="mx-1">/</span>
									<a href=""></a> <span class="mx-1">/</span>
									
								</h6>
								<h5 class="col_blue mb-0"></h5>
							</div>
						</div>
						<div class="col-md-3">
							<div class="list_1rir text-end">
                               
                                    <label for="per_page" class="fw-bold me-2">Show:</label>
                                    <select id="per_page" class="form-select d-inline-block w-auto">
                                        <option value="18">18</option>
                                        <option value="36">36</option>
                                        <option value="54">54</option>
                                    </select>
                              
							</div>
						</div>
					</div>
                    @if ($jobs->isEmpty())
                    <p class="text-center py-4">No jobs found matching your criteria.</p>
                @else
                    <div id="job-results">
                        @foreach ($jobs as $job)
                            <div class="job_1l shadow_box bg-white p-4 mt-4 rounded">
                                <div class="job_1li row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <div class="job_1lil">
                                            <span class="lh-1 col_blue"><i class="fa fa-buysellads fs-2"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="job_1lim">
                                            <h5 class="fw-bold">{{ $job->job_title }}</h5>
                                            <h6 class="text-muted">
                                                <span class="fw-bold col_blue">Location: {{ $job->city }}</span> • {{ $job->created_at->diffForHumans() }}
                                            </h6>
                
                                            <ul class="list-unstyled mt-3">
                                                @if (!empty($job->talent_types))
                                                    @php
                                                        $talentTypes = is_array($job->talent_types) ? $job->talent_types : json_decode($job->talent_types, true);
                                                    @endphp
                                                    <li>
                                                        <i class="fa fa-users col_blue me-1"></i> Talent Types: 
                                                        {{ is_array($talentTypes) ? implode(', ', $talentTypes) : $job->talent_types }}
                                                    </li>
                                                @endif
                                                
                                                @if (!empty($job->project_type))
                                                    <li><i class="fa fa-folder-open col_blue me-1"></i> Project Type: {{ $job->project_type }}</li>
                                                @endif
                                                
                                                @if (!empty($job->organization_type))
                                                    <li><i class="fa fa-building col_blue me-1"></i> Organization Type: {{ $job->organization_type }}</li>
                                                @endif
                                                
                                                <li><i class="fa fa-map-marker col_blue me-1"></i> Profession: {{ $job->profession }}</li>
                                                <li><i class="fa fa-clock-o col_blue me-1"></i> Company: {{ $job->company_name }}</li>
                                                <li>
                                                    <i class="fa fa-globe col_blue me-1"></i> Website: 
                                                    <a href="{{ $job->company_website }}" target="_blank">{{ $job->company_website }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <div class="job_1lir">
                                            <span class="fs-5 d-inline-block bg-light text-center rounded-circle p-2">
                                                <i class="fa fa-bookmark-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                
                        <p class="text-center mt-3">
                            Showing <strong>{{ $jobs->firstItem() }}</strong> to
                            <strong>{{ $jobs->lastItem() }}</strong>
                            of <strong>{{ $jobs->total() }}</strong> jobs
                        </p>
                
                        <div class="text-center mt-4">
                            {{ $jobs->links() }}  <!-- Laravel's default pagination -->
                        </div>
                    </div>
                @endif
                
			</div>
		</div>
	</div>
</section>

    <!-- AJAX Script for Pagination & Items Per Page -->
    <script>
        $(document).ready(function() {
            function fetchData(page = 1) {
                let perPage = $('#per_page').val();

                $.ajax({
                    url: `?page=${page}&per_page=${perPage}`,
                    success: function(response) {
                        $('#job-results').html($(response).find('#job-results').html());
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

    {{-- <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                let formData = $(this).serialize(); // Get form data

                $.ajax({
                    url: "{{ route('findjobfilter') }}", // Ensure this matches your route
                    type: "GET",
                    data: formData,
                    beforeSend: function() {
                        $('#job-results').html('<p>Loading...</p>'); // Show loader
                    },
                    success: function(response) {
                        $('#job-results').html(response.html); // Inject updated content
                    },
                    error: function(xhr) {
                        console.error("Error:", xhr.responseText);
                    }
                });
            });
        });
    </script> --}}


@endsection
