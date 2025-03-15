@extends('website.layouts.app')

@section('title', 'Post Job')

@section('content')
    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid py-4">
        <div class="listing-section">
            <div class="content--header text-center mb-4">
                <h4 class="listing-section__header">
                    Welcome, {{ auth()->user()->name ?? 'Guest' }}, what type of talent do you need?
                </h4>
                <label>Select all that apply</label>
            </div>
    
            {{-- Talent Selection --}}
            <div class="content--body row justify-content-center">
                @php
                    $talentTypes = [
                        ['icon' => 'users', 'name' => 'Actors & Performers', 'desc' => 'Cast screen and stage talent'],
                        ['icon' => 'mic', 'name' => 'Voiceover', 'desc' => 'Cast the perfect voice'],
                        ['icon' => 'film', 'name' => 'Creatives & Production Crew', 'desc' => 'Hire PAs, Sound, Camera, and more'],
                        ['icon' => 'video', 'name' => 'Content Creators & Real People', 'desc' => 'Discover personalities and on-brand talent'],
                        ['icon' => 'image', 'name' => 'Models', 'desc' => 'Book lifestyle, commercial, and fashion models'],
                        ['icon' => 'edit', 'name' => 'Video Editors', 'desc' => 'Hire remote and on-site editors'],
                    ];
                @endphp
    
                @foreach ($talentTypes as $talent)
                    <div class="talent-type-tile col-lg-4 col-md-6 col-sm-12 my-3">
                        <div class="tile-button text-center p-4 shadow-sm border rounded h-100">
                            <i data-feather="{{ $talent['icon'] }}" class="mb-3" width="40" height="40"></i>
                            <div class="tile-button__content">
                                <span class="tile-name font-weight-bold h5 d-block">{{ $talent['name'] }}</span>
                                <small class="tile-caption text-muted">{{ $talent['desc'] }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            {{-- "Other" Button --}}
            <div class="text-center mt-4">
                <button type="button" class="btn btn-outline-primary d-flex align-items-center mx-auto">
                    <i data-feather="plus-circle" class="me-2"></i> Other
                </button>
            </div>
    
            {{-- Navigation Buttons --}}
            <div class="content--action row mt-4">
                <div class="col-md-6 offset-md-3 text-center">
                    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center w-100">
                        Next <i data-feather="arrow-right" class="ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            feather.replace(); // Replace all icons
        });
    </script>
    

@endsection
