@php
    $collapseId = 'details' . $job->id;
@endphp

<a href="#{{ $collapseId }}" class="list-group-item list-group-item-action" data-bs-toggle="collapse">
    <span class="text-muted">
        ({{ ucfirst($job->status) }}) 
        <span class="text-primary">{{ $job->job_title }}</span> 
        <br>- 0 new, 0 cast, 0 audition, 0 total
    </span>
    <span class="float-end">
        <a href="{{ route('recruiter.job.edit', $job->id) }}"><i class="bi bi-pencil me-2"></i>
        </a>
        <a href="{{ route('recruiter.job.delete', $job->id) }}"><i class="bi bi-trash text-danger"></i>
        </a>
        
    </span>
</a>
<div class="collapse" id="{{ $collapseId }}">
    <div class="p-2 text-black d-flex flex-wrap justify-content-between">
        <span><strong>Status:</strong> {{ ucfirst($job->status) }}</span>
        <span><strong>Created on:</strong> {{ $job->created_at->format('d-m-Y') }}</span>
        <span><strong>Expires on:</strong> {{ optional($job->expires_at)->format('d-m-Y') ?? 'N/A' }}</span>
        <span><strong>Email Notification:</strong> Enabled</span>
    </div>
</div>
