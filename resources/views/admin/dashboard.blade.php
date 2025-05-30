@extends('admin.partials.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ $totalJobs }}</h2>
                            <div class="m-b-5">Jobs</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ $totalUsers }}</h2>
                            <div class="m-b-5">Total Users</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ $totalRecruiters }}</h2>
                            <div class="m-b-5">Total Recruiters</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ $totalTalents }}</h2>
                            <div class="m-b-5">Total Talents</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chart Section --}}
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-body">
                            <h3 class="mb-4">Monthly User Statistics by Role</h3>
                            <canvas id="chats_user" style="height:260px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('chats_user').getContext('2d');

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($months) !!},
                    datasets: [{
                            label: 'Talents',
                            data: {!! json_encode($talentCounts) !!},
                            fill: false,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            tension: 0.3,
                            pointRadius: 5,
                        },
                        {
                            label: 'Recruiters',
                            data: {!! json_encode($recruiterCounts) !!},
                            fill: false,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            tension: 0.3,
                            pointRadius: 5,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    stacked: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>

        <footer class="page-footer">
            <div class="font-13">2025 © <b>Casting</b> - All rights reserved.</div>

            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
        </footer>
    </div>
    </div>
@endsection
