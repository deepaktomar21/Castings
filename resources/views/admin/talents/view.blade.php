@extends('admin.partials.layout')

@section('title', 'Talent View')

@section('content')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Talent Details</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="la la-home font-20"></i></a>
                </li>
                <div class="mt-3">
                    <a href="{{ route('admin.talents.data') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </ol>
        </div>

        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Talent Profile</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $user->name ?? 'N/A' }} {{ $user->last_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Stage Name</th>
                            <td>{{ $user->stage_name ?? 'N/A' }}</td>
                        </tr>
                         <tr>
                            <th>Profession</th>
                            <td>{{ $user->professional_title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td>{{ $user->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $user->location ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>{{ $user->bio ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Acting Techniques</th>
                            <td>{{ $user->acting_techniques ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Theater Experience</th>
                            <td>{{ $user->theater_experience ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Visibility</th>
                            <td>
                                <span
                                    class="badge {{ $user->visibility === 'public' ? 'badge-success' : 'badge-secondary' }}">
                                    {{ ucfirst($user->visibility) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ ucfirst($user->status) }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</td>
                        </tr>


                        <tr>
                            <th>Location</th>
                            <td>{{ $user->location }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>Pronoun</th>
                            <td>{{ $user->pronoun }}</td>
                        </tr>
                        <tr>
                            <th>Age Range</th>
                            <td>{{ $user->min_age }} - {{ $user->max_age }}</td>
                        </tr>

                        <tr>
                            <th>Height</th>
                            <td>{{ $user->height_feet }} Feet - {{ $user->height_inches }} inches</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ $user->weight }} kg</td>
                        </tr>
                        <tr>
                            <th>Body Type</th>
                            <td>{{ $user->body_type }}</td>
                        </tr>
                        <tr>
                            <th>Hair Color</th>
                            <td>{{ $user->hair_color }}</td>
                        </tr>
                        <tr>
                            <th>Eye Color</th>
                            <td>{{ $user->eye_color }}</td>
                        </tr>
                        <tr>
                            <th>Ethnicity</th>
                            <td>{{ $user->ethnicity }}</td>
                        </tr>
                        <tr>
                            <th>Skills</th>
                            <td>{{ $user->skills ?? 'N/A' }}</td>
                        </tr>






                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
