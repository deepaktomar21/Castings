<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casting Admin</title>
    <!-- GLOBAL MAINLY STYLES -->

    <link href="{{ asset('admin/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet">
    <!-- PLUGINS STYLES -->
    {{--
    <link href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet"> --}}
    <!-- THEME STYLES -->
    {{-- --}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <!-- Alternative DataTables JS version -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons CSS (for Excel, PDF, Print) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- DataTables Buttons JS (for Excel, PDF, Print) -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <link href="{{ asset('admin/assets/css/main.min.css')}}" rel="stylesheet">
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER -->
        @include('admin.partials.header')
        <!-- END HEADER -->

        <!-- START SIDEBAR -->
        @include('admin.partials.navbar')
        <!-- END SIDEBAR -->

        <!-- MAIN CONTENT -->
        <main>
            @yield('content')
        </main>
        <!-- END MAIN CONTENT -->

        <!-- FOOTER -->
        {{-- @include('admin.partials.footer') --}}
        <!-- END FOOTER -->
        {{--
    </div> --}}

    <!-- BEGIN THEME CONFIG PANEL -->
    <div class="theme-config">
        <div class="theme-config-toggle">
            <i class="fa fa-cog theme-config-show"></i>
            <i class="ti-close theme-config-close"></i>
        </div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar
                </label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout
                </label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar
                </label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked>
                    <span class="input-span"></span>Fluid
                </label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed
                </label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <!-- Theme color options -->
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked>
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="bg-white color"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <!-- Add other theme options here -->
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL -->

    <!-- BEGIN PAGE BACKDROPS -->
    {{-- <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div> --}}
    <!-- END PAGE BACKDROPS -->

    <!-- CORE PLUGINS -->
    {{-- <script src="{{ asset('admin/assets/vendors/jquery/dist/jquery.min.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/metisMenu/dist/metisMenu.min.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('admin/assets/vendors/chart.js/dist/Chart.min.js')}}"></script>
    {{-- <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <!-- CORE SCRIPTS -->
    <script src="{{ asset('admin/assets/js/app.min.js')}}"></script>
    <!-- PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('admin/assets/js/scripts/dashboard_1_demo.js')}}"></script> --}}

</body>

</html>