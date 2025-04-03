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

    <div class="d-flex justify-content-center mt-4">
        {{ $jobs->appends(request()->query())->links() }}
    </div>
@endif
