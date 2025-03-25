<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('frontend/assets/img/logo.png') }}" type="image/png" sizes="16x16">

    <!--title-->
    <title>Titanium Automotive</title>

    <!--build:css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <!-- endbuild -->
</head>

<body>

    <!--preloader start-->
    <div id="preloader">
        <div class="loader1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--preloader end-->
    <!--header section start-->
    @include('layouts.frontend.header-footer.header')
    <!--header section end-->

    <div class="main">

        @yield('contents')

    </div>

    <!--footer section start-->
    @include('layouts.frontend.header-footer.footer')
    <!--footer section end-->
    <!--scroll bottom to top button start-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </button>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="{{ asset('frontend/assets/js/vendors/jquery-3.5.1.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/popper.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/bootstrap.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/jquery.magnific-popup.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/jquery.easing.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/mixitup.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/headroom.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/smooth-scroll.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/wow.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/jquery.waypoints.min.js') }} "></script>
    <!--<script src="{{ asset('frontend/assets/js/vendors/countUp.min.js') }} "></script>-->
    <script src="{{ asset('frontend/assets/js/vendors/jquery.countdown.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/vendors/validator.min.js') }} "></script>
    <script src="{{ asset('frontend/assets/js/app.js') }} "></script>
    <!--endbuild-->
</body>

</html>
