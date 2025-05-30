@extends('admin.partials.layout')

@section('title', 'Create Subscription Plan')

@section('content')
    <div class="content-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Create Subscription Plan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Subscription Plan</li>
                <li class="breadcrumb-item">Create</li>
                <br>

            </ol>
            <div class="mt-3">
                <a href="{{ route('subscriptions.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        @if (session('error'))
            <p class="text-center text-danger">{{ session('error') }}</p>
        @endif
        @if (session('success'))
            <p class="text-center text-success">{{ session('success') }}</p>
        @endif

        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Create Subscription Plan</div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route('subscriptions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Plan Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Starter, Basic etc">
                        </div>

                        <div class="form-group">
                            <label>Price (INR/month)</label>
                            <input type="text" name="price" class="form-control" step="0.01" placeholder="17">
                        </div>

                        <div class="form-group">
                            <label>Duration (in days)</label>
                            <input type="text" name="duration" class="form-control" placeholder="30">
                        </div>

                        <div class="form-group">
                            <label>Job Post Limit</label>
                            <input type="number" name="job_post_limit" class="form-control" placeholder="5">
                        </div>

                        <div class="form-group">
                            <label>Resume View Limit</label>
                            <input type="number" name="resume_view_limit" class="form-control" placeholder="10">
                        </div>

                        <div class="form-group">
                            <label>Features (comma separated)</label>
                            <textarea name="description" class="form-control" rows="3"
                                placeholder="Delivering Corporate, Business Solutions, ..."></textarea>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" checked>
                            <label class="form-check-label">Active</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
