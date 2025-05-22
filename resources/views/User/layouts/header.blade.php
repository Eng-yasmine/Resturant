<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Favicon -->
<link href="{{ asset('front/img/favicon.ico') }}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('front/lib/animate/animate.min.css') }}') }}" rel="stylesheet">
<link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
@yield('link')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        {{-- <div class="container-xxl position-relative p-0"> --}}
        {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('pages.index') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('pages.about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('pages.service') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('pages.menu') }}" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('pages.booking') }}" class="dropdown-item">Booking</a>
                                <a href="{{ route('pages.team') }}" class="dropdown-item">Our Team</a>
                                <a href="{{ route('pages.testimonial') }}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="{{ route('pages.contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{ route('pages.dashboard') }}" class="btn btn-primary py-2 px-4">DashBoard</a>
                </div>
            </nav> --}}


        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-3">
                <!-- Logo -->
                @can('viewAny')
                    <a href="{{ route('dashboard') }}" class="navbar-brand p-0">
                        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>{{ config('app.name') }}</h1>
                    </a>
                @endcan

                <!-- Toggle Button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('pages.about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('pages.service') }}" class="nav-item nav-link">Services</a>
                        <a href="{{ route('pages.menu') }}" class="nav-item nav-link">Menu</a>

                        <!-- Dropdown Pages -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('pages.booking') }}" class="dropdown-item">Booking</a>
                                <a href="{{ route('carts.index') }}" class="dropdown-item">Cart</a>
                                <a href="{{ route('pages.team') }}" class="dropdown-item">Our Team</a>
                                <a href="{{ route('pages.testimonial') }}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>

                        <a href="{{ route('pages.contact') }}" class="nav-item nav-link">Contact</a>
                    </div>

                    <!-- User Dropdown (from Breeze) -->
                    @auth
                        <div class="nav-item dropdown ms-4">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end m-0">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">DashBoard</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 ms-3">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4 ms-3">register</a>
                    @endguest
                </div>
            </nav>
        </div>
