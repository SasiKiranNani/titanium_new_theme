@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-4">
                        <form id="searchForm" action="{{ route('vehicle') }}" method="GET">
                            <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                            <input type="hidden" id="pageInput" name="page" value="{{ request('page', 1) }}">
                            <div class="icon-form mb-3 mb-sm-0">
                                <input type="text" id="searchInput" name="search" class="form-control"
                                    placeholder="Search Name" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-8">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <a href="{{ route('vehicle.create') }}" class="btn create-new btn-primary">
                                <span>
                                    <span class="d-flex align-items-center gap-2">
                                        <i class="icon-base ti tabler-plus icon-sm"></i>
                                        <span class="d-none d-sm-inline-block">Add Driver</span>
                                    </span>
                                </span>
                            </a>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($vehicles->isNotEmpty())
                                @foreach ($vehicles as $vehicle)
                                    <tr class="table-default">
                                        <td>{{ ($vehicles->currentPage() - 1) * $vehicles->perPage() + $loop->iteration }}
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
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="icon-base ti tabler-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item waves-effect" href=""><i
                                                            class="icon-base ti tabler-info-circle me-1 text-blue"></i>
                                                        Details</a>
                                                    <a class="dropdown-item waves-effect"
                                                        href="{{ route('vehicle.edit', $vehicle->id) }}"><i
                                                            class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit</a>
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_vehicle_{{ $vehicle->id }}">
                                                        <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
                                                    </a>
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldemo8_{{ $vehicle->id }}">
                                                        <i class="icon-base ti tabler-mail me-1 text-blue"></i> Share Via
                                                        Mail
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center">No drivers found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row m-3 justify-content-between">
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
                            @if ($perPage !== 'all')
                                {{ $vehicles->appends(request()->query())->links('pagination::bootstrap-4') }}
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
        <div class="modal fade" id="delete_driver_{{ $vehicle->id }}" role="dialog" aria-hidden="true">
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
                                {{ $vehicle->make . ' ' . $vehicle->model }}?</p>
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
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".modal").forEach(function(modal) {
                const searchInput = modal.querySelector(".custom-dropdown input");
                const optionsContainer = modal.querySelector(".options");
                const costPerWeekInput = modal.querySelector("#cost_per_week");
                const companyNameInput = modal.querySelector("#company_name");
                const countInput = modal.querySelector("#count");
                const timeUnitSelect = modal.querySelector("#time_unit");
                const rentStartDateInput = modal.querySelector("#rent_start_date");
                const rentEndDateInput = modal.querySelector("#rent_end_date");
                const totalDaysInput = modal.querySelector("#total_days");
                const totalPriceInput = modal.querySelector("#total_price");
                const vehicleIdInput = modal.querySelector("#vehicle_id");

                if (!searchInput) return;

                // Set the minimum rent_start_date to 3 months ago
                const today = new Date();
                const threeMonthsAgo = new Date();
                threeMonthsAgo.setMonth(today.getMonth() - 3);
                rentStartDateInput.min = formatDate(threeMonthsAgo);

                // Show options when the input is clicked
                searchInput.addEventListener("click", function() {
                    optionsContainer.style.display = "block";
                    this.value = ""; // Clear the input when dropdown opens
                    filterOptions("", optionsContainer); // Reset the filter
                });

                // Filter options based on input
                searchInput.addEventListener("input", function() {
                    filterOptions(this.value.toLowerCase(), optionsContainer);
                });

                // Handle option selection
                optionsContainer.addEventListener("click", function(event) {
                    if (event.target.classList.contains("option")) {
                        const selectedOption = event.target;
                        const costPerWeek = selectedOption.getAttribute("data-cost_per_week");
                        const companyName = selectedOption.getAttribute("data-company_name");

                        // Update the fields
                        costPerWeekInput.value = costPerWeek;
                        companyNameInput.value = companyName;
                        vehicleIdInput.value = selectedOption.getAttribute("data-value");

                        // Recalculate the total price
                        calculateTotal();

                        // Hide the dropdown
                        optionsContainer.style.display = "none";
                        searchInput.value = selectedOption.textContent.trim();
                    }
                });

                // Hide options when clicking outside
                document.addEventListener("click", function(event) {
                    if (!event.target.closest(".custom-dropdown")) {
                        optionsContainer.style.display = "none";
                    }
                });

                // Filter options function
                function filterOptions(query, container) {
                    const options = container.querySelectorAll(".option");
                    options.forEach((option) => {
                        const text = option.textContent.toLowerCase();
                        option.style.display = text.includes(query) ? "block" : "none";
                    });
                }

                // Calculate total days and price
                function calculateTotal() {
                    const count = parseInt(countInput.value) || 1;
                    const costPerWeek = parseFloat(costPerWeekInput.value) || 0;
                    const perDayPrice = costPerWeek / 7;
                    const timeUnit = timeUnitSelect.value;
                    let totalDays = 0;

                    if (timeUnit === "days") {
                        totalDays = count;
                    } else if (timeUnit === "weeks") {
                        totalDays = count * 7;
                    } else if (timeUnit === "months") {
                        totalDays = getDaysBetweenDates(rentStartDateInput.value, count, "months");
                    } else if (timeUnit === "years") {
                        totalDays = count * 365;
                    }

                    const totalPrice = perDayPrice * totalDays;

                    totalDaysInput.value = totalDays;
                    totalPriceInput.value = Math.round(totalPrice);
                }

                // Function to calculate days between dates
                function getDaysBetweenDates(startDate, count, timeUnit) {
                    if (!startDate) return 0;
                    const start = new Date(startDate);
                    let endDate = new Date(start);

                    if (timeUnit === "months") {
                        endDate.setMonth(start.getMonth() + count);
                    } else if (timeUnit === "years") {
                        endDate.setFullYear(start.getFullYear() + count);
                    }

                    return Math.ceil((endDate - start) / (1000 * 3600 * 24));
                }

                // Update rent_end_date
                function refreshEndDate() {
                    const startDate = new Date(rentStartDateInput.value);
                    if (isNaN(startDate.getTime())) return;

                    let endDate = new Date(startDate);
                    const count = parseInt(countInput.value) || 1;
                    const timeUnit = timeUnitSelect.value;

                    if (timeUnit === "days") {
                        endDate.setDate(startDate.getDate() + count);
                    } else if (timeUnit === "weeks") {
                        endDate.setDate(startDate.getDate() + count * 7);
                    } else if (timeUnit === "months") {
                        endDate.setMonth(startDate.getMonth() + count);
                    } else if (timeUnit === "years") {
                        endDate.setFullYear(startDate.getFullYear() + count);
                    }

                    rentEndDateInput.value = endDate.toISOString().split("T")[0];
                    calculateTotal();
                }

                rentStartDateInput.addEventListener("change", refreshEndDate);
                countInput.addEventListener("input", refreshEndDate);
                timeUnitSelect.addEventListener("change", refreshEndDate);
            });

            // Utility function to format Date object as yyyy-mm-dd
            function formatDate(date) {
                const year = date.getFullYear();
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const day = date.getDate().toString().padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
        });
    </script>
@endsection
