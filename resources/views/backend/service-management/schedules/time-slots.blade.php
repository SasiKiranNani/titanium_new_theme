@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            {{-- <!-- Sorting Dropdown -->
                            <div class="dropdown me-2">
                                <select id="sortOrder" class="form-select">
                                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                        Ascending</option>
                                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                        Descending</option>
                                </select>
                            </div> --}}
                            @can('Create Timeslot')
                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modaldemo8"><i class="icon-base ti tabler-plus icon-sm"></i>Add
                                    Time Slot
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
                                <th>Time Slots</th>
                                <th>Days</th>
                                @canany(['Edit Timeslot', 'Delete Timeslot'])
                                    <th>Action</th>
                                @endcanany

                            </tr>
                        </thead>
                        <tbody>
                            @if ($timeslots->isNotEmpty())
                                @foreach ($timeslots as $timeslot)
                                    <tr>
                                        <td>{{ request('sort_order') == 'desc' ? $timeslots->total() - (($timeslots->currentPage() - 1) * $timeslots->perPage() + $loop->iteration - 1) : ($timeslots->currentPage() - 1) * $timeslots->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $timeslot->time_slot }}</td>
                                        <td>
                                            @if ($timeslot->days == 'Both')
                                                All Days
                                            @else
                                                {{ $timeslot->days }}
                                            @endif
                                        </td>
                                        @canany(['Edit Timeslot', 'Delete Timeslot'])
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="icon-base ti tabler-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @can('Edit Timeslot')
                                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modaldemo8_{{ $timeslot->id ?? '' }}">
                                                                <i class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit
                                                            </a>
                                                        @endcan

                                                        @can('Delete Timeslot')
                                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete_timeslot_{{ $timeslot->id }}">
                                                                <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
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
                                    <td colspan="6" class="py-2 px-4 border text-center">No time slots found
                                    </td>
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
                        <form method="GET" action="{{ route('time.slots') }}" class="">
                            <label for="per_page" class="form-label me-2">Show:</label>
                            <select name="per_page" id="per_page" class="form-select d-inline-block w-auto"
                                onchange="this.form.submit()">
                                {{-- <option value="1" {{ request('per_page') == 1 ? 'selected' : '' }}>1</option> --}}
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
                                {{ $timeslots->appends(['per_page' => $perPage])->links('pagination::bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- create category modal --}}
    <div class="modal fade" id="modaldemo8" tabindex="-1" aria-labelledby="modaldemo8Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h4 class="modal-title" id="modaldemo8Label">Create TimeSlot</h4>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <form action="{{ route('time-slots.store') }}" method="post">
                        @csrf
                        <div>
                            <!-- Basic Info -->
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="schedule-card-body px-5">
                                            <div class="row">
                                                <!-- First row: 0am - 1am, 1am - 2am, 2am - 3am -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="0am - 1am"> 0am
                                                        - 1am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="1am - 2am"> 1am
                                                        - 2am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="2am - 3am"> 2am
                                                        - 3am</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Second row: 3am - 4am, 4am - 5am, 5am - 6am -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="3am - 4am"> 3am
                                                        - 4am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="4am - 5am">
                                                        4am
                                                        - 5am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="5am - 6am">
                                                        5am
                                                        - 6am</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Third row: 6am - 7am, 7am - 8am, 8am - 9am -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="6am - 7am">
                                                        6am - 7am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="7am - 8am">
                                                        7am - 8am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="8am - 9am">
                                                        8am - 9am</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Fourth row: 9am - 10am, 10am - 11am, 11am - 12pm -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="9am - 10am">
                                                        9am - 10am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]"
                                                            value="10am - 11am"> 10am - 11am</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]"
                                                            value="11am - 12pm"> 11am - 12pm</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Fifth row: 12pm - 1pm, 1pm - 2pm, 2pm - 3pm -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="12pm - 1pm">
                                                        12pm - 1pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="1pm - 2pm">
                                                        1pm - 2pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="2pm - 3pm">
                                                        2pm - 3pm</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Sixth row: 3pm - 4pm, 4pm - 5pm, 5pm - 6pm -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="3pm - 4pm">
                                                        3pm - 4pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="4pm - 5pm">
                                                        4pm - 5pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="5pm - 6pm">
                                                        5pm - 6pm</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Seventh row: 6pm - 7pm, 7pm - 8pm, 8pm - 9pm -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="6pm - 7pm">
                                                        6pm - 7pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="7pm - 8pm">
                                                        7pm - 8pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="8pm - 9pm">
                                                        8pm - 9pm</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Eighth row: 9pm - 10pm, 10pm - 11pm, 11pm - 0am -->
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="9pm - 10pm">
                                                        9pm - 10pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]"
                                                            value="10pm - 11pm"> 10pm - 11pm</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><input type="checkbox" name="time_slots[]" value="11pm - 0am">
                                                        11pm - 0am</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <button type="button" class="btn btn-cancel waves-effect waves-light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    @if ($timeslots->isNotEmpty())
        @foreach ($timeslots as $timeslot)
            <div class="modal fade" id="modaldemo8_{{ $timeslot->id ?? '' }}" tabindex="-1"
                aria-labelledby="modaldemo8Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modaldemo8Label">Edit TimeSlot</h4>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="{{ route('time-slots.update', $timeslot->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Name Field -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Time Slot <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="time_slot" class="form-control"
                                                value="{{ old('time_slot', $timeslot->time_slot ?? '') }}"
                                                placeholder="Enter category name" readonly>
                                            @error('time_slot')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Days <span class="text-danger">*</span></label>
                                            <select name="days" id="days" class="form-control">
                                                <option value="">Select The Days</option>
                                                <option value="WeekDays"
                                                    {{ old('days', $timeslot->days) == 'WeekDays' ? 'selected' : '' }}>
                                                    WeekDays
                                                </option>
                                                <option value="Weekends"
                                                    {{ old('days', $timeslot->days) == 'Weekends' ? 'selected' : '' }}>
                                                    Weekends
                                                </option>
                                                <option value="Both"
                                                    {{ old('days', $timeslot->days) == 'Both' ? 'selected' : '' }}>
                                                    All Days</option>
                                            </select>
                                            @error('days')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Buttons -->
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-cancel waves-effect waves-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- delete modal --}}
    @foreach ($timeslots as $timeslot)
        <!-- Delete User Modal -->
        <div class="modal fade" id="delete_timeslot_{{ $timeslot->id }}" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="icon d-flex justify-content-center">
                                <div class="avatar avatar-xl bg-danger-light rounded-circle mb-3 d-flex align-items-center justify-content-center"
                                    style="background: #FFEEEC;">
                                    <i class="icon-base ti tabler-trash fs-36 text-danger"
                                        style="width: 60% !important; height: 100% !important;"></i>
                                </div>
                            </div>
                            <h4 class="mb-2">Remove Time Slot?</h4>
                            <p class="mb-0">Are you sure you want to remove this {{ $timeslot->time_slot }}?</p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('time-slots.delete', $timeslot->id) }}" method="POST"
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
        .content-wrapper {
            position: relative;
        }

        .schedule-card-body label {
            font-size: 17px;
            margin: 5px 5px;
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

    {{-- <script>
        document.getElementById('sortOrder').addEventListener('change', function() {
            let sortOrder = this.value;
            let url = new URL(window.location.href);

            // Preserve existing query parameters
            url.searchParams.set('sort_order', sortOrder);
            url.searchParams.set('per_page', "{{ request('per_page', 10) }}");
            url.searchParams.set('page', "{{ request('page', 1) }}");

            window.location.href = url.toString();
        });
    </script> --}}
@endsection
