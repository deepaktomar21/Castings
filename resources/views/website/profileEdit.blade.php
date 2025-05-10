@extends('website.layouts.app')

@section('title', 'Account Settings')

@section('content')

    <div class="site-section">
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif


            <br>
            <br>
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header text-black text-center py-3 bg-white">
                        <h4 class="mb-0">Account Settings </h4>
                    </div>

                    {{-- {{ $user->name }} --}}
                    <div class="card-body">

                        <div class="container">


                            <div class="tab-content mt-3">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Stage Name</label>
                                        <input type="text" name="stage_name" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Contact</label>
                                        <input type="text" name="contact" class="form-control" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" value="">
                                    </div>
                                </div>
                            </div>








                        </div>

                    </div>




                </div>

            </div>

        </div>
    </div>

@endsection
