<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Restaurant')</title>
    @include('User.layouts.header') <!-- ✅ Include header, not extends -->
</head>

<body>

    @yield('content')

</body>
<!-- About Start -->

<!-- Team End -->

<!-- Navigation-->

<!-- Testimonial Start -->

<!-- Testimonial End -->


<!-- Footer Start -->

@include('User.layouts.footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
@include('User.layouts.scripts')

 <!-- Optional -->
</body>
</html>
