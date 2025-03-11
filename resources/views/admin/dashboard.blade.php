@extends('admin.partials.layout')

@section('title', 'Home')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        {{-- <h2 class="m-b-5 font-strong">{{$Adminjob}}</h2> --}}
                        <div class="m-b-5">Jobs</div>
                        {{-- <i class="ti-shopping-cart widget-stat-icon"></i> --}}
                        <!--<div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        {{-- <h2 class="m-b-5 font-strong">{{$JobApplication}}</h2> --}}
                        <div class="m-b-5">Job Applications</div>
                        {{-- <i class="ti-bar-chart widget-stat-icon"></i> --}}
                        <!--<div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        {{-- <h2 class="m-b-5 font-strong">{{$Course}}</h2> --}}
                        <div class="m-b-5">Courses</div>
                        {{-- <i class="fa fa-money widget-stat-icon"></i> --}}
                        <!--<div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        {{-- <h2 class="m-b-5 font-strong">{{$Talent}}</h2> --}}
                        <div class="m-b-5">Talents</div>
                        {{-- <i class="ti-user widget-stat-icon"></i> --}}
                        <!--<div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="mb-4 flexbox">
                            <div>
                                <h3 class="m-0">Monthly User Statistics</h3>
                            </div>
                        </div>
                        <div>
                            <canvas id="chats_user" style="height:260px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- END PAGE CONTENT-->
    <footer class="page-footer">
        <div class="font-13">2025 © <b>Casting</b> - All rights reserved.</div>
        {{-- <a class="px-4"
            href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589"
            target="_blank">BUY PREMIUM</a> --}}
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</div>
</div>
@endsection