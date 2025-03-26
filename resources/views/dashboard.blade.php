@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <!-- Earning Reports -->
            <div class="col-md-7">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-1">Earning Reports</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center g-md-8">
                            <div class="col-12 col-md-5 d-flex flex-column">
                                <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
                                    <h4 class="mb-0 total_from_date_range">${{ number_format($rentReceived, 0) }}</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 ps-xl-8">
                                <div id="date-range">
                                    <input type="text" id="dateRangePicker" class="form-control mx-2"
                                        placeholder="Select Date Range">
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-5 mt-5">
                            <div class="row gap-4 gap-sm-0">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-primary p-1"><i
                                                class="icon-base ti tabler-currency-dollar icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Received</h6>
                                    </div>
                                    <p class="my-2 text-center"><b>${{ number_format($depositTotal, 0) }}</b></p>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-info p-1"><i
                                                class="icon-base ti tabler-chart-pie-2 icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Outstanding</h6>
                                    </div>
                                    <p class="my-2 text-center"><b>${{ number_format($outstandingTotal, 0) }}</b></p>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-danger p-1"><i
                                                class="icon-base ti tabler-brand-paypal icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Total</h6>
                                    </div>
                                    <p class="my-2 text-center"><b>${{ number_format($totalEarnings, 0) }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Earning Reports -->

            <!-- Support Tracker -->
            <div class="col-12 col-md-5">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="mb-1">Vehicles Overview</h5>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-12 col-sm-4">
                            <div class="mt-lg-4 mt-lg-2 mb-lg-6 mb-2">
                                <h2 class="mb-0">{{ $totalVehicles }}</h2>
                                <p class="mb-0">Total Vehicles</p>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex gap-4 align-items-center mb-lg-3 pb-1">
                                    <div class="badge rounded bg-label-primary p-1_5"><i
                                            class="icon-base ti tabler-ticket icon-md"></i></div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Available</h6>
                                        <small class="text-body-secondary">{{ $availableVehicles }}</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-4 align-items-center mb-lg-3 pb-1">
                                    <div class="badge rounded bg-label-info p-1_5"><i
                                            class="icon-base ti tabler-circle-check icon-md"></i></div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Rented</h6>
                                        <small class="text-body-secondary">{{ $rentedVehicles }}</small>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                            @php

                                $totalVehicles = $availableVehicles + $rentedVehicles;
                                if ($totalVehicles == 0) {
                                    $percentageAvailable = 0;
                                } else {
                                    $percentageAvailable = ($availableVehicles / $totalVehicles) * 100;
                                }
                            @endphp

                            <div class="progress-container">
                                <div class="circular-progress" id="progressCircle">
                                    <div class="inner-circle">
                                        <p class="progress-label">Available Vehicles</p>
                                        <p class="percentage-text" id="percentageText">0%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/ Support Tracker -->

            {{-- service report --}}
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-1">Company Vehicle Service Reports</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center g-md-8">
                            <div class="col-12 col-md-5 d-flex flex-column">
                                <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
                                    <h4 class="mb-0 service_total">${{ number_format($serviceTotal, 2) }}</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 ps-xl-8">
                                <div id="service-date-range">
                                    <input type="text" id="serviceDateRangePicker" class="form-control mx-2"
                                        placeholder="Select Date Range">
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-5 mt-5">
                            <div class="row gap-4 gap-sm-0">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-primary p-1">
                                            <i class="icon-base ti tabler-currency-dollar icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Received</h6>
                                    </div>
                                    <p class="my-2 text-center service_paid"><b>${{ number_format($servicePaid, 2) }}</b>
                                    </p>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-info p-1">
                                            <i class="icon-base ti tabler-chart-pie-2 icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Outstanding</h6>
                                    </div>
                                    <p class="my-2 text-center service_outstanding">
                                        <b>${{ number_format($serviceOutstanding, 2) }}</b>
                                    </p>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-danger p-1">
                                            <i class="icon-base ti tabler-brand-paypal icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Total</h6>
                                    </div>
                                    <p class="my-2 text-center service_total_amount">
                                        <b>${{ number_format($serviceTotal, 2) }}</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- other service report --}}
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-1">Other Service Reports</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center g-md-8">
                            <div class="col-12 col-md-5 d-flex flex-column">
                                <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
                                    <h4 class="mb-0 other_service_total">${{ number_format($otherServiceTotal, 2) }}</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 ps-xl-8">
                                <div id="other-service-date-range">
                                    <input type="text" id="otherServiceDateRangePicker" class="form-control mx-2"
                                        placeholder="Select Date Range">
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-5 mt-5">
                            <div class="row gap-4 gap-sm-0">
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-primary p-1">
                                            <i class="icon-base ti tabler-currency-dollar icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Received</h6>
                                    </div>
                                    <p class="my-2 text-center other_service_paid">
                                        <b>${{ number_format($otherServicePaid, 2) }}</b></p>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-info p-1">
                                            <i class="icon-base ti tabler-chart-pie-2 icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Outstanding</h6>
                                    </div>
                                    <p class="my-2 text-center other_service_outstanding">
                                        <b>${{ number_format($otherServiceOutstanding, 2) }}</b></p>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="badge rounded bg-label-danger p-1">
                                            <i class="icon-base ti tabler-brand-paypal icon-18px"></i>
                                        </div>
                                        <h6 class="mb-0 fw-normal">Total</h6>
                                    </div>
                                    <p class="my-2 text-center other_service_total_amount">
                                        <b>${{ number_format($otherServiceTotal, 2) }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/pages/cards-advance.css') }}" />
    <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>
    {{-- <script src="{{ asset('backend/vendor/js/template-customizer.js') }}"></script> --}}
    <script src="{{ asset('backend/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <style>
        .card .card-body p b,
        .total_from_date_range b {
            font-size: 18px;
            color: var(--bs-heading-color);
        }

        /* Container for Centering */
        .progress-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 250px;
        }

        /* Circular Progress Bar */
        .circular-progress {
            width: 200px;
            height: 200px;
            position: relative;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: conic-gradient(#ff6d00 0deg, #e0e7ff 0deg);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.5s linear;
        }

        /* Inner Circle */
        .circular-progress::before {
            content: '';
            position: absolute;
            width: 85%;
            height: 85%;
            background: #fff;
            border-radius: 50%;
            box-shadow: inset 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        /* Inner Content */
        .inner-circle {
            position: absolute;
            width: 85%;
            height: 85%;
            border-radius: 50%;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Percentage Text */
        .percentage-text {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        /* Label */
        .progress-label {
            font-size: 14px;
            color: #777;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('backend/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/dashboards-analytics.js') }}"></script> --}}
    <script src="{{ asset('backend/js/app-user-view-account.js') }}"></script>

    {{-- these 3 cdn are must and should for daterangepicker and a cdn in link tag --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the date range picker
            $('#dateRangePicker').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    format: 'YYYY-MM-DD',
                    cancelLabel: 'Clear'
                }
            });

            // Event handler when the date range is applied
            $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
                let startDate = picker.startDate.format('YYYY-MM-DD');
                let endDate = picker.endDate.format('YYYY-MM-DD');
                $(this).val(startDate + ' to ' + endDate); // Update input field

                // Call the AJAX function to update totals
                fetchRentData(startDate, endDate);
            });

            // Event handler when the date range is cleared
            $('#dateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val(''); // Clear input
                fetchRentData(); // Fetch default totals
            });

            // Function to fetch rent data via AJAX
            function fetchRentData(startDate = null, endDate = null) {
                $.ajax({
                    url: "{{ route('get.rent.amount') }}", // Make sure you define this route in web.php
                    method: "GET",
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        $('.total_from_date_range').text(`$${response.totalEarnings}`);
                        $('.outstanding-amount').text(`$${response.outstandingAmount}`);
                        $('.deposit-amount').text(`$${response.depositAmount}`);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching rent data:", error);
                    }
                });
            }

            // Fetch default totals on page load
            fetchRentData();
        });

        document.addEventListener("DOMContentLoaded", function() {
            var percentageTarget = @json($percentageAvailable); // This should be 88.52459016393442
            var progressCircle = document.getElementById("progressCircle");
            var percentageText = document.getElementById("percentageText");

            var currentPercentage = 0;
            var animationDuration = 1000; // 1 second
            var intervalTime = 20; // Speed of increment
            var increment = (percentageTarget / (animationDuration / intervalTime));

            var interval = setInterval(function() {
                if (currentPercentage < percentageTarget) {
                    currentPercentage += increment;

                    // Round to the nearest integer, but ensure it doesn't exceed the target
                    var roundedPercentage = Math.round(currentPercentage);
                    if (roundedPercentage > percentageTarget) {
                        roundedPercentage = Math.floor(
                            percentageTarget); // Ensure it doesn't exceed the target
                    }
                    percentageText.textContent = roundedPercentage + "%";

                    // Update progress bar
                    let gradientValue =
                        `conic-gradient(#ff6d00 ${currentPercentage}%, #e0e7ff ${currentPercentage}% 100%)`;
                    progressCircle.style.background = gradientValue;
                } else {
                    // Ensure the final value is exactly the target percentage, rounded correctly
                    percentageText.textContent = Math.round(percentageTarget) + "%";
                    let gradientValue =
                        `conic-gradient(#ff6d00 ${percentageTarget}%, #e0e7ff ${percentageTarget}% 100%)`;
                    progressCircle.style.background = gradientValue;
                    clearInterval(interval);
                }
            }, intervalTime);
        });

        // service statictics

        $(document).ready(function() {
            // Initialize date range picker for service bookings
            $('#serviceDateRangePicker').daterangepicker({
                opens: 'left',
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'MM/DD/YYYY'
                }
            });

            $('#serviceDateRangePicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
                fetchServiceData(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format(
                    'YYYY-MM-DD'));
            });

            $('#serviceDateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                fetchServiceData('', '');
            });

            function fetchServiceData(startDate, endDate) {
                $.ajax({
                    url: '/admin/dashboard/service-stats',
                    type: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        // Format numbers with 2 decimal places
                        $('.service_total').text('$' + parseFloat(response.total).toFixed(2));
                        $('.service_paid').text('$' + parseFloat(response.paid).toFixed(2));
                        $('.service_outstanding').text('$' + parseFloat(response.outstanding).toFixed(
                            2));
                        $('.service_total_amount b').text('$' + parseFloat(response.total).toFixed(2));
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        // other service statictics
        $(document).ready(function() {
            // Initialize date range picker for other service bookings
            $('#otherServiceDateRangePicker').daterangepicker({
                opens: 'left',
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'MM/DD/YYYY'
                }
            });

            $('#otherServiceDateRangePicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
                fetchOtherServiceData(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format(
                    'YYYY-MM-DD'));
            });

            $('#otherServiceDateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                fetchOtherServiceData('', '');
            });

            function fetchOtherServiceData(startDate, endDate) {
                $.ajax({
                    url: '/admin/dashboard/other-service-stats',
                    type: 'GET',
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        // Format numbers with 2 decimal places
                        $('.other_service_total').text('$' + parseFloat(response.total).toFixed(2));
                        $('.other_service_paid').text('$' + parseFloat(response.paid).toFixed(2));
                        $('.other_service_outstanding').text('$' + parseFloat(response.outstanding)
                            .toFixed(2));
                        $('.other_service_total_amount b').text('$' + parseFloat(response.total)
                            .toFixed(2));
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
