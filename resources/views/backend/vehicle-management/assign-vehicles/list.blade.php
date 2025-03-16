@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-4">
                        <form id="searchForm" action="{{ route('assign.vehicle.list') }}" method="GET">
                            <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                            <input type="hidden" name="page" value="{{ request('page') }}">

                            <div class="icon-form mb-3 mb-sm-0">
                                <input type="text" id="searchInput" name="search" class="form-control"
                                    placeholder="Search Name or Reg No" value="{{ request('search') }}">
                            </div>
                        </form>

                    </div>
                    <div class="col-sm-4">
                        <form id="dateFilterForm" action="{{ route('assign.vehicle.list') }}" method="GET">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                            <input type="hidden" name="page" value="{{ request('page') }}">

                            <div class="icon-form mb-3 mb-sm-0 d-flex">
                                <input type="text" id="dateRangePicker" class="form-control"
                                    placeholder="Select Date Range" style="border-radius: 0px;">
                                <button type="button" id="clearDateRange" class="btn btn-secondary"
                                    style="border-radius: 0px;">Clear</button> <input type="hidden" id="startDate"
                                    name="start_date" value="{{ request('start_date') }}">
                                <input type="hidden" id="endDate" name="end_date" value="{{ request('end_date') }}">
                            </div>
                        </form>

                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <form method="GET" action="{{ route('assign.vehicle.list') }}">
                                <!-- Replace with your route -->
                                <div class="dropdown me-2">
                                    <select id="categoryFilter" name="category_id" class="form-select"
                                        onchange="this.form.submit()">
                                        <option value="">All Categories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                                <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                                <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                                <input type="hidden" name="page" value="{{ request('page') }}">
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Driver Name</th>
                                <th>Vehicle Reg No</th>
                                <th>Rent Start Date</th>
                                <th>Rent End Date</th>
                                <th>Total Price</th>
                                <th>Deposit</th>
                                <th>Outstanding</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($upcomingVehicles->isNotEmpty())
                                @foreach ($upcomingVehicles as $vehicle)
                                    <tr>
                                        <td>{{ $loop->iteration ?? '' }}</td>
                                        <td>{{ $vehicle->user->name ?? '' }}</td>
                                        <td>{{ $vehicle->reg_no ?? '' }}</td>
                                        <td>{{ $vehicle->rent_start_date ?? '' }}</td>
                                        <td>{{ $vehicle->rent_end_date ?? '' }}</td>
                                        <td>{{ $vehicle->total_price ?? '' }}</td>
                                        <td>{{ $vehicle->deposit_amount ?? '' }}</td>
                                        <td>{{ $vehicle->outstanding_amount ?? '' }}</td>
                                        <td>{{ $vehicle->payment_method ?? '' }}</td>

                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="customSwitch">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="icon-base ti tabler-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldemo8_{{ $vehicle->id }}">
                                                        <i class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit
                                                    </a>

                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_driver_{{ $vehicle->id }}">
                                                        <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center">No vehicles found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row m-3 justify-content-between">
                    <!-- Left Side: Per Page Selection -->
                    <div
                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                        <!-- Dropdown for Per Page Selection -->
                        <form method="GET" action="{{ route('assign.vehicle.list') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                            <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                            <label for="per_page" class="form-label me-2">Show:</label>
                            <select name="per_page" id="per_page" class="form-select d-inline-block w-auto"
                                onchange="this.form.submit()">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                            </select>
                        </form>
                    </div>

                    <!-- Right Side: Pagination -->
                    <div
                        class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto mt-0">
                        <div class="dt-paging">
                            @if ($perPage !== 'all')
                                {{ $upcomingVehicles->appends(request()->query())->links('pagination::bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- edit category modal --}}
    @if ($upcomingVehicles->isNotEmpty())
        @foreach ($upcomingVehicles as $vehicle)
            <div class="modal fade" id="modaldemo8_{{ $vehicle->id ?? '' }}" tabindex="-1"
                aria-labelledby="modaldemo8Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modaldemo8Label">Edit Category</h4>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="{{ route('assign.vehicle.update', $vehicle->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Registration Number Field -->
                                    <!-- User ID Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">User Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="user_name" class="form-control"
                                                value="{{ old('user_name', $vehicle->user->name ?? '') }}"
                                                placeholder="Enter user name" required readonly>
                                            @error('user_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <input type="hidden" name="user_id"
                                                value="{{ old('user_id', $vehicle->user->id ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Registration Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="reg_no" class="form-control"
                                                value="{{ old('reg_no', $vehicle->reg_no) }}"
                                                placeholder="Enter registration number" required>
                                            @error('reg_no')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Per week Price Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Cost Per Week <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="cost_per_week" class="form-control"
                                                value="{{ old('cost_per_week', $vehicle->cost_per_week) }}"
                                                placeholder="Enter Cost Per Week" required>
                                            @error('cost_per_week')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Rent Start Date Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Rent Start Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="rent_start_date"
                                                id="rentStartDate_{{ $vehicle->id }}" class="form-control"
                                                value="{{ old('rent_start_date', $vehicle->rent_start_date) }}" required>
                                            @error('rent_start_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Rent End Date Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Rent End Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="rent_end_date"
                                                id="rentEndDate_{{ $vehicle->id }}" class="form-control"
                                                value="{{ old('rent_end_date', $vehicle->rent_end_date) }}" required>
                                            @error('rent_end_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Total Days Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Total Days <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="{{ $vehicle->id }}" class="form-control"
                                                name="total_days"
                                                value="{{ old('total_days', $vehicle->total_days ?? '') }}" readonly>
                                            @error('total_days')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Deposit <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="deposit_amount" class="form-control"
                                                value="{{ old('deposit_amount', $vehicle->deposit_amount) }}" required>
                                            @error('deposit_amount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Outstanding <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="outstanding_amount" class="form-control"
                                                value="{{ old('outstanding_amount', $vehicle->outstanding_amount) }}" readonly
                                                required>
                                            @error('outstanding_amount')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Total Price Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Total Price <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="total_price" class="form-control"
                                                value="{{ old('total_price', $vehicle->total_price) }}" required readonly>
                                            @error('total_price')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Payment Method Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Payment Method <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="payment_method" class="form-control"
                                                value="{{ old('payment_method', $vehicle->payment_method) }}"
                                                placeholder="Enter payment method" required>
                                            @error('payment_method')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Buttons -->

                                <div class="modal-footer">
                                    <button type="submit" form="editCategoryForm_{{ $vehicle->id ?? '' }}"
                                        class="btn btn-primary">Send</button>
                                    <button class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
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

    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">


    <style>
        #dateInput {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
            background-color: #f9f9f9;
            color: #333;
            transition: border-color 0.3s ease;
        }

        /* Change border color on focus */
        #dateInput:focus {
            border-color: #4caf50;
            outline: none;
        }

        /* Style the Flatpickr calendar */
        .flatpickr-calendar {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
        }

        /* Style the months and days header */
        .flatpickr-month {
            background-color: #4caf50;
            color: white;
            border-radius: 8px 8px 0 0;
            padding: 10px;
            text-align: center;
        }

        /* Style the days of the week */
        .flatpickr-day {
            border-radius: 4px;
            /* padding: 8px; */
            text-align: center;
            cursor: pointer;
        }

        /* Highlight the selected day */
        .flatpickr-day.selected {
            background-color: #4caf50;
            color: white;
        }

        /* Hover effect for days */
        .flatpickr-day:hover {
            background-color: #e0e0e0;
        }

        /* Style the range selection */
        .flatpickr-day.inRange {
            background-color: #c8e6c9;
            color: #388e3c;
        }

        /* Style the calendar popup */
        .flatpickr-calendar {
            position: absolute !important;
            z-index: 9999;
        }

        .flatpickr-months .flatpickr-month {
            height: 45px;
        }

        .flatpickr-months .flatpickr-prev-month svg,
        .flatpickr-months .flatpickr-next-month svg {
            width: 10px;
            height: 10px;
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months,
        .flatpickr-current-month input.cur-year {
            font-size: 18px;
        }

        .flatpickr-current-month .flatpickr-monthDropdown-months .flatpickr-monthDropdown-month {
            font-size: 15px;
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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#dateRangePicker", {
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: [
                    "{{ request('start_date') }}",
                    "{{ request('end_date') }}"
                ].filter(Boolean), // Ensure only valid values are used
                onClose: function(selectedDates, dateStr) {
                    if (selectedDates.length === 2) {
                        let startDate = selectedDates[0].toLocaleDateString(
                            'en-CA'); // YYYY-MM-DD format
                        let endDate = selectedDates[1].toLocaleDateString('en-CA');

                        // Update hidden input values
                        document.getElementById("startDate").value = startDate;
                        document.getElementById("endDate").value = endDate;

                        // Update URL parameters without refreshing the page
                        let url = new URL(window.location.href);
                        url.searchParams.set("start_date", startDate);
                        url.searchParams.set("end_date", endDate);
                        window.location.href = url.toString(); // Reload with new parameters
                    }
                }
            });

            // Clear button functionality
            document.getElementById("clearDateRange").addEventListener("click", function() {
                // Clear the date range picker
                document.getElementById("dateRangePicker")._flatpickr.clear(); // Clear the flatpickr input

                // Clear hidden input values
                document.getElementById("startDate").value = '';
                document.getElementById("endDate").value = '';

                // Update URL parameters to remove date filters
                let url = new URL(window.location.href);
                url.searchParams.delete("start_date");
                url.searchParams.delete("end_date");
                window.location.href = url.toString(); // Reload with new parameters
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                const vehicleId = modal.id.split('_').pop(); // Extract vehicle ID from modal ID
                const costPerWeekInput = modal.querySelector('input[name="cost_per_week"]');
                const rentStartDateInput = modal.querySelector('input[name="rent_start_date"]');
                const rentEndDateInput = modal.querySelector('input[name="rent_end_date"]');
                const totalDaysInput = modal.querySelector('input[name="total_days"]');
                const totalPriceInput = modal.querySelector('input[name="total_price"]');
                const depositInput = modal.querySelector('input[name="deposit_amount"]');
                const outstandingInput = modal.querySelector('input[name="outstanding_amount"]');

                function calculateRent() {
                    const costPerWeek = parseFloat(costPerWeekInput.value) || 0;
                    const startDate = new Date(rentStartDateInput.value);
                    const endDate = new Date(rentEndDateInput.value);

                    if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime()) && endDate >= startDate) {
                        const totalDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                        totalDaysInput.value = totalDays;

                        const perDayPrice = costPerWeek / 7;
                        const totalPrice = Math.round(totalDays * perDayPrice);
                        totalPriceInput.value = totalPrice;

                        const deposit = parseFloat(depositInput.value) || 0;
                        const outstanding = Math.round(totalPrice - deposit);
                        outstandingInput.value = outstanding;
                    } else {
                        totalDaysInput.value = '';
                        totalPriceInput.value = '';
                        outstandingInput.value = '';
                    }
                }

                function updateOutstanding() {
                    const totalPrice = parseFloat(totalPriceInput.value) || 0;
                    const deposit = parseFloat(depositInput.value) || 0;
                    outstandingInput.value = Math.round(totalPrice - deposit);
                }

                rentStartDateInput.addEventListener('change', calculateRent);
                rentEndDateInput.addEventListener('change', calculateRent);
                costPerWeekInput.addEventListener('input', calculateRent);
                depositInput.addEventListener('input', updateOutstanding);
            });
        });
    </script>
@endsection
