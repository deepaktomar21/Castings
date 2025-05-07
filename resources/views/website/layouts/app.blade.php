<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Casting</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- CSS Files -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/index.css') }}" rel="stylesheet">

    <link href="https://db.onlinewebfonts.com/c/34bf77357fafcf04d4061d4e19a32c85?family=Reckless+Bold" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&family=Roboto+Condensed:wght@400;600&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&family=Source+Serif+Pro:wght@400;600&display=swap"
        rel="stylesheet">

    <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>



<body>

    <style>
        /* Apply Source Serif Pro as the default font for the body */
        body {
            font-family: 'Source Serif Pro', serif;

        }

        /* Use Oswald for headers with Semi-Bold style */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Oswald', sans-serif;

        }
    </style>


    @include('website.layouts.header')
    <main class="main">
        @yield('content')
    </main>
    @include('website.layouts.footer')




    <script>
        window.onscroll = function() {
            myFunction()
        };
        var navbar_sticky = document.getElementById("navbar_sticky");
        var sticky = navbar_sticky.offsetTop;
        var navbar_height = document.querySelector('.navbar').offsetHeight;

        function myFunction() {
            if (window.pageYOffset >= sticky + navbar_height) {
                navbar_sticky.classList.add("sticky")
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                navbar_sticky.classList.remove("sticky");
                document.body.style.paddingTop = '0'
            }
        }
    </script>

</body>
{{-- <div>Icons made from <a href="https://www.onlinewebfonts.com/icon">svg icons</a>is licensed by CC BY 4.0</div> --}}

</html>
