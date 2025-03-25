@extends('layouts.frontend.index')

@section('contents')
    <!--hero section start-->
    <section
        class="section-xl section-header bg-light-black text-white min-vh-100 flex-column d-flex justify-content-center">
        <video class="fit-cover w-100 h-100 position-absolute z--1" src="{{ asset('frontend/assets/video/hero-video.mp4') }} " autoplay="true"
            type="video/mp4" muted="" loop="true"></video>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-9">
                    <div class="hero-slider-content text-center">
                        <h1 class="display-2">Expert Automotive Care to Keep You Moving!</h1>
                        <p class="lead">Reliable Servicing, Quality Repairs, and Unmatched Expertise – Anytime, Anywhere!
                        </p>
                        <div class="heighlight-list-wrap mt-5">
                            <ul class="list-inline highlight-list">
                                <li
                                    class="list-inline-item media rounded-lg align-items-center justify-content-center px-3 py-3 bg-gradient-primary">
                                    <h6 class="mb-0">Professional Service</h6>
                                </li>
                                <li
                                    class="list-inline-item media rounded-lg align-items-center justify-content-center px-3 py-3 bg-gradient-primary">
                                    <h6 class="mb-0">Quality Assurance</h6>
                                </li>
                                <li
                                    class="list-inline-item media rounded-lg align-items-center justify-content-center px-3 py-3 bg-gradient-primary">
                                    <h6 class="mb-0">Affordable Pricing</h6>
                                </li>
                                <li
                                    class="list-inline-item media rounded-lg align-items-center justify-content-center px-3 py-3 bg-gradient-primary">
                                    <h6 class="mb-0">Fast & Reliable</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->
    <!-- USP Section -->
    <section class="usp-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 usp-item">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="highlight">
                            <h2>
                                99<sup>%</sup>
                            </h2>
                        </div>
                        <div class="content">
                            <p>Vehicles serviced with precision and care.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 usp-item">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="highlight">
                            <h2 class="mb-0">
                                4.98
                            </h2>
                        </div>
                        <div class="content">
                            <div class="review-star-icon fs-20 d-inline-block text-gradient-orange-sky-blue">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="mb-0">Top auto service.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 usp-item">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="highlight">
                            <h2 class="mb-0">
                                98<sup>%</sup>
                            </h2>
                        </div>
                        <div class="content">
                            <p class="mb-0">Customers return for our trusted expertise</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- USP Section End -->
    <!--client logos start-->
    <div class="section py-1 border border-bottom border-variant-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <p class="lead mb-0">Trusted by over <strong class="text-primary">4,500+</strong> customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--client logos end-->

    <!--about section start-->
    <section id="about" class="section section-sm about-sec">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-12 col-lg-5">
                    <h2>Your Trusted Automotive Service Partner</h2>
                    <p class="lead">At Titanium Automotive, we are committed to providing top-notch automotive care with a
                        focus on quality, reliability, and customer satisfaction. Our expert technicians, advanced tools,
                        and customer-first approach ensure that your vehicle gets the best service it deserves. Whether it’s
                        routine maintenance or major repairs, we deliver excellence at every step.</p>
                    <a href="#" class="btn btn-secondary mt-3">Know more<span class="icon icon-xs ml-2"><span
                                class="fas fa-arrow-right"></span></span></a>
                </div>
                <div class="col-12 col-lg-6 ml-lg-auto">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="card bg-default text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-4 text-center">
                                    <span class="icon icon-lg d-block"><img
                                            src="{{ asset('frontend/assets/img/icon/expert-technicians.webp') }} "></span>
                                    <h5>Expert Technicians</h5>
                                    <p class="mb-0">Skilled professionals ensuring top-quality service for your vehicle.
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-success text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-4 text-center">
                                    <span class="icon icon-lg d-block"><img
                                            src="{{ asset('frontend/assets/img/icon/advanced-diagnostics.webp') }} "></span>
                                    <h5>Advanced Diagnostics</h5>
                                    <p class="mb-0">Cutting-edge technology for accurate and efficient vehicle checks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-lg-4">
                            <div class="card bg-secondary text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-4 text-center">
                                    <span class="icon icon-lg d-block"><img
                                            src="{{ asset('frontend/assets/img/icon/affordable-Pricing.webp') }} "></span>
                                    <h5>Affordable Pricing</h5>
                                    <p class="mb-0">Competitive rates without compromising on service quality.</p>
                                </div>
                            </div>
                            <div class="card bg-primary text-white shadow-soft rounded mb-4">
                                <div class="px-3 px-lg-4 py-4 text-center">
                                    <span class="icon icon-lg d-block"><img src="{{ asset('frontend/assets/img/icon/turn-around.webp') }} "></span>
                                    <h5>Quick Turnaround</h5>
                                    <p class="mb-0">Fast and reliable service to get you back on the road sooner.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about section end-->

    <!--features section start-->
    <section id="services" class="section section-sm bg-soft ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Our Services</h2>
                        <p class="lead">Comprehensive Auto Care to Keep You on the Road Safely</p>
                    </div>
                </div>
            </div>

            <div class="row service-list">
                <div class="col-md-6 col-lg-4 mb-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <a href="#">
                            <div class="card-icon mb-4">
                                <img src="{{ asset('frontend/assets/img/icon/car-servicing.png') }} " alt="icon" width="60"
                                    class="img-fluid">
                            </div>
                            <h2 class="h5">New Car Servicing</h2>
                            <p class="mb-0">Comprehensive checkups ensuring peak performance and longevity for your new
                                vehicle.</p>
                        </a>
                    </div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <a href="#">
                            <div class="card-icon mb-4">
                                <img src="{{ asset('frontend/assets/img/icon/maintenance.png') }} " alt="icon" width="60"
                                    class="img-fluid">
                            </div>
                            <h2 class="h5">Maintenance & Repairs</h2>
                            <p class="mb-0">Reliable solutions for smooth, safe, and efficient vehicle performance.</p>
                        </a>
                    </div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <a href="#">
                            <div class="card-icon mb-4">
                                <img src="{{ asset('frontend/assets/img/icon/gear-shift.png') }} " alt="icon" width="60"
                                    class="img-fluid">
                            </div>
                            <h2 class="h5">Transmission Service</h2>
                            <p class="mb-0">Expert care for smooth gear shifts and enhanced transmission durability.</p>
                        </a>
                    </div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <a href="#">
                            <div class="card-icon mb-4">
                                <img src="{{ asset('frontend/assets/img/icon/fleet.png') }} " alt="icon" width="60" class="img-fluid">
                            </div>
                            <h2 class="h5">Fleet Maintenance</h2>
                            <p class="mb-0">Keeping your business vehicles road-ready with timely servicing and repairs.
                            </p>
                        </a>
                    </div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 mb-md-0">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <a href="#">
                            <div class="card-icon mb-4">
                                <img src="{{ asset('frontend/assets/img/icon/wheel.png') }} " alt="icon" width="60" class="img-fluid">
                            </div>
                            <h2 class="h5">Tyres & Wheel Alignment</h2>
                            <p class="mb-0">Precision balancing and alignment for better traction and fuel efficiency.
                            </p>
                        </a>
                    </div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-md-0">
                    <!-- Icon box -->
                    <div class="icon-box text-center p-5 border border-variant-soft rounded-custom bg-white shadow-soft">
                        <a href="#">
                            <div class="card-icon mb-4">
                                <img src="{{ asset('frontend/assets/img/icon/car-battery.png') }} " alt="icon" width="60"
                                    class="img-fluid">
                            </div>
                            <h2 class="h5">Batteries</h2>
                            <p class="mb-0">High-quality battery replacement and diagnostics for reliable vehicle power.
                            </p>
                        </a>
                    </div>
                    <!-- End of Icon box -->
                </div>
            </div>
        </div>
    </section>
    <!--features section end-->

    <!--cta section start-->
    <section class="section py-0" style="background: url('{{ asset('frontend/assets/img/slider-3.png') }} ')no-repeat center fixed">
        <div class="section-sm section bg-gradient-primary text-white  ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-10 col-lg-9">
                        <div class="section-title text-center mb-5">
                            <h2>Book Your Service Today!</h2>
                            <p class="lead">Get top-quality automotive care from expert technicians. Whether it’s routine
                                maintenance or major repairs, we ensure reliability, affordability, and customer
                                satisfaction. Schedule your service now and keep your vehicle running smoothly!</p>
                        </div>
                        <div class="download-btn-wrap text-center">
                            <a class="btn btn-pill border border-variant-light text-white shadow-hover mr-md-3 mb-4 mb-md-3 mb-lg-0"
                                href="#">
                                <div class="d-flex align-items-center">
                                    <span class="icon icon-md mr-3 h-auto"><i class="fas fa-phone-alt"></i></span>
                                    <div class="d-block text-left">
                                        <small class="font-small">Book Service</small>
                                        <div class="h6 mb-0">Contact Us</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cta section end-->

    <!--testimonial section start-->
    <section class="section section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading mb-5 text-center">
                        <h2>What Clients Say About Us</h2>
                        <p class="lead">
                            Hear from our satisfied customers who trust us for reliable automotive services. Their
                            experiences speak for our commitment to quality, transparency, and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="owl-carousel owl-theme client-testimonial custom-dot">
                        <div class="item">
                            <div class="testimonial-single shadow-sm bg-white rounded-custom p-5">
                                <div class="quotation mb-4">
                                    <span class="icon icon-md icon-lg  icon-light "><i
                                            class="fas fa-quote-left"></i></span>
                                </div>
                                <blockquote class="blockquote">
                                    Exceptional service! The team was professional, and my car runs like new. Highly
                                    recommended!
                                </blockquote>
                                <div
                                    class="d-flex justify-content-md-between justify-content-lg-between align-items-center pt-3">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('frontend/assets/img/team/team-8.jpg') }} " alt="team"
                                            class="avatar avatar-sm mr-3">
                                        <div class="media-body">
                                            <h6 class="mb-0">Rahul Sharma</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-single shadow-sm bg-white rounded-custom p-5">
                                <div class="quotation mb-4">
                                    <span class="icon icon-md icon-lg  icon-light "><i
                                            class="fas fa-quote-left"></i></span>
                                </div>
                                <blockquote class="blockquote">
                                    Honest pricing and top-quality work. They fixed my brakes perfectly. Will return for
                                    sure!
                                </blockquote>
                                <div
                                    class="d-flex justify-content-md-between justify-content-lg-between align-items-center pt-3">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('frontend/assets/img/team/team-5.jpg') }} " alt="team"
                                            class="avatar avatar-sm mr-3">
                                        <div class="media-body">
                                            <h6 class="mb-0">Priya Nair</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-single shadow-sm bg-white rounded-custom p-5">
                                <div class="quotation mb-4">
                                    <span class="icon icon-md icon-lg  icon-light "><i
                                            class="fas fa-quote-left"></i></span>
                                </div>
                                <blockquote class="blockquote">
                                    Friendly staff, transparent service, and great results. My car has never driven better!
                                </blockquote>
                                <div
                                    class="d-flex justify-content-md-between justify-content-lg-between align-items-center pt-3">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('frontend/assets/img/team/team-4.jpg') }} " alt="team"
                                            class="avatar avatar-sm mr-3">
                                        <div class="media-body">
                                            <h6 class="mb-0">Amit Verma</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-single shadow-sm bg-white rounded-custom p-5">
                                <div class="quotation mb-4">
                                    <span class="icon icon-md icon-lg  icon-light "><i
                                            class="fas fa-quote-left"></i></span>
                                </div>
                                <blockquote class="blockquote">
                                    Fast and efficient! Got my engine diagnosed and repaired in no time. Great experience!
                                </blockquote>
                                <div
                                    class="d-flex justify-content-md-between justify-content-lg-between align-items-center pt-3">
                                    <div class="media align-items-center">
                                        <img src="{{ asset('frontend/assets/img/team/team-6.jpg') }} " alt="team"
                                            class="avatar avatar-sm mr-3">
                                        <div class="media-body">
                                            <h6 class="mb-0">Michael Harris</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial section end-->
@endsection
