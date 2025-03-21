<div class="row">
    @foreach($talents as $talent)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($talent->profile_image ?? 'path/to/default-image.jpg') }}" class="card-img-top" alt="Talent Image">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $talent->full_name }}</h5>
                    <p class="card-text">{{ $talent->location }}</p>
                    
                    <a href="#" class="btn btn-primary">Message</a>
                    <a href="#" class="btn btn-outline-primary">Invite</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    @foreach($talents as $talent)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $talent->full_name }}</h5>
                    <p class="card-text"><strong>Gender:</strong> {{ $talent->gender }}</p>
                    <p class="card-text"><strong>Age:</strong> {{ $talent->age }}</p>
                    <p class="card-text"><strong>Location:</strong> {{ $talent->location }}</p>
                    <p class="card-text"><strong>Profession:</strong> {{ $talent->profession }}</p>
                    <p class="card-text"><strong>Experience:</strong> {{ $talent->experience }} years</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- AJAX Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $talents->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
