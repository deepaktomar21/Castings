<section id="header fw-semibold">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar_sticky">
        <div class="container-fluid">
            <!-- Logo (Top Left) -->
            <a class="text-black navbar-brand fw-bold me-4" style="font-family: 'Reckless Bold';"
                href="{{ route('home') }}">
                <i class="fa fa-user col_black me-1"></i> ScreenCall
            </a>

            <!-- Navbar Toggler (For Mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-md-4 ps-md-2 ms-lg-3 ps-lg-2 ms-xl-5 ps-xl-5">


                    @if (session('user_role') === 'recruiter')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('DashboardRecruiter') }}">Dashboard</a>
                        </li>
                    @elseif(session('user_role') === 'talent')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('home') }}">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('home') }}">Home</a>
                        </li>
                    @endif



                    @if (session('user_role') === 'recruiter')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('postjobForm') }}">Job Posting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('findTalent') }}">Find Talent</a>
                        </li>
                    @endif




                    @if (session('user_role') === 'talent')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('findJob') }}">Find Job</a>
                        </li>
                    @endif




                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('register') }}">Join Now</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('blogs.index') }}">Blog</a>
                    </li>
                    @if (session('user_role') === 'talent')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('myJobs') }}">My Jobs</a>
                        </li>
                    @endif

                    @if (session('user_role') === 'recruiter')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('recriuter.chats') }}">Message</a>
                        </li>
                    @endif


                    @if (session('user_role') === 'talent')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ route('chat.talent') }}">Message</a>
                        </li>
                    @endif






                </ul>

                <!-- Login/Sign Up (Top Right) -->



                <ul class="navbar-nav ms-auto">
                    @php
                        $userRole = session('user_role');
                        $userName = session('LoggedUserName') ?? session('LoggedAdminName');
                        $isLoggedIn = session('LoggedUserInfo') || session('LoggedAdminInfo');
                    @endphp

                    @if ($isLoggedIn)
                        <!-- Welcome Message -->
                        {{-- @if ($userRole === 'recruiter')
                            <li>
                                <a class="nav-link text-primary" href="{{ route('switch.profile', 'talent') }}">
                                    <i class="fa fa-retweet me-2"></i> Switch to Talent
                                </a>
                            </li>
                        @elseif ($userRole === 'talent')
                            <li>
                                <a class="nav-link text-primary" href="{{ route('switch.profile', 'recruiter') }}">
                                    <i class="fa fa-retweet me-2"></i> Switch to Recruiter
                                </a>
                            </li>
                        @endif --}}
                        @if ($userRole === 'recruiter')
                            <li class="px-3">
                                <form action="{{ route('switch.profile', 'talent') }}" method="GET">
                                    <button type="submit" class="text-primary w-100 text-start"
                                        style="background: none; border: none; padding: 6px 12px; text-decoration: none; cursor: pointer;">
                                        <i class="fa fa-retweet me-2"></i> Switch to Talent
                                    </button>
                                </form>
                            </li>
                        @elseif ($userRole === 'talent')
                            <li class="px-3">
                                <form action="{{ route('switch.profile', 'recruiter') }}" method="GET">
                                    <button type="submit" class="text-primary w-100 text-start"
                                        style="background: none; border: none; padding: 6px 12px; text-decoration: none; cursor: pointer;">
                                        <i class="fa fa-retweet me-2"></i> Switch to Recruiter
                                    </button>
                                </form>
                            </li>
                        @endif

                        <li class="nav-item d-flex align-items-center">
                            <span class="nav-link text-black fw-bold">
                                <i class="fa fa-user me-1"></i> Welcome, {{ $userName }}
                            </span>
                        </li>

                        <!-- More Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="moreDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdown">
                                {{-- Account Settings --}}
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-cog me-2"></i> Account Settings
                                    </a>
                                </li>

                                {{-- What's New --}}
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-bell me-2"></i> What's New
                                    </a>
                                </li>

                                {{-- Talent Database --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('findTalent') }}">
                                        <i class="fa fa-database me-2"></i> Talent Database
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                {{-- Switch Profile --}}
                                @if ($userRole === 'recruiter')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('switch.profile', 'talent') }}">
                                            <i class="fa fa-retweet me-2"></i> Switch to Talent
                                        </a>
                                    </li>
                                @elseif ($userRole === 'talent')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('switch.profile', 'recruiter') }}">
                                            <i class="fa fa-retweet me-2"></i> Switch to Recruiter
                                        </a>
                                    </li>
                                @endif

                                {{-- Logout --}}
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logoutUser') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Hidden logout form -->
                        <form id="logout-form" action="{{ route('logoutUser') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- If not logged in -->
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



                </ul>
            </div>
        </div>
    </nav>

</section>
