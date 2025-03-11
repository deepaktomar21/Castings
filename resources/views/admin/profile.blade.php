@extends('admin.partials.layout')

@section('title', 'User View')

@section('content')
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Profile</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Profile</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="ibox">
                            <div class="ibox-body text-center">
                                <div class="m-t-20">
                                    <!--<img class="img-circle" src="{{ asset('storage/' . $data->img) }}" />-->
                                    <!--<img src="{{ asset('storage/' . $data->image) }}" alt="User Image">-->

                                    @if(auth()->user()->img)
                                        <img src="{{ asset(auth()->user()->img) }}" alt="Profile Image" class="img-circle" >
                                    @else
                                        <p>No Profile Image Uploaded</p>
                                    @endif
                                </div>
                                <h5 class="font-strong m-b-10 m-t-10">{{$data->name}}</h5>
                                <!--<div class="m-b-20 text-muted">Web Developer</div>-->
                                <!--<div class="profile-social m-b-20">-->
                                <!--    <a href="javascript:;"><i class="fa fa-twitter"></i></a>-->
                                <!--    <a href="javascript:;"><i class="fa fa-facebook"></i></a>-->
                                <!--    <a href="javascript:;"><i class="fa fa-pinterest"></i></a>-->
                                <!--    <a href="javascript:;"><i class="fa fa-dribbble"></i></a>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--    <button class="btn btn-info btn-rounded m-b-5"><i class="fa fa-plus"></i> Follow</button>-->
                                <!--    <button class="btn btn-default btn-rounded m-b-5">Message</button>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <!--<div class="ibox">-->
                        <!--    <div class="ibox-body">-->
                        <!--        <div class="row text-center m-b-20">-->
                        <!--            <div class="col-4">-->
                        <!--                <div class="font-24 profile-stat-count">140</div>-->
                        <!--                <div class="text-muted">Followers</div>-->
                        <!--            </div>-->
                        <!--            <div class="col-4">-->
                        <!--                <div class="font-24 profile-stat-count">$780</div>-->
                        <!--                <div class="text-muted">Sales</div>-->
                        <!--            </div>-->
                        <!--            <div class="col-4">-->
                        <!--                <div class="font-24 profile-stat-count">15</div>-->
                        <!--                <div class="text-muted">Projects</div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="nav nav-tabs tabs-line">
                                    <!--<li class="nav-item">-->
                                    <!--    <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>-->
                                    <!--</li>-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab-1" data-toggle="tab"><i class="ti-settings"></i> Settings</a>
                                    </li>
                                    <!--<li class="nav-item">-->
                                    <!--    <a class="nav-link" href="#tab-3" data-toggle="tab"><i class="ti-announcement"></i> Feeds</a>-->
                                    <!--</li>-->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-1">
                                        <div class="row">
                                            <!--<div class="col-md-6" style="border-right: 1px solid #eee;">-->
                                            <!--    <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-bar-chart"></i> Month Statistics</h5>-->
                                            <!--    <div class="h2 m-0">$12,400<sup>.60</sup></div>-->
                                            <!--    <div><small>Month income</small></div>-->
                                            <!--    <div class="m-t-20 m-b-20">-->
                                            <!--        <div class="h4 m-0">120</div>-->
                                            <!--        <div class="d-flex justify-content-between"><small>Month income</small>-->
                                            <!--            <span class="text-success font-12"><i class="fa fa-level-up"></i> +24%</span>-->
                                            <!--        </div>-->
                                            <!--        <div class="progress m-t-5">-->
                                            <!--            <div class="progress-bar progress-bar-success" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--    <div class="m-b-20">-->
                                            <!--        <div class="h4 m-0">86</div>-->
                                            <!--        <div class="d-flex justify-content-between"><small>Month income</small>-->
                                            <!--            <span class="text-warning font-12"><i class="fa fa-level-down"></i> -12%</span>-->
                                            <!--        </div>-->
                                            <!--        <div class="progress m-t-5">-->
                                            <!--            <div class="progress-bar progress-bar-warning" role="progressbar" style="width:50%; height:5px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--    <ul class="list-group list-group-full list-group-divider">-->
                                            <!--        <li class="list-group-item">Projects-->
                                            <!--            <span class="pull-right color-orange">15</span>-->
                                            <!--        </li>-->
                                            <!--        <li class="list-group-item">Tasks-->
                                            <!--            <span class="pull-right color-orange">148</span>-->
                                            <!--        </li>-->
                                            <!--        <li class="list-group-item">Articles-->
                                            <!--            <span class="pull-right color-orange">72</span>-->
                                            <!--        </li>-->
                                            <!--        <li class="list-group-item">Friends-->
                                            <!--            <span class="pull-right color-orange">44</span>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</div>-->
                                            <!--<div class="col-md-6">-->
                                            <!--    <h5 class="text-info m-b-20 m-t-10"><i class="fa fa-user-plus"></i> Latest Followers</h5>-->
                                            <!--    <ul class="media-list media-list-divider m-0">-->
                                            <!--        <li class="media">-->
                                            <!--            <a class="media-img" href="javascript:;">-->
                                            <!--                <img class="img-circle" src="./assets/img/users/u1.jpg" width="40" />-->
                                            <!--            </a>-->
                                            <!--            <div class="media-body">-->
                                            <!--                <div class="media-heading">Jeanne Gonzalez <small class="float-right text-muted">12:05</small></div>-->
                                            <!--                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>-->
                                            <!--            </div>-->
                                            <!--        </li>-->
                                            <!--        <li class="media">-->
                                            <!--            <a class="media-img" href="javascript:;">-->
                                            <!--                <img class="img-circle" src="./assets/img/users/u2.jpg" width="40" />-->
                                            <!--            </a>-->
                                            <!--            <div class="media-body">-->
                                            <!--                <div class="media-heading">Becky Brooks <small class="float-right text-muted">1 hrs ago</small></div>-->
                                            <!--                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>-->
                                            <!--            </div>-->
                                            <!--        </li>-->
                                            <!--        <li class="media">-->
                                            <!--            <a class="media-img" href="javascript:;">-->
                                            <!--                <img class="img-circle" src="./assets/img/users/u3.jpg" width="40" />-->
                                            <!--            </a>-->
                                            <!--            <div class="media-body">-->
                                            <!--                <div class="media-heading">Frank Cruz <small class="float-right text-muted">3 hrs ago</small></div>-->
                                            <!--                <div class="font-13">Lorem Ipsum is simply dummy.</div>-->
                                            <!--            </div>-->
                                            <!--        </li>-->
                                            <!--        <li class="media">-->
                                            <!--            <a class="media-img" href="javascript:;">-->
                                            <!--                <img class="img-circle" src="./assets/img/users/u6.jpg" width="40" />-->
                                            <!--            </a>-->
                                            <!--            <div class="media-body">-->
                                            <!--                <div class="media-heading">Connor Perez <small class="float-right text-muted">Today</small></div>-->
                                            <!--                <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>-->
                                            <!--            </div>-->
                                            <!--        </li>-->
                                            <!--        <li class="media">-->
                                            <!--            <a class="media-img" href="javascript:;">-->
                                            <!--                <img class="img-circle" src="./assets/img/users/u5.jpg" width="40" />-->
                                            <!--            </a>-->
                                            <!--            <div class="media-body">-->
                                            <!--                <div class="media-heading">Bob Gonzalez <small class="float-right text-muted">Today</small></div>-->
                                            <!--                <div class="font-13">Lorem Ipsum is simply dummy.</div>-->
                                            <!--            </div>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</div>-->
                                        </div>
                                        <!--<h4 class="text-info m-b-20 m-t-20"><i class="fa fa-shopping-basket"></i> Latest Orders</h4>-->
                                        
                                    </div>
                                    <div class="tab-pane fade show active" id="tab-1">
                                   <form action="{{ route('admin.adminupdate') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-6 form-group">
            <label> Name</label>
            <input class="form-control" type="text" name="first_name" value="{{$data->name}}" placeholder="First Name" required>
        </div>
        <div class="col-sm-6 form-group">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone" placeholder="phone" value="{{$data->phone}}" required>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" placeholder="Email address" value="{{$data->email}}" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password"value="{{ $data->password }}"  placeholder="Password" required>
    </div>
    <div class="form-group">
        <label>Upload Profile Image</label>
        <input class="form-control" type="file" name="user_image" accept="image/*" required>
         @if(auth()->user()->img)
                                        <img src="{{ asset(auth()->user()->img) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px; height: 150px;">
                                    @else
                                        <p>No Profile Image Uploaded</p>
                                    @endif
    </div>
    <!--<div class="form-group">-->
    <!--    <label class="ui-checkbox">-->
    <!--        <input type="checkbox" name="remember_me">-->
    <!--        <span class="input-span"></span>Remember me-->
    <!--    </label>-->
    <!--</div>-->
    <div class="form-group">
        <button class="btn btn-default" type="submit">Submit</button>
    </div>
</form>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .profile-social a {
                        font-size: 16px;
                        margin: 0 10px;
                        color: #999;
                    }

                    .profile-social a:hover {
                        color: #485b6f;
                    }

                    .profile-stat-count {
                        font-size: 22px
                    }
                </style>
   
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->

@endsection