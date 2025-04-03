<section id="header fw-semibold">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar_sticky">
        <div class="container-fluid">
            <!-- Logo (Top Left) -->
            <a class="text-black navbar-brand fw-bold me-4" style="font-family: 'Reckless Bold';" href="{{ route('home') }}">
                <i class="fa fa-user col_black me-1" ></i> ScreenCall
            </a>

            <!-- Navbar Toggler (For Mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-md-4 ps-md-2 ms-lg-3 ps-lg-2 ms-xl-5 ps-xl-5">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('home') }}">Home</a>
                    </li>
                    
                    @auth
                        @if(auth()->user()->role === 'recruiter')
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('postjobForm') }}">Job Posting</a>
                            </li>
                        @endif
                    @endauth
                    
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Join Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Create Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{route('findJob')}}">Find Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{route('findTalent')}}">Find Talent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Casting News</a>
                    </li>
                    @auth
                    @if(auth()->user()->role === 'talent')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('profile') }}">Profile</a>
                        </li>
                    @endif
                @endauth
                </ul>
               
                <!-- Login/Sign Up (Top Right) -->
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                        <!-- If the user is logged in -->
                        <li class="nav-item">
                            <a class="nav-link text-black fw-bold" href="#">
                                <i class="fa fa-user"></i> Welcome, {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black fw-bold" href="{{ route('logoutUser') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                        <!-- Hidden logout form -->
                        <form id="logout-form" action="{{ route('logoutUser') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- If the user is not logged in -->
                        <li class="nav-item">
                            <a class="nav-link text-black fw-bold" href="{{ route('login') }}">
                                <i class="fa fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black fw-bold" href="{{ route('register') }}">
                                <i class="fa fa-user-plus me-1"></i> Sign Up
                            </a>
                        </li>
                    @endif
                </ul>
                
                
                {{-- <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ route('login') }}"><i class="fa fa-sign-in-alt me-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black fw-bold" href="{{ route('register') }}"><i class="fa fa-user-plus me-1"></i> Sign Up</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</section>
