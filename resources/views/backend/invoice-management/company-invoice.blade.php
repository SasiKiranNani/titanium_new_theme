@extends('layouts.backend.index')


@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <form id="filterForm" action="{{ route('services.company-vehicle.invoice') }}" method="GET">
                    <div class="row card-header">
                        <div class="col-sm-4">
                            <div class="icon-form mb-3 mb-sm-0">
                                <input type="text" id="searchInput" name="search" class="form-control"
                                    placeholder="Search Registration Number or Invoice number"
                                    value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                                <div class="dropdown me-2">
                                    <select name="sort_order" id="sortOrder" class="form-select"
                                        onchange="this.form.submit()">
                                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                            Ascending</option>
                                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                            Descending</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <!-- Search Form -->
                                    <div class="icon-form d-flex">
                                        <input type="text" id="dateRangePicker" class="form-control mx-2"
                                            placeholder="Select Date Range">
                                        <input type="hidden" id="startDate" name="start_date"
                                            value="{{ request('start_date') }}">
                                        <input type="hidden" id="endDate" name="end_date"
                                            value="{{ request('end_date') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-start">#</th>
                                {{-- <th class="text-start">Invoice No.</th> --}}
                                <th class="text-start">Invoice Number</th>
                                <th class="text-start">Registration No.</th>
                                <th class="text-start">Odometer</th>
                                <th class="text-start">Next Service Due</th>
                                {{-- <th class="text-start">Work Done</th> category, subcategory data and Miscellaneous --}}
                                <th class="text-start">GST</th>
                                <th class="text-start">Paid Amount</th>
                                <th class="text-start">Due Amount</th>
                                <th class="text-start">Total</th>
                                @can('Company Vehicle Invoice')
                                    <th class="text-center">Action</th>
                                @endcan

                            </tr>
                        </thead>
                        <tbody>
                            @if ($serviceBooking->isNotEmpty())
                                @foreach ($serviceBooking as $index => $booking)
                                    <tr>
                                        <td>{{ request('sort_order') == 'desc' ? $serviceBooking->total() - (($serviceBooking->currentPage() - 1) * $serviceBooking->perPage() + $loop->iteration - 1) : ($serviceBooking->currentPage() - 1) * $serviceBooking->perPage() + $loop->iteration }}
                                        </td> <!-- Serial Number -->
                                        {{-- <td>{{ $booking->repair_order_no }}</td> --}}
                                        <td>{{ $booking->repair_order_no }} </td>
                                        <td>{{ $booking->vehicle->reg_no }}</td>
                                        <td>{{ $booking->odometer }}</td>
                                        <td>{{ $booking->next_service_due }}</td>
                                        {{-- <td class="text-wrap">
                                                @foreach (json_decode($booking->service_job_id) as $jobId)
                                                    {{ \App\Models\ServiceJob::find($jobId)->name }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td> --}}
                                        <td>{{ number_format($booking->gst_percentage, 0) }}</td>
                                        <td>{{ number_format($booking->total_paid, 0) }}</td>
                                        <td>{{ number_format($booking->balance_due, 0) }}</td>
                                        <td>{{ number_format($booking->total, 0) }}</td>
                                        @can('Company Vehicle Invoice')
                                            <td class="text-center">
                                                <a class="dropdown-item waves-effect" target="_blank"
                                                    href="{{ route('services.invoice', $booking->id) }}">
                                                    <i class="icon-base ti tabler-eye me-1 text-blue"></i> View Invoice
                                                </a>
                                            </td>
                                        @endcan

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">No data found</td>
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
                        <form method="GET" action="{{ route('services.company-vehicle.invoice') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="page" value="1">
                            <!-- Reset page to 1 when changing per_page -->
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
                                {{ $serviceBooking->appends(request()->query())->links('pagination::bootstrap-4') }}
                            @endif
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
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/pages/cards-advance.css') }}" />
    <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>
    {{-- <script src="{{ asset('backend/vendor/js/template-customizer.js') }}"></script> --}}
    <script src="{{ asset('backend/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

    <style>
        .modal {
            --bs-modal-width: 40rem !important;
        }

        .content-wrapper {
            position: relative;
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

    <script>
        //  for filtering date range
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
    </script>
@endsection
