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

                        <form action="{{ route('services.other-vehicle.update', $serviceBooking->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div>
                                <!-- Basic Info -->
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="date" class="col-form-label">Date<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="date" id="date" class="form-control"
                                                    value="{{ old('date', $serviceBooking->date) }}">
                                                @error('date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="time_slot_id" class="col-form-label">Time Slot<span
                                                        class="text-danger">*</span></label>

                                                <!-- Input field to display the selected time slot -->
                                                <input type="text" id="time_slot_display" class="form-control"
                                                    value="{{ old('time_slot', $serviceBooking->timeSlot->time_slot ?? '') }}"
                                                    readonly>

                                                <!-- Select dropdown for time slots -->
                                                <select name="time_slot_id" id="time_slot_id" class="form-control"
                                                    style="display: none;">
                                                    <option value="">Select Time Slot</option>
                                                    @foreach ($timeslots as $slot)
                                                        <option value="{{ $slot->id }}"
                                                            {{ $slot->id == old('time_slot_id', $serviceBooking->time_slot_id) ? 'selected' : '' }}>
                                                            {{ $slot->time_slot }}
                                                        </option>
                                                    @endforeach
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
                                                        placeholder="Enter registration number"
                                                        value="{{ old('reg_no', $serviceBooking->reg_no) }}">
                                                </div>
                                                @error('reg_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Odometer Reading <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="odometer" id="odometer_{{ $serviceBooking->id }}"
                                                    class="form-control"
                                                    value="{{ old('odometer', $serviceBooking->odometer) }}">
                                                @error('odometer')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Service Interval <span
                                                        class="text-danger">*</span></label>
                                                <select name="service_interval" id="service_interval_{{ $serviceBooking->id }}"
                                                    class="form-control">
                                                    <option value="">Select Service Interval</option>
                                                    <option value="10000"
                                                        {{ old('service_interval', $serviceBooking->service_interval) == 10000 ? 'selected' : '' }}>
                                                        10K</option>
                                                    <option value="15000"
                                                        {{ old('service_interval', $serviceBooking->service_interval) == 15000 ? 'selected' : '' }}>
                                                        15K</option>
                                                </select>
                                                @error('service_interval')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Next Service Due <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="next_service_due"
                                                    id="next_service_due_{{ $serviceBooking->id }}" class="form-control"
                                                    value="{{ old('next_service_due', $serviceBooking->next_service_due) }}">
                                                @error('next_service_due')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Job <span class="text-danger">*</span></label>
                                                <select name="service_job_id[]" id="service_job_id" class="form-control select2"
                                                    multiple>
                                                    <option value="">Select Job</option>
                                                    @foreach ($serviceJobs as $job)
                                                        <option value="{{ $job->id }}" data-price="{{ $job->price }}"
                                                            {{ in_array($job->id, $selectedJobIds) ? 'selected' : '' }}>
                                                            {{ $job->name }}
                                                        </option>
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
                                                <input type="text" name="job_service_price"
                                                    id="job_service_price_{{ $serviceBooking->id }}" class="form-control"
                                                    readonly>
                                                @error('job_service_price')
                                                    <p class="text-danger font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="heads mb-3">
                                            <label class="">Miscellaneous</label>
                                            <button type="button" id="add_misc_edit" class="btn btn-success btn-sm">Add
                                                More</button>
                                        </div>
                                        <div id="misc_container_edit_{{ $serviceBooking->id }}">
                                            @if (is_array($miscellaneousItems) ? !empty($miscellaneousItems) : $miscellaneousItems->isNotEmpty())
                                                @foreach ($miscellaneousItems as $index => $misc)
                                                    <div class="row misc-row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <input type="text" name="misc_name[]" class="form-control"
                                                                    placeholder="Enter Name" value="{{ $misc->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3 d-flex position-relative">
                                                                <input type="text" name="misc_cost[]"
                                                                    class="form-control misc-cost" placeholder="Enter Price"
                                                                    value="{{ $misc->price }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3 d-flex position-relative">
                                                                <input type="text" name="misc_qty[]"
                                                                    class="form-control misc-qty" placeholder="Enter Quantity"
                                                                    value="{{ $misc->quantity }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3 d-flex position-relative">
                                                                <input type="text" name="misc_total_cost[]"
                                                                    class="form-control misc-total-cost"
                                                                    placeholder="Enter Total"
                                                                    value="{{ $misc->total_price }}" readonly>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm ms-2 remove-misc">X</button>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="misc_id[]" value="{{ $misc->id }}">
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No miscellaneous items found.</p>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <div class="">
                                                <label class="col-form-label">GST </label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="gst_toggle"
                                                        name="gst_toggle"
                                                        {{ old('gst_toggle', $serviceBooking->gst_toggle) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gst_toggle">Yes</label>
                                                </div>
                                                @error('gst_toggle')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="col-form-label">GST <span class="text-danger">*</span></label>
                                                <input type="text" name="gst_percentage" id="gst_rate"
                                                    class="form-control"
                                                    value="{{ old('gst_percentage', $serviceBooking->gst_percentage) }}">
                                                @error('gst_percentage')
                                                    <p class="text-danger font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="col-form-label">Total Amount <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="total" id="final_total" class="form-control" step="0.01"
                                                    value="{{ old('total', $serviceBooking->total) }}" readonly>
                                                @error('total')
                                                    <p class="text-danger font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Payment </label>
                                                <select name="payment" id="payment" class="form-control">
                                                    <option value="cash"
                                                        {{ old('payment', $serviceBooking->payment) == 'cash' ? 'selected' : '' }}>
                                                        Cash</option>
                                                    <option value="efpos"
                                                        {{ old('payment', $serviceBooking->payment) == 'efpos' ? 'selected' : '' }}>
                                                        EFPOS</option>
                                                    <option value="cc"
                                                        {{ old('payment', $serviceBooking->payment) == 'cc' ? 'selected' : '' }}>
                                                        CC</option>
                                                </select>
                                                @error('payment')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Total Paid Amount </label>
                                                <input type="number" name="total_paid" id="total_paid" class="form-control" step="0.01"
                                                    value="{{ old('total_paid', $serviceBooking->total_paid) }}">
                                                @error('total_paid')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Balance Due </label>
                                                <input type="number" name="balance_due" id="balance_due"
                                                    class="form-control" step="0.01"
                                                    value="{{ old('balance_due', $serviceBooking->balance_due) }}">
                                                @error('balance_due')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="abn" class="col-form-label">ABN/ACN</label>
                                                <input type="text" name="abn" id="abn" class="form-control"
                                                    value="{{ old('abn', $serviceBooking->abn) }}">
                                                @error('abn')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="make" class="col-form-label">Make</label>
                                                <input type="text" name="make" id="make" class="form-control"
                                                    value="{{ old('make', $serviceBooking->make) }}">
                                                @error('make')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="model" class="col-form-label">Model</label>
                                                <input type="text" name="model" id="model" class="form-control"
                                                    value="{{ old('model', $serviceBooking->model) }}">
                                                @error('model')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="purchase_date" class="col-form-label">Purchase Year</label>
                                                <input type="date" name="purchase_date" id="purchase_date"
                                                    class="form-control"
                                                    value="{{ old('purchase_date', $serviceBooking->purchase_date) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="vin" class="col-form-label">VIN</label>
                                                <input type="text" name="vin" id="vin" class="form-control"
                                                    value="{{ old('vin', $serviceBooking->vin) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="engine_no" class="col-form-label">Engine Number</label>
                                                <input type="text" name="engine_no" id="engine_no" class="form-control"
                                                    value="{{ old('engine_no', $serviceBooking->engine_no) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="color" class="col-form-label">Colour</label>
                                                <input type="text" name="color" id="color" class="form-control"
                                                    value="{{ old('color', $serviceBooking->color) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="mobile" class="col-form-label">Mobile</label>
                                                <input type="text" name="mobile" id="mobile" class="form-control"
                                                    value="{{ old('mobile', $serviceBooking->mobile) }}">
                                                @error('mobile')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="cust_name" class="col-form-label">Customer Name</label>
                                                <input type="text" name="cust_name" id="cust_name" class="form-control"
                                                    value="{{ old('cust_name', $serviceBooking->cust_name) }}">
                                                @error('cust_name')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="street" class="col-form-label">Street ( size must be 12 )</label>
                                                <textarea name="street" id="street" cols="30" rows="10">{{ old('street', $serviceBooking->street) }}</textarea>
                                                @error('street')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="state" class="col-form-label d-block">State</label>
                                                <select name="state" id="state" class="form-control">
                                                    <option value="VIC"
                                                        {{ old('state', $serviceBooking->state) == 'VIC' ? 'selected' : '' }}>
                                                        VIC
                                                    </option>
                                                    <option value="NSW"
                                                        {{ old('state', $serviceBooking->state) == 'NSW' ? 'selected' : '' }}>
                                                        NSW
                                                    </option>
                                                    <option value="QLD"
                                                        {{ old('state', $serviceBooking->state) == 'QLD' ? 'selected' : '' }}>
                                                        QLD
                                                    </option>
                                                    <option value="WA"
                                                        {{ old('state', $serviceBooking->state) == 'WA' ? 'selected' : '' }}>WA
                                                    </option>
                                                    <option value="SA"
                                                        {{ old('state', $serviceBooking->state) == 'SA' ? 'selected' : '' }}>SA
                                                    </option>
                                                    <option value="TAS"
                                                        {{ old('state', $serviceBooking->state) == 'TAS' ? 'selected' : '' }}>
                                                        TAS
                                                    </option>
                                                </select>
                                                @error('state')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="post_code" class="col-form-label">Post Code</label>
                                                <input type="text" name="post_code" id="post_code" class="form-control"
                                                    value="{{ old('post_code', $serviceBooking->post_code) }}">
                                                @error('post_code')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Basic Info -->
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <input type="hidden" name="repair_order_no"
                                    value="{{ $serviceBooking->repair_order_no ?? '' }}">
                                <a href="#" class="btn btn-light me-2" data-bs-dismiss="offcanvas">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
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
        .select2-container {
            width: 100% !important;
        }
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
        document.getElementById('date').addEventListener('change', function() {
            let selectedDate = this.value;
            let timeSlotDropdown = document.getElementById('time_slot_id');
            let timeSlotDisplay = document.getElementById('time_slot_display');

            if (selectedDate) {
                fetch(`/admin/get-time-slots-edit?date=${selectedDate}&_=${new Date().getTime()}`) // Prevent cache
                    .then(response => response.json())
                    .then(data => {
                        // Clear the current options
                        timeSlotDropdown.innerHTML = '<option value="">Select Time Slot</option>';

                        if (data.length > 0) {
                            data.forEach(slot => {
                                let option = document.createElement('option');
                                option.value = slot.id;
                                option.textContent = slot.time_slot;
                                timeSlotDropdown.appendChild(option);
                            });

                            // Show the dropdown and hide the input field
                            timeSlotDropdown.style.display = 'block';
                            timeSlotDisplay.style.display = 'none';
                        } else {
                            console.log('No time slots available for this date.');
                            // Reset the dropdown and show the input field
                            timeSlotDropdown.style.display = 'none';
                            timeSlotDisplay.style.display = 'block';
                            timeSlotDisplay.value = ''; // Clear the input field
                        }

                        // If the current time slot is not in the new options, reset it
                        if (!Array.from(timeSlotDropdown.options).some(option => option.value ==
                                timeSlotDropdown.value)) {
                            timeSlotDropdown.value = ''; // Reset if current value is not available
                        }
                    })
                    .catch(error => console.error('Error fetching time slots:', error));
            } else {
                timeSlotDropdown.innerHTML = '<option value="">Select Time Slot</option>';
                timeSlotDropdown.style.display = 'none';
                timeSlotDisplay.style.display = 'block';
            }
        });

        // Update the input field when a time slot is selected
        document.getElementById('time_slot_id').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let timeSlotDisplay = document.getElementById('time_slot_display');

            if (selectedOption.value) {
                timeSlotDisplay.value = selectedOption.text; // Set the input field to the selected time slot text
                timeSlotDisplay.style.display = 'block'; // Show the input field
                this.style.display = 'none'; // Hide the dropdown
            } else {
                timeSlotDisplay.value = ''; // Clear the input field if no option is selected
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("[id^='odometer_']").forEach((odometerInput) => {
                const bookingId = odometerInput.id.split("_")[1]; // Extract the booking ID dynamically
                const serviceIntervalSelect = document.getElementById(`service_interval_${bookingId}`);
                const nextServiceDueInput = document.getElementById(`next_service_due_${bookingId}`);

                function updateNextServiceDue() {
                    let odometerValue = parseInt(odometerInput.value) || 0;
                    let serviceIntervalValue = parseInt(serviceIntervalSelect.value) || 0;

                    if (odometerValue > 0 && serviceIntervalValue > 0) {
                        nextServiceDueInput.value = odometerValue + serviceIntervalValue;
                    } else {
                        nextServiceDueInput.value = "";
                    }
                }

                // Run the function once to pre-fill values on page load
                updateNextServiceDue();

                // Attach event listeners to detect changes
                odometerInput.addEventListener("input", updateNextServiceDue);
                serviceIntervalSelect.addEventListener("change", updateNextServiceDue);
            });
        });
        // $(document).ready(function() {
        //     // Initialize Select2
        //     $('.select2').select2();

        //     // Function to calculate total price
        //     function calculateTotalPrice() {
        //         let bookingId =
        //             '{{ $serviceBooking->id }}'; // Use the booking ID directly from the server-side variable
        //         let totalJobPrice = 0;

        //         // Calculate total job price
        //         $('#service_job_id option:selected').each(function() {
        //             totalJobPrice += parseFloat($(this).data('price')) || 0;
        //         });

        //         // Calculate total miscellaneous cost
        //         let totalMiscellaneous = 0;
        //         $('#misc_container_edit_{{ $serviceBooking->id }} .misc-total-cost').each(function() {
        //             totalMiscellaneous += parseFloat($(this).val()) || 0;
        //         });

        //         // Calculate subtotal
        //         let subTotal = totalJobPrice + totalMiscellaneous;

        //         // Calculate GST and final total
        //         let gstPercentage = parseFloat($('#gst_rate').val()) || 0;
        //         let gstAmount = (subTotal * gstPercentage) / 100;
        //         let finalTotal = subTotal + gstAmount;

        //         // Update job service price and final total fields
        //         $(`#job_service_price_${bookingId}`).val(totalJobPrice.toFixed(2));
        //         $('#final_total').val(finalTotal.toFixed(2));
        //     }

        //     // Trigger calculation on page load for pre-selected data
        //     calculateTotalPrice();

        //     // Event listener for job selection change
        //     $('#service_job_id').on('change', function() {
        //         calculateTotalPrice();
        //     });

        //     // Event listener for miscellaneous cost and quantity change
        //     $(document).on('input', '.misc-cost, .misc-qty', function() {
        //         let row = $(this).closest('.misc-row');
        //         let price = parseFloat(row.find('.misc-cost').val()) || 0;
        //         let qty = parseInt(row.find('.misc-qty').val()) || 0;
        //         let total = (price * qty).toFixed(2);
        //         row.find('.misc-total-cost').val(total);
        //         calculateTotalPrice();
        //     });

        //     // Event listener for GST change
        //     $('#gst_rate').on('input', function() {
        //         calculateTotalPrice();
        //     });

        //     // Add more miscellaneous items
        //     $('#add_misc_edit').on('click', function() {
        //         let bookingId = '{{ $serviceBooking->id }}';
        //         let miscContainer = $(`#misc_container_edit_${bookingId}`);

        //         let newMiscRow = `
        //             <div class="row misc-row">
        //                 <div class="col-md-4">
        //                     <div class="mb-3">
        //                         <input type="text" name="misc_name[]" class="form-control" placeholder="Enter Name">
        //                     </div>
        //                 </div>
        //                 <div class="col-md-3">
        //                     <div class="mb-3 d-flex position-relative">
        //                         <input type="text" name="misc_cost[]" class="form-control misc-cost" placeholder="Enter Price">
        //                     </div>
        //                 </div>
        //                 <div class="col-md-2">
        //                     <div class="mb-3 d-flex position-relative">
        //                         <input type="text" name="misc_qty[]" class="form-control misc-qty" placeholder="Enter Quantity">
        //                     </div>
        //                 </div>
        //                 <div class="col-md-3">
        //                     <div class="mb-3 d-flex position-relative">
        //                         <input type="text" name="misc_total_cost[]" class="form-control misc-total-cost" placeholder="Enter Total" readonly>
        //                         <button type="button" class="btn btn-danger btn-sm ms-2 remove-misc">X</button>
        //                     </div>
        //                 </div>
        //             </div>
        //         `;
        //         miscContainer.append(newMiscRow);
        //     });

        //     // Remove miscellaneous item
        //     $(document).on('click', '.remove-misc', function() {
        //         $(this).closest('.misc-row').remove();
        //         calculateTotalPrice();
        //     });
        // });

        $(document).ready(function() {
            // Initialize Select2
            $('.select2').select2();

            // Function to calculate total price
            function calculateTotalPrice() {
                let bookingId =
                '{{ $serviceBooking->id }}'; // Use the booking ID directly from the server-side variable
                let totalJobPrice = 0;

                // Calculate total job price
                $('#service_job_id option:selected').each(function() {
                    totalJobPrice += parseFloat($(this).data('price')) || 0;
                });

                // Calculate total miscellaneous cost
                let totalMiscellaneous = 0;
                $('#misc_container_edit_{{ $serviceBooking->id }} .misc-total-cost').each(function() {
                    totalMiscellaneous += parseFloat($(this).val()) || 0;
                });

                // Calculate subtotal
                let subTotal = totalJobPrice + totalMiscellaneous;

                // Check if GST toggle is enabled
                let gstToggle = $('#gst_toggle').is(':checked');
                let gstPercentage = gstToggle ? parseFloat($('#gst_rate').val()) || 0 :
                0; // Apply GST only if toggle is true
                let gstAmount = (subTotal * gstPercentage) / 100;
                let finalTotal = subTotal + gstAmount;

                // Get the total paid amount
                let totalPaid = parseFloat($('#total_paid').val()) || 0;

                // Calculate balance due
                let balanceDue = finalTotal - totalPaid;
                // if (balanceDue < 0) balanceDue = 0;

                // Update job service price, final total, and balance due fields
                $(`#job_service_price_${bookingId}`).val(totalJobPrice.toFixed(2));
                $('#final_total').val(finalTotal.toFixed(2));
                $('#balance_due').val(balanceDue.toFixed(2));
            }

            // Trigger calculation on page load for pre-selected data
            calculateTotalPrice();

            // Event listener for job selection change
            $('#service_job_id').on('change', function() {
                calculateTotalPrice();
            });

            // Event listener for miscellaneous cost and quantity change
            $(document).on('input', '.misc-cost, .misc-qty', function() {
                let row = $(this).closest('.misc-row');
                let price = parseFloat(row.find('.misc-cost').val()) || 0;
                let qty = parseInt(row.find('.misc-qty').val()) || 0;
                let total = (price * qty).toFixed(2);
                row.find('.misc-total-cost').val(total);
                calculateTotalPrice();
            });

            // Event listener for GST toggle change
            $('#gst_toggle').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#gst_rate').val('10'); // Set GST rate to 10% when toggle is enabled
                } else {
                    $('#gst_rate').val('0'); // Set GST rate to 0% when toggle is disabled
                }
                $('#gst_rate').prop('disabled', !$(this).is(':checked')); // Enable/disable GST rate input
                calculateTotalPrice(); // Recalculate total when toggle changes
            });

            // Event listener for GST rate change
            $('#gst_rate').on('input', function() {
                calculateTotalPrice();
            });
                  // Event listener for total paid amount change
                  $('#total_paid').on('input', function() {
                calculateTotalPrice();
            });

            // Add more miscellaneous items
            $('#add_misc_edit').on('click', function() {
                let bookingId = '{{ $serviceBooking->id }}';
                let miscContainer = $(`#misc_container_edit_${bookingId}`);

                let newMiscRow = `
            <div class="row misc-row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="text" name="misc_name[]" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 d-flex position-relative">
                        <input type="text" name="misc_cost[]" class="form-control misc-cost" placeholder="Enter Price">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3 d-flex position-relative">
                        <input type="text" name="misc_qty[]" class="form-control misc-qty" placeholder="Enter Quantity">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 d-flex position-relative">
                        <input type="text" name="misc_total_cost[]" class="form-control misc-total-cost" placeholder="Enter Total" readonly>
                        <button type="button" class="btn btn-danger btn-sm ms-2 remove-misc">X</button>
                    </div>
                </div>
            </div>
            `;
                miscContainer.append(newMiscRow);
            });

            // Remove miscellaneous item
            $(document).on('click', '.remove-misc', function() {
                $(this).closest('.misc-row').remove();
                calculateTotalPrice();
            });

            // Disable GST rate input and set to 0 if toggle is false on page load
            if (!$('#gst_toggle').is(':checked')) {
                $('#gst_rate').val('0').prop('disabled', true);
            }
        });
    </script>
@endsection
