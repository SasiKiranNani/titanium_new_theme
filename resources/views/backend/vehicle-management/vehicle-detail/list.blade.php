@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-4">
                        <!-- Search Form -->
                        <form id="searchForm" action="{{ route('vehicle') }}" method="GET">
                            <div class="icon-form mb-3 mb-sm-0">
                                <input type="text" id="searchInput" name="search" class="form-control"
                                    value="{{ request('search') }}" placeholder="Search Reg No., Make, Model, Company, ABN">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <div class="dropdown me-2">
                                <select id="categoryFilter" class="form-select">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sorting Dropdown -->
                            <div class="dropdown me-2">
                                <select id="sortOrder" class="form-select">
                                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                        Ascending</option>
                                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                        Descending</option>
                                </select>
                            </div>

                            <!-- Rental Status Dropdown -->
                            <div class="dropdown me-2">
                                <select id="rentedFilter" class="form-select">
                                    <option value="">All Vehicles</option>
                                    <option value="rented" {{ request('rented') == 'rented' ? 'selected' : '' }}>Rented
                                    </option>
                                    <option value="not_rented" {{ request('rented') == 'not_rented' ? 'selected' : '' }}>
                                        Not
                                        Rented</option>
                                </select>
                            </div>

                            @can('Create Vehicles')
                                <a href="{{ route('vehicle.create') }}" class="btn create-new btn-primary">
                                    <span>
                                        <span class="d-flex align-items-center gap-2">
                                            <i class="icon-base ti tabler-plus icon-sm"></i>
                                            <span class="d-none d-sm-inline-block">Add Vehicle</span>
                                        </span>
                                    </span>
                                </a>
                            @endcan

                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th> Make/Model/Color</th>
                                <th>Reg No.</th>
                                <th>year</th>
                                <th>Fuel Type</th>
                                <th>VIN</th>
                                <th>Rented</th>
                                @canany(['Vehicles Details', 'Edit Vehicles', 'Delete Vehicles', 'Share From Vehicle'])
                                    <th>Actions</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($vehicles->isNotEmpty())
                                @foreach ($vehicles as $vehicle)
                                    <tr class="table-default">
                                        <td>{{ request('sort_order') == 'desc' ? $vehicles->total() - (($vehicles->currentPage() - 1) * $vehicles->perPage() + $loop->iteration - 1) : ($vehicles->currentPage() - 1) * $vehicles->perPage() + $loop->iteration }}
                                        </td>
                                        <td>
                                            @if ($vehicle->thumbnail)
                                                <img class="vehicle_img"
                                                    src="{{ asset('vehicles/thumbnails/' . $vehicle->thumbnail) }}"
                                                    alt="{{ $vehicle->thumbnail_alt }}">
                                            @else
                                                No Thumbnail Image
                                            @endif
                                        </td>
                                        <td>{{ $vehicle->make . ' / ' . $vehicle->model . ($vehicle->color ? ' / ' . ucfirst(strtolower($vehicle->color)) : '') }}
                                        </td>
                                        <td>{{ $vehicle->reg_no }}</td>
                                        <td>{{ $vehicle->purchase_date ? \Carbon\Carbon::parse($vehicle->purchase_date)->format('Y') : '' }}
                                        </td>
                                        <td>{{ $vehicle->fuel_type }}</td>
                                        <td>{{ $vehicle->vin }}</td>
                                        <td>
                                            {{-- commented code related in the models assignvehicle and vehicle detiol --}}
                                            {{-- <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="rentedToggle_{{ $vehicle->id }}"
                                                    {{ $vehicle->isCurrentlyRented() ? 'checked' : '' }}>
                                            </div> --}}

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="rentedToggle_{{ $vehicle->id }}"
                                                    {{ $vehicle->rented ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        @canany([
                                            'Vehicles Details',
                                            'Edit Vehicles',
                                            'Delete Vehicles',
                                            'Share From
                                            Vehicle',
                                            ])
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="icon-base ti tabler-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        @can('Vehicles Details')
                                                            <a class="dropdown-item waves-effect"
                                                                href="{{ route('vehicle.details.id', ['id' => $vehicle->id]) }}"><i
                                                                    class="icon-base ti tabler-info-circle me-1 text-blue"></i>
                                                                Details</a>
                                                        @endcan


                                                        @can('Edit Vehicles')
                                                            <a class="dropdown-item waves-effect"
                                                                href="{{ route('vehicle.edit', $vehicle->id) }}"><i
                                                                    class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit
                                                            </a>
                                                        @endcan

                                                        @can('Delete Vehicles')
                                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_vehicle_{{ $vehicle->id }}">
                                                                <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
                                                            </a>
                                                        @endcan

                                                        @can('Share From Vehicle')
                                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modaldemo8_{{ $vehicle->id }}">
                                                                <i class="icon-base ti tabler-mail me-1 text-blue"></i> Share Via
                                                                Mail
                                                            </a>
                                                        @endcan

                                                    </div>
                                                </div>
                                            </td>
                                        @endcanany

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
                <div class="row m-3 justify-content-between align-items-center">
                    <!-- Left Side: Per Page Selection -->
                    <div
                        class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto mt-0">
                        {{-- <div class="dt-info" aria-live="polite" id="DataTables_Table_0_info" role="status">
                            Showing 1 to 10 of 100 entries
                        </div> --}}

                        <!-- Dropdown for Per Page Selection -->
                        <form method="GET" action="{{ route('vehicle') }}" class="ms-3">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="page" value="{{ request('page') }}">
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
                            @if (isset($perPage) && $perPage !== 'all')
                                <div class="pagination-container">
                                    {{ $vehicles->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
                                </div>
                            @endif
                            <!-- Add this after the bootstrap pagination -->
                            @if (isset($perPage) && $perPage !== 'all')
                                <div class="simple-tailwind-pagination hidden">
                                    {{ $vehicles->appends(request()->query())->onEachSide(1)->links('pagination::simple-tailwind') }}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    {{-- delete modal --}}

    @foreach ($vehicles as $vehicle)
        <!-- Delete User Modal -->
        <div class="modal fade" id="delete_vehicle_{{ $vehicle->id }}" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="icon d-flex justify-content-center">
                                <div class="avatar avatar-xl bg-danger-light rounded-circle mb-3">
                                    <i class="icon-base ti tabler-trash me-1 fs-36 text-danger"></i>
                                </div>
                            </div>
                            <h4 class="mb-2">Remove Vehicle?</h4>
                            <p class="mb-0">Are you sure you want to remove this
                                {{ $vehicle->make . ' ' . $vehicle->model . ' of REG No. ' . $vehicle->reg_no }}?</p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('vehicle.delete', $vehicle->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes, Delete it</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- share modal --}}
    @if ($vehicles->isNotEmpty())
        @foreach ($vehicles as $vehicle)
            <div class="modal fade" id="modaldemo8_{{ $vehicle->id ?? '' }}" tabindex="-1"
                aria-labelledby="modaldemo8Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modaldemo8Label">Share Vehicle Details</h4>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="shareVehicleForm_{{ $vehicle->id ?? '' }}" method="POST"
                            action="{{ route('vehicle.share', ['id' => $vehicle->id ?? '']) }}">
                            @csrf
                            <div class="modal-body text-start">

                                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id ?? '' }}">

                                <!-- Vehicle Registration Number Dropdown -->
                                <div class="mb-3">
                                    <label for="reg_no" class="form-label">Vehicle Registration
                                        Number</label>
                                    <input type="text" name="reg_no" id="reg_no" class="form-control"
                                        value="{{ $vehicle->reg_no ?? '' }}" readonly>
                                </div>

                                <!-- New Fields Based on JavaScript -->
                                <div class="mb-3">
                                    <label for="cost_per_week" class="form-label">Cost Per Week</label>
                                    <input type="number" class="form-control" id="cost_per_week" name="cost_per_week"
                                        value="{{ $vehicle->cost_per_week }}">
                                </div>

                                <div class="mb-3">
                                    <label for="cost_per_week" class="form-label">Deposit Amount</label>
                                    <input type="number" class="form-control" id="deposit_amount"
                                        name="deposit_amount">
                                </div>

                                <div class="mb-3">
                                    <label for="odometer" class="form-label">Odometer</label>
                                    <input type="number" class="form-control" id="odometer" name="odometer">
                                </div>

                                <div class="row">
                                    <!-- Count and Time Unit -->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="count" class="form-label">Duration</label>
                                            <input type="number" class="form-control" id="count" name="count"
                                                min="1" required>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="time_unit" class="form-label">Duration</label>
                                            <select class="form-select" id="time_unit" name="time_unit" required>
                                                <option value="" disabled selected>Select
                                                    Duration
                                                </option>
                                                <option value="days">Days</option>
                                                <option value="weeks">Weeks</option>
                                                <option value="months">Months</option>
                                                <option value="years">Years</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="rent_start_date" class="form-label">Rent Start Date</label>
                                    <input type="date" class="form-control" id="rent_start_date"
                                        name="rent_start_date">
                                </div>
                                <div class="mb-3">
                                    <label for="rent_end_date" class="form-label">Rent End Date</label>
                                    <input type="date" class="form-control" id="rent_end_date" name="rent_end_date">
                                </div>

                                <!-- Email Address Field -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email ?? '' }}" required>
                                </div>
                                <input type="hidden" class="form-control" id="total_days" name="total_days"
                                    value="" readonly>
                                <input type="hidden" class="form-control" id="total_price" name="total_price"
                                    value="" readonly>
                                <input type="hidden" name="company_name" id="company_name"
                                    value="{{ $vehicle->company_name }}" readonly>

                                <p class="text-muted mb-0">Please enter the email address to which you want to
                                    share the vehicle details.</p>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" form="shareVehicleForm_{{ $vehicle->id ?? '' }}"
                                    class="btn btn-primary">Send</button>
                                <button class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
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

    <style>
        .content-wrapper {
            position: relative;
        }

        .form-check-input:checked,
        .form-check-input:disabled~.form-check-label,
        .form-check-input[disabled]~.form-check-label {
            opacity: 1;
        }

        .custom-dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .form-control {
            /* cursor: pointer; */
            text-align: left;
        }

        .options {
            display: none;
            position: absolute;
            border: 1px solid #ccc;
            background-color: white;
            z-index: 1;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
        }

        .option {
            padding: 10px;
            cursor: pointer;
        }

        .option:hover {
            background-color: #f1f1f1;
        }

        .avatar.avatar-xl {
            width: 4rem;
            height: 4rem;
            line-height: 4rem;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-danger-light {
            background: #FFEEEC;
        }

        .avatar.avatar-xl i {
            width: 100%;
            height: 30px;
        }

        .text-blue {
            color: blue;
        }

        .vehicle_img {
            width: 250px;
            height: 130px;
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
        document.getElementById('categoryFilter').addEventListener('change', function() {
            updateUrl();
        });

        document.getElementById('searchInput').addEventListener('blur', function() {
            updateUrl();
        });

        document.getElementById('searchInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                updateUrl();
            }
        });

        document.getElementById('sortOrder').addEventListener('change', function() {
            updateUrl();
        });

        document.getElementById('per_page').addEventListener('change', function() {
            updateUrl();
        });

        document.getElementById('rentedFilter').addEventListener('change', function() {
            updateUrl();
        });

        function updateUrl() {
            let selectedCategory = document.getElementById('categoryFilter').value;
            let searchQuery = document.getElementById('searchInput').value;
            let selectedSortOrder = document.getElementById('sortOrder').value;
            let perPage = document.getElementById('per_page').value;
            let rentedFilter = document.getElementById('rentedFilter').value;

            let url = "{{ route('vehicle') }}?category_id=" + selectedCategory +
                "&search=" + searchQuery +
                "&sort_order=" + selectedSortOrder +
                "&per_page=" + perPage +
                "&rented=" + rentedFilter;

            window.location.href = url;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all modals
            const modals = document.querySelectorAll('.modal');

            modals.forEach(modal => {
                // Get the rent start date input
                const rentStartDateInput = modal.querySelector('[name="rent_start_date"]');

                // Check if rentStartDateInput exists
                if (rentStartDateInput) {
                    // Add event listener for change event
                    rentStartDateInput.addEventListener('change', function() {
                        calculateValues(modal);
                    });
                }

                // Get the count input and time unit select
                const countInput = modal.querySelector('[name="count"]');
                const timeUnitSelect = modal.querySelector('[name="time_unit"]');

                // Check if countInput exists
                if (countInput) {
                    countInput.addEventListener('input', function() {
                        calculateValues(modal);
                    });
                }

                // Check if timeUnitSelect exists
                if (timeUnitSelect) {
                    timeUnitSelect.addEventListener('change', function() {
                        calculateValues(modal);
                    });
                }
            });
        });

        function calculateValues(modal) {
            const countInput = modal.querySelector('[name="count"]');
            const timeUnitSelect = modal.querySelector('[name="time_unit"]');
            const rentStartDateInput = modal.querySelector('[name="rent_start_date"]');
            const rentEndDateInput = modal.querySelector('[name="rent_end_date"]');
            const totalDaysInput = modal.querySelector('[name="total_days"]');
            const costPerWeekInput = modal.querySelector('[name="cost_per_week"]');
            const totalPriceInput = modal.querySelector('[name="total_price"]');

            const count = parseInt(countInput.value) || 1;
            const timeUnit = timeUnitSelect.value;
            const rentStartDateValue = rentStartDateInput.value;

            console.log("Selected Rent Start Date:", rentStartDateValue);

            if (!rentStartDateValue) {
                console.log("No start date selected");
                return;
            }

            const rentStartDate = new Date(rentStartDateValue);
            let rentEndDate = new Date(rentStartDate);

            // Calculate end date
            if (timeUnit === 'months') {
                rentEndDate.setMonth(rentEndDate.getMonth() + count);
            } else if (timeUnit === 'years') {
                rentEndDate.setFullYear(rentEndDate.getFullYear() + count);
            } else if (timeUnit === 'weeks') {
                rentEndDate.setDate(rentEndDate.getDate() + (7 * count));
            } else if (timeUnit === 'days') {
                rentEndDate.setDate(rentEndDate.getDate() + count);
            }

            // Update Rent End Date Input
            rentEndDateInput.value = formatDate(rentEndDate);
            console.log("Calculated Rent End Date:", rentEndDateInput.value);

            // Calculate total days
            const totalDays = Math.floor((rentEndDate - rentStartDate) / (1000 * 60 * 60 * 24));
            totalDaysInput.value = totalDays;

            // Calculate total price
            const costPerWeek = parseFloat(costPerWeekInput.value) || 0;
            const costPerDay = costPerWeek / 7;
            const totalPrice = totalDays * costPerDay;
            totalPriceInput.value = Math.round(totalPrice);
        }

        function formatDate(date) {
            const d = new Date(date);
            return d.toISOString().split('T')[0]; // Format as YYYY-MM-DD
        }
    </script>
@endsection
