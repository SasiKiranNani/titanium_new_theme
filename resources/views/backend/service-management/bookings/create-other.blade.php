@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 class="card-header">Create New Booking</h5>
                    </div>
                    <div class="col-sm-8 card-header">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <a href="{{ route('services.other-vehicle') }}" class="btn create-new btn-primary">
                                <span>
                                    <span class="d-flex align-items-center gap-2">
                                        <i class="icon-base ti tabler-arrow-left icon-sm"></i>
                                        <span class="d-none d-sm-inline-block">Back</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class=" mb-6">

                        <form action="{{ route('services.other-vehicle.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <!-- Basic Info -->
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="date" class="col-form-label">Date<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="date" id="date" class="form-control">
                                                @error('schedule_time_slot_id')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="time_slot_id" class="col-form-label">Time Slot<span
                                                        class="text-danger">*</span></label>
                                                <select name="time_slot_id" id="time_slot_id" class="form-control">
                                                    <option value="">Select Time Slot</option>
                                                </select>
                                                @error('time_slot_id')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number <span
                                                        class="text-danger">*</span></label>
                                                <div class="custom-dropdown mt-2">
                                                    <input type="text" name="reg_no" id="reg_no" class="form-control"
                                                        placeholder="Enter registration number">
                                                </div>
                                                @error('reg_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="odometer" class="col-form-label">Odometer Reading <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="odometer" id="odometer" class="form-control">
                                                @error('odometer')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="service_interval" class="col-form-label">Service Interval <span
                                                        class="text-danger">*</span></label>
                                                <select name="service_interval" id="service_interval" class="form-control">
                                                    <option value="">Select Service Interval</option>
                                                    <option value="10000">10K</option>
                                                    <option value="15000">15K</option>
                                                </select>
                                                @error('next_service_due')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="next_service_due" class="col-form-label">Next Service Due <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="next_service_due" id="next_service_due"
                                                    class="form-control">
                                                @error('next_service_due')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Job <span class="text-danger">*</span></label>
                                                <select name="service_job_id[]" id="service_job_id"
                                                    class="form-control select2" multiple>
                                                    <option value="">Select Job</option>
                                                    @foreach ($serviceJobs as $job)
                                                        <option value="{{ $job->id }}"
                                                            data-price="{{ $job->price }}">
                                                            {{ $job->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_job_id')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Job Price <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="service_job_price" id="service_job_price"
                                                    class="form-control">
                                                @error('service_job_price')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="heads mb-3">
                                            <label class="">Miscellaneous</label>
                                            <button type="button" id="add_miscellaneous_store"
                                                class="btn btn-success btn-sm">Add
                                                More</button>
                                        </div>
                                        <div id="miscellaneous_container_store">
                                            <div class="row misc-row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <input type="text" name="miscellaneous_name[]"
                                                            class="form-control" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3 d-flex position-relative">
                                                        <input type="text" name="miscellaneous_price[]"
                                                            class="form-control misc-price" placeholder="Enter Price">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-3 d-flex position-relative">
                                                        <input type="text" name="miscellaneous_quantity[]"
                                                            class="form-control misc-quantity"
                                                            placeholder="Enter Quantity">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3 d-flex position-relative">
                                                        <input type="text" name="miscellaneous_total_price[]"
                                                            class="form-control misc-total" placeholder="Enter Total"
                                                            readonly>
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm ms-2 remove-misc">X</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">GST </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="gst_toggle"
                                                        name="gst_toggle" checked>
                                                    <label class="form-check-label" for="gst_toggle">GST Applied</label>
                                                </div>
                                                @error('gst_toggle')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">GST Percentage </label>
                                                <input type="text" name="gst_percentage" id="gst_percentage"
                                                    class="form-control" value="10"> <!-- Default value set to 10 -->
                                                @error('gst_percentage')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Total Amount </label>
                                                <input type="text" name="total" id="total" step="0.01"
                                                    class="form-control">
                                                @error('total')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Payment </label>
                                                <select name="payment" id="payment" class="form-control">
                                                    <option value="cash">Cash</option>
                                                    <option value="efpos">EFPOS</option>
                                                    <option value="cc">Credit Card</option>
                                                    <option value="bank_transfer">Bank Transfer</option>
                                                </select>
                                                @error('payment')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Total Paid Amount </label>
                                                <input type="number" name="total_paid" id="total_paid" step="0.01"
                                                    class="form-control">
                                                @error('total_paid')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Balance Due </label>
                                                <input type="number" name="balance_due" id="balance_due" step="0.01"
                                                    class="form-control">
                                                @error('balance_due')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="abn" class="col-form-label">ABN/ACN</label>
                                                <input type="text" name="abn" id="abn"
                                                    class="form-control">
                                                @error('abn')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="make" class="col-form-label">Make</label>
                                                <input type="text" name="make" id="make"
                                                    class="form-control">
                                                @error('make')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="model" class="col-form-label">Model</label>
                                                <input type="text" name="model" id="model"
                                                    class="form-control">
                                                @error('model')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="purchase_date" class="col-form-label">Year</label>
                                                <input type="text" name="purchase_date" id="purchase_date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="vin" class="col-form-label">VIN</label>
                                                <input type="text" name="vin" id="vin"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="engine_no" class="col-form-label">Engine Number</label>
                                                <input type="text" name="engine_no" id="engine_no"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="color" class="col-form-label">Colour</label>
                                                <input type="text" name="color" id="color"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="mobile" class="col-form-label">Mobile</label>
                                                <input type="text" name="mobile" id="mobile"
                                                    class="form-control">
                                                @error('mobile')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="cust_name" class="col-form-label">Customer Name</label>
                                                <input type="text" name="cust_name" id="cust_name"
                                                    class="form-control">
                                                @error('cust_name')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="street" class="col-form-label">Street</label>
                                                <textarea name="street" id="street" cols="30" rows="10"></textarea>
                                                @error('street')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="col-form-label d-block">State</label>
                                                <select name="state" id="state" class="form-control">
                                                    <option value="VIC">VIC</option>
                                                    <option value="NSW">NSW</option>
                                                    <option value="QLD">QLD</option>
                                                    <option value="WA">WA</option>
                                                    <option value="SA">SA</option>
                                                    <option value="TAS">TAS</option>
                                                </select>
                                                @error('state')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="post_code" class="col-form-label">Post Code</label>
                                                <input type="text" name="post_code" id="post_code"
                                                    class="form-control">
                                                @error('post_code')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
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

    <!-- Include Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Include Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        .custom-dropdown {
            position: relative;
            width: 100%;
        }

        #search_reg_no {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        #options {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 200px;
            /* Restrict height and make it scrollable */
            overflow-y: auto;
            background: #fff;
            border: 1px solid #ccc;
            border-top: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .option {
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            border-bottom: 1px solid #eee;
            transition: background 0.2s ease-in-out;
        }

        .option:last-child {
            border-bottom: none;
        }

        .option:hover {
            background: #f4f4f4;
        }

        @media (max-width: 768px) {
            #search_reg_no {
                font-size: 14px;
            }

            .option {
                font-size: 14px;
                padding: 8px;
            }
        }

        .select2-selection__choice {
            background-color: #E41F07 !important;
            /* Blue background */
            color: white !important;
            /* White text */
            border-radius: 5px;
            /* Rounded corners */
            padding: 5px 10px;
            font-weight: bold;
            font-size: 12px;
        }

        /* Close (x) button style */
        .select2-selection__choice__remove {
            color: white !important;
            margin-left: 5px;
            font-weight: bold;
        }

        /* Hover effect for close button */
        .select2-selection__choice__remove:hover {
            color: #ff4d4d !important;
            /* Red on hover */
        }

        /* Style for dropdown options */
        .select2-results__option {
            padding: 10px;
            font-size: 14px;
        }

        /* Hover effect for dropdown items */
        .select2-results__option--highlighted {
            background-color: #E41F07 !important;
            color: white !important;
        }

        selection__choice,
        .select2-container--default .select2-selection--multiple .select2-selection__choice,
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: #E41F07;
            border-color: #F6F6F6;
            color: white !important;
            border-radius: 5px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #ccc !important;
            outline: 0;
        }

        .form-control {
            min-height: 35px;
        }

        .remove-misc,
        .remove-miscellaneous-db,
        .remove-misc-db {
            width: 40px;
            padding: 0rem 0rem;
            margin: 0px;
            position: absolute;
            top: 0px;
            right: 0px;
            height: 39px;
            font-size: 15px;
            border-radius: 0px;
            font-weight: 600;
        }

        #add_miscellaneous_store {
            /* position: absolute; */
            top: 0px;
            right: 0px;
            height: 40px;
            border-radius: 0px;
        }

        .heads {
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: space-between;
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        // for daterange filtering
        $(document).ready(function() {
            // Initialize daterangepicker
            $('#dateRangePicker').daterangepicker({
                autoUpdateInput: false, // Prevents automatic input update
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            // Event handler for when the date range is applied
            $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format(
                    'YYYY-MM-DD')); // Update input display
                $('#startDate').val(picker.startDate.format('YYYY-MM-DD')); // Set hidden start date
                $('#endDate').val(picker.endDate.format('YYYY-MM-DD')); // Set hidden end date
                $('#filterForm').submit(); // Submit the form
            });

            // Event handler for when the date range is cleared
            $('#dateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val(''); // Clear input display
                $('#startDate').val(''); // Clear hidden start date
                $('#endDate').val(''); // Clear hidden end date
                $('#filterForm').submit(); // Submit the form
            });

            // Automatically submit the form when user presses Enter in the search field
            $('#searchInput').on('keypress', function(e) {
                if (e.which == 13) { // Enter key
                    e.preventDefault(); // Prevent default form submission behavior
                    $('#filterForm').submit(); // Submit the form
                }
            });

            // Automatically submit the form when the user clicks outside the search input field
            $('#searchInput').on('blur', function() {
                $('#filterForm').submit();
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            initializeCKEditor('street'); // Remove the '#' since CKEditor uses the `name` or `id` directly
        });

        function initializeCKEditor(id) {
            CKEDITOR.replace(id, {
                extraPlugins: 'htmlwriter, font, colorbutton',
                allowedContent: true,
                versionCheck: false,
                format_tags: 'p;h1;h2;h3;h4;h5;h6', // Allow heading tags from h1-h6
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let dateInput = document.getElementById('date');
            let currentDate = new Date();
            let pastThreeMonthsDate = new Date();

            // Calculate the date 3 months ago
            pastThreeMonthsDate.setMonth(currentDate.getMonth() - 3);

            // Set the minimum date to 3 months ago (disable dates before this)
            dateInput.min = pastThreeMonthsDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD

            // Add event listener for date change
            dateInput.addEventListener('change', function() {
                let selectedDate = new Date(this.value);
                let timeSlotDropdown = document.getElementById('time_slot_id');

                if (selectedDate) {
                    fetch(
                            `/admin/get-time-slots?date=${this.value}&_=${new Date().getTime()}`
                        ) // Prevent cache
                        .then(response => response.json())
                        .then(data => {
                            timeSlotDropdown.innerHTML = '<option value="">Select Time Slot</option>';
                            if (data.length > 0) {
                                data.forEach(slot => {
                                    let option = document.createElement('option');
                                    option.value = slot.id;
                                    option.textContent = slot.time_slot;
                                    timeSlotDropdown.appendChild(option);
                                });
                            } else {
                                console.log('No time slots available for this date.');
                            }
                        })
                        .catch(error => console.error('Error fetching time slots:', error));
                } else {
                    timeSlotDropdown.innerHTML = '<option value="">Select Time Slot</option>';
                }
            });
        });

        function calculateNextServiceDue() {
            let odometer = parseInt(document.getElementById('odometer').value) || 0;
            let serviceInterval = parseInt(document.getElementById('service_interval').value) || 0;
            let nextServiceDue = odometer + serviceInterval;

            document.getElementById('next_service_due').value = nextServiceDue ? nextServiceDue : '';
        }
        document.getElementById('odometer').addEventListener('input', calculateNextServiceDue);
        document.getElementById('service_interval').addEventListener('change', calculateNextServiceDue);

        // $(document).ready(function() {
        //     // Initialize Select2 for the job selection dropdown
        //     $('#service_job_id').select2({
        //         placeholder: "Select Job",
        //         closeOnSelect: false
        //     });

        //     // Update price when a job is selected
        //     $('#service_job_id').on('change', function() {
        //         let selectedPrices = [];
        //         let totalJobPrice = 0;

        //         $('#service_job_id option:selected').each(function() {
        //             let price = parseFloat($(this).data('price')) ||
        //                 0; // Get price from data attribute
        //             selectedPrices.push(price.toFixed(2)); // Store individual job prices
        //             totalJobPrice += price; // Sum up job prices
        //         });

        //         // Display selected job prices individually
        //         $('#service_job_price').val(selectedPrices.length ? selectedPrices.join(', ') : '');
        //         updateTotal(); // Update final total including miscellaneous and GST
        //     });

        //     // Add More Functionality for Miscellaneous Items
        //     $("#add_miscellaneous_store").click(function() {
        //         let newRow = `
    //             <div class="row misc-row">
    //                 <div class="col-md-4">
    //                     <div class="mb-3">
    //                         <input type="text" name="miscellaneous_name[]" class="form-control" placeholder="Enter Name">
    //                     </div>
    //                 </div>
    //                 <div class="col-md-3">
    //                     <div class="mb-3 d-flex position-relative">
    //                         <input type="text" name="miscellaneous_price[]" class="form-control misc-price" placeholder="Enter Price">
    //                     </div>
    //                 </div>
    //                 <div class="col-md-2">
    //                     <div class="mb-3 d-flex position-relative">
    //                         <input type="text" name="miscellaneous_quantity[]" class="form-control misc-quantity" placeholder="Enter Quantity">
    //                     </div>
    //                 </div>
    //                 <div class="col-md-3">
    //                     <div class="mb-3 d-flex position-relative">
    //                         <input type="text" name="miscellaneous_total_price[]" class="form-control misc-total" placeholder="Enter Total" readonly>
    //                         <button type="button" class="btn btn-danger btn-sm ms-2 remove-misc">X</button>
    //                     </div>
    //                 </div>
    //             </div>
    //             `;
        //         $("#miscellaneous_container_store").append(newRow);
        //     });

        //     // Remove Miscellaneous Row
        //     $(document).on("click", ".remove-misc", function() {
        //         $(this).closest(".misc-row").remove();
        //         updateTotal(); // Update total after removal
        //     });

        //     // Calculate miscellaneous total dynamically when price/quantity changes
        //     $(document).on("input", ".misc-price, .misc-quantity", function() {
        //         let row = $(this).closest(".misc-row");
        //         let price = parseFloat(row.find(".misc-price").val()) || 0;
        //         let quantity = parseFloat(row.find(".misc-quantity").val()) || 0;
        //         let total = price * quantity;
        //         row.find(".misc-total").val(total.toFixed(2));
        //         updateTotal();
        //     });

        //     // GST and Final Total Calculation
        //     $("#gst_percentage").on("input", function() {
        //         updateTotal();
        //     });

        //     function updateTotal() {
        //         let totalJobPrice = 0;

        //         $('#service_job_id option:selected').each(function() {
        //             totalJobPrice += parseFloat($(this).data('price')) || 0;
        //         });

        //         let miscellaneousTotal = 0;
        //         $(".misc-total").each(function() {
        //             miscellaneousTotal += parseFloat($(this).val()) || 0;
        //         });

        //         let subTotal = totalJobPrice + miscellaneousTotal;
        //         let gstPercentage = parseFloat($("#gst_percentage").val()) || 0;
        //         let gstAmount = (subTotal * gstPercentage) / 100;
        //         let finalTotal = subTotal + gstAmount;

        //         $("#total").val(finalTotal.toFixed(2));
        //     }
        // });
        $(document).ready(function() {
            // Initialize Select2 for the job selection dropdown
            $('#service_job_id').select2({
                placeholder: "Select Job",
                closeOnSelect: false
            });

            // Update price when a job is selected
            $('#service_job_id').on('change', function() {
                let selectedPrices = [];
                let totalJobPrice = 0;

                $('#service_job_id option:selected').each(function() {
                    let price = parseFloat($(this).data('price')) ||
                        0; // Get price from data attribute
                    selectedPrices.push(price.toFixed(2)); // Store individual job prices
                    totalJobPrice += price; // Sum up job prices
                });

                // Display selected job prices individually
                $('#service_job_price').val(selectedPrices.length ? selectedPrices.join(', ') : '');
                updateTotal(); // Update final total including miscellaneous and GST
            });

            // Add More Functionality for Miscellaneous Items
            $("#add_miscellaneous_store").click(function() {
                let newRow = `
            <div class="row misc-row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="text" name="miscellaneous_name[]" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 d-flex position-relative">
                        <input type="text" name="miscellaneous_price[]" class="form-control misc-price" placeholder="Enter Price">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3 d-flex position-relative">
                        <input type="text" name="miscellaneous_quantity[]" class="form-control misc-quantity" placeholder="Enter Quantity">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 d-flex position-relative">
                        <input type="text" name="miscellaneous_total_price[]" class="form-control misc-total" placeholder="Enter Total" readonly>
                        <button type="button" class="btn btn-danger btn-sm ms-2 remove-misc">X</button>
                    </div>
                </div>
            </div>
            `;
                $("#miscellaneous_container_store").append(newRow);
            });

            // Remove Miscellaneous Row
            $(document).on("click", ".remove-misc", function() {
                $(this).closest(".misc-row").remove();
                updateTotal(); // Update total after removal
            });

            // Calculate miscellaneous total dynamically when price/quantity changes
            $(document).on("input", ".misc-price, .misc-quantity", function() {
                let row = $(this).closest(".misc-row");
                let price = parseFloat(row.find(".misc-price").val()) || 0;
                let quantity = parseFloat(row.find(".misc-quantity").val()) || 0;
                let total = price * quantity;
                row.find(".misc-total").val(total.toFixed(2));
                updateTotal();
            });

            // GST Toggle Change Event
            $("#gst_toggle").on("change", function() {
                if ($(this).is(":checked")) {
                    $("#gst_percentage").val("10"); // Set GST to 10% when toggle is enabled
                } else {
                    $("#gst_percentage").val("0"); // Set GST to 0% when toggle is disabled
                }
                updateTotal(); // Update the total amount
            });

            // GST Percentage and Final Total Calculation
            $("#gst_percentage").on("input", function() {
                updateTotal();
            });
            // Subtract total paid and update balance due
            $("#total_paid").on("input", function() {
                updateTotal();
            });

            function updateTotal() {
                let totalJobPrice = 0;

                $('#service_job_id option:selected').each(function() {
                    totalJobPrice += parseFloat($(this).data('price')) || 0;
                });

                let miscellaneousTotal = 0;
                $(".misc-total").each(function() {
                    miscellaneousTotal += parseFloat($(this).val()) || 0;
                });

                let subTotal = totalJobPrice + miscellaneousTotal;
                let gstPercentage = parseFloat($("#gst_percentage").val()) || 0;
                let gstAmount = 0;

                // Check if GST toggle is enabled
                if ($("#gst_toggle").is(":checked")) {
                    gstAmount = (subTotal * gstPercentage) / 100;
                }

                let finalTotal = subTotal + gstAmount;

                $("#total").val(finalTotal.toFixed(2));

                // Subtract total paid from final total
                let totalPaid = parseFloat($("#total_paid").val()) || 0;
                let balanceDue = finalTotal - totalPaid;
                $("#balance_due").val(balanceDue.toFixed(2));
            }
        });
    </script>
@endsection
