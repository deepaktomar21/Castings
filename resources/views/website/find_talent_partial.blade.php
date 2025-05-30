@if ($talents->isEmpty())
    <p class="text-center">No talents found matching your criteria.</p>
@else
    <div class="row g-4">
        @foreach ($talents as $talent)
            <div class="col-md-3">
                <a href="{{ route('talent.show', $talent->name) }}" class="text-decoration-none">

                    <div class="card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
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
                                            style="width: 120px; height: 120px; object-fit: cover;" alt="Default Image">
                                    @endif
                                </div>

                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title">Full Name: {{ $talent->name }} {{ $talent->last_name }}</h5>
                                <p class="card-text">Professional Title: {{ $talent->professional_title }}</p>
                                <p class="card-text">Location: {{ $talent->location }}</p>
                                <p class="card-text">Gender: {{ $talent->gender ?? 'N/A' }}</p>

                                <p class="card-text">Age: {{ $talent->min_age ?? 'N/A'}} - {{ $talent->max_age ?? 'N/A'}} </p>

                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a class="text-primary fw-bold" data-bs-toggle="collapse" href="#phone-{{ $talent->id }}"
                                role="button" aria-expanded="false" aria-controls="phone-{{ $talent->id }}">
                                View More
                            </a>
                            <div class="collapse text-center mt-2" id="phone-{{ $talent->id }}">
                                <a href="tel: +91{{ $talent->phone }}" class="btn btn-primary w-100 mb-2">
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
    <div class="d-flex justify-content-center mt-4">
        {{ $talents->appends(request()->query())->links() }}
    </div>
@endif
