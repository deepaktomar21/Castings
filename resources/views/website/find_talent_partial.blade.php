@if ($talents->isEmpty())
    <p class="text-center">No talents found matching your criteria.</p>
@else
    <div class="row g-4">
        @foreach ($talents as $talent)
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <img src="{{ asset($talent->profile_image ?? 'path/to/default-image.jpg') }}" 
                                 class="rounded" style="width: 120px; height: 120px; object-fit: cover;" 
                                 alt="Talent Image">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title">{{ $talent->full_name }}</h5>
                            <p class="card-text">Gender: {{ $talent->gender }}</p>
                            <p class="card-text">Age: {{ $talent->age }}</p>
                            <p class="card-text">profession: {{ $talent->profession }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a class="text-primary fw-bold" data-bs-toggle="collapse" 
                           href="#contact-{{ $talent->id }}" role="button" 
                           aria-expanded="false" aria-controls="contact-{{ $talent->id }}">
                            View More
                        </a>
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
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $talents->appends(request()->query())->links() }}
    </div>
@endif
