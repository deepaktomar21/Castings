<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lms &mdash; Website by lms</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="{{ asset('Frotent/images/WPS Photos(1).png')}}"
    href="{{ asset('Frotent/images/WPS Photos(1).png')}}">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('Frotent/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{ asset('Frotent/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('Frotent/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ asset('Frotent/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('Frotent/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ asset('Frotent/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{ asset('Frotent/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{ asset('Frotent/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{ asset('Frotent/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{ asset('Frotent/css/aos.css')}}">
  <link href="{{ asset('Frotent/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset('Frotent/css/style.css')}}">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- Example for Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Example for Flaticon -->
  <link rel="stylesheet" href="https://your-flaticon-library-path.css">
  <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">-->

</head>
<style>
  .themecolor {
    background-color: #142848;
  }

  a {
    color: #f0c71e;
  }

  .a {
    background-color: #f0c71e;
    color: #fff;
  }

  button {
    background-color: #f0c71e;
    color: #fff;
  }
</style>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">
    <!-- Navbar Section -->
    @include('Website.partials.navbar')

    <!-- Header Section -->
    @include('Website.partials.header')


    <!-- Main Content Section -->
    {{-- <main> --}}
      @yield('content')
      {{-- </main> --}}

    <!-- Footer Section -->
    @include('Website.partials.footer')
  </div>
  <!-- Add JS Links -->

  <!-- loader -->
  {{-- <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#51be78" />
    </svg></div> --}}

  <script src="{{ asset('Frotent/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery-ui.js')}}"></script>
  <script src="{{ asset('Frotent/js/popper.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery.countdown.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('Frotent/js/aos.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery.sticky.js')}}"></script>
  <script src="{{ asset('Frotent/js/jquery.mb.YTPlayer.min.js')}}"></script>

  <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
  <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>-->

  <script>
    document.querySelectorAll('.site-menu a').forEach(link => {
  link.addEventListener('click', function(e) {
    console.log('Link clicked:', e.target.href); // Check if this is logged
    // Make sure preventDefault is NOT called unless intentional
  });
});

  </script>

  <script src="{{ asset('Frotent/js/main.js')}}"></script>

</body>

</html>