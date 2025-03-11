<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Casting</title>

<!-- CSS Files -->
<link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('website/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('website/css/global.css') }}" rel="stylesheet">
<link href="{{ asset('website/css/index.css') }}" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>


</head>



<body>
    
 <style>
  body {
    font-family: 'Inter', sans-serif;
    
}

 </style>
       
        @include('website.layouts.header')
        <main class="main">
            @yield('content')
        </main>
        @include('website.layouts.footer')
      
    
   

        <script>
            window.onscroll = function() {myFunction()};
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
            
            </html>