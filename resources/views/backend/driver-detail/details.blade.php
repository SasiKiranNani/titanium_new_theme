@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">
            {{-- <div class="card"> --}}


                <div class="flex justify-center">
                    <div class="w-full">
                        <div class="bg-white shadow-lg rounded-lg p-6">

                            <!-- Driver Details Section -->
                            <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-gray-50">

                                <div class="flex justify-between items-center mb-6 border-b pb-3">
                                    <h1 class="text-xl font-bold text-gray-800">👤 Driver Details</h1>
                                    <span class="text-sm text-gray-600">
                                        <a href="{{ route('drivers.list') }}" class="btn create-new btn-primary">
                                            <span>
                                                <span class="d-flex align-items-center gap-2">
                                                    <i class="icon-base ti tabler-arrow-left icon-sm"></i>
                                                    <span class="d-none d-sm-inline-block">Back</span>
                                                </span>
                                            </span>
                                        </a>
                                    </span>
                                </div>

                                <!-- Modal for adding payment details -->
                                <div class="modal fade" id="addPaymentModal" tabindex="-1"
                                    aria-labelledby="addPaymentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addPaymentModalLabel">Booking Details for
                                                    Vehicle
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="paymentDetailsForm" method="POST" action="">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="reg_no" class="form-label">Vehicle Registration
                                                            No</label>
                                                        <select class="form-control" id="reg_no" name="reg_no" required>
                                                            <option value="">Select Vehicle</option>
                                                            @if (!empty($vehicles) && count($vehicles) > 0)
                                                                @foreach ($vehicles as $vehicle)
                                                                    <option value="{{ $vehicle->reg_no }}">
                                                                        {{ $vehicle->reg_no }}
                                                                    </option>
                                                                @endforeach
                                                            @else
                                                                <option value="">No vehicles available</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="user_id" class="form-label">Assign to Driver</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" required value="{{ $user->name ?? ' ' }}"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="user_id" class="form-label">vehicles Per day
                                                            price</label>
                                                        <input type="text" class="form-control" id="per_day_price"
                                                            name="per_day_price" required value="" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="rent_start_date" class="form-label">Rent Start
                                                            Date</label>
                                                        <input type="date" class="form-control" id="rent_start_date"
                                                            name="rent_start_date" required
                                                            value="{{ $rental->start_date ?? '' }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="rent_end_date" class="form-label">Rent End Date</label>
                                                        <input type="date" class="form-control" id="rent_end_date"
                                                            name="rent_end_date" required
                                                            value="{{ $rental->end_date ?? '' }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="total_days" class="form-label">Total Days</label>
                                                        <input type="text" class="form-control" id="total_days"
                                                            name="total_days" required value="" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="user_id" class="form-label">Total Price</label>
                                                        <input type="text" class="form-control" id="total_price"
                                                            name="total_price" required value="" readonly>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="user_id" class="form-label">Payment Method</label>
                                                        <select class="form-control" id="payment_method"
                                                            name="payment_method" required>
                                                            <option value="">Select Booking Method</option>
                                                            <option value="cod">COD</option>
                                                            <option value="payu">Payu</option>

                                                        </select>
                                                    </div>


                                                    <input type="hidden" name="vehicle_id" id="vehicle_id" value="">
                                                    <input type="hidden" name="user_id" value="{{ $user->id ?? ' ' }}">
                                                    <div class="modal-footer">
                                                        <button type="submit" form="paymentDetailsForm"
                                                            class="btn btn-primary">Submit
                                                            Booking</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="text-blue-700 text-lg font-semibold mb-4">
                                    <span class="font-semibold">{{ $user->licence_no ?? ' ' }}</span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">🧑‍💼 Name:</span>
                                        <span class="font-semibold">{{ $user->name ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">📧 Email:</span>
                                        <span class="font-semibold">{{ $user->email ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">📅 Date of Birth:</span>
                                        <span class="font-semibold">{{ $user->dob ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">🚗 Licence Number:</span>
                                        <span class="font-semibold">{{ $user->licence_no ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">📞 Contact:</span>
                                        <span class="font-semibold">{{ $user->contact ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">🏠 Address:</span>
                                        <span class="font-semibold">{{ $user->address ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">🏙️ Suburb:</span>
                                        <span class="font-semibold">{{ $user->suburb ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">🌆 State:</span>
                                        <span class="font-semibold">{{ $user->state ?? ' ' }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-md">
                                        <span class="font-semibold text-gray-700">📮 Postal Code:</span>
                                        <span class="font-semibold">{{ $user->postalcode ?? ' ' }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /Driver Details Section -->

                            <!-- Payment History Section -->
                            <div class="mt-8 border border-gray-300 rounded-lg shadow-md p-6 bg-gray-50">
                                <h2 class="text-xl font-bold text-gray-800 mb-4">💳 Payment History</h2>
                                <div class="table-content" style="overflow-x: auto;">
                                    <table class="min-w-full bg-white border border-gray-300">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600">
                                                <th class="py-2 px-4 border">Id</th>
                                                <th class="py-2 px-4 border">Vehicle Reg No</th>
                                                <th class="py-2 px-4 border">Date</th>
                                                <th class="py-2 px-4 border">Payment Method</th>
                                                <th class="py-2 px-4 border">Amount</th>
                                                <th class="py-2 px-4 border">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($payments) && count($payments))
                                                @foreach ($payments as $payment)
                                                    <tr class="hover:bg-gray-100">
                                                        <td class="py-2 px-4 border">{{ $payment->id }}</td>
                                                        <td class="py-2 px-4 border">{{ $payment->vehicle->reg_no }}</td>
                                                        <td class="py-2 px-4 border">
                                                            {{ $payment->created_at->format('Y-m-d') }}</td>
                                                        <td class="py-2 px-4 border">{{ $payment->payment_method }}</td>
                                                        <td class="py-2 px-4 border">{{ $payment->total_price }}</td>
                                                        <td class="py-2 px-4 border">N/A</td>
                                                        <!-- You can add remarks if you have any -->
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="py-2 px-4 border text-center">No payment
                                                        history found
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /Payment History Section -->

                            <!-- Vehicle Allotment Section -->
                            <div class="mt-8 border border-gray-300 rounded-lg shadow-md p-6 bg-gray-50">
                                <h2 class="text-xl font-bold text-gray-800 mb-4">🚗 Vehicle Allotment</h2>
                                <div class="table-content" style="overflow-x: auto;">
                                    <table class="min-w-full bg-white border border-gray-300">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600">
                                                <th class="py-2 px-4 border">Vehicle Registration No</th>
                                                <th class="py-2 px-4 border">Total Rent</th>
                                                <th class="py-2 px-4 border">Allotment Date</th>
                                                <th class="py-2 px-4 border">Rent Start Date</th>
                                                <th class="py-2 px-4 border">Rent End Date</th>
                                                <th class="py-2 px-4 border">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($allotments) && count($allotments))
                                                @foreach ($allotments as $allotment)
                                                    <tr class="hover:bg-gray-100">
                                                        <td class="py-2 px-4 border">{{ $allotment->vehicle->reg_no }}
                                                        </td>
                                                        <td class="py-2 px-4 border">{{ $allotment->total_price }}</td>
                                                        <td class="py-2 px-4 border">
                                                            {{ $allotment->created_at->format('Y-m-d') }}
                                                        </td>
                                                        <td class="py-2 px-4 border">{{ $allotment->rent_start_date }}
                                                        </td>
                                                        <td class="py-2 px-4 border">{{ $allotment->rent_end_date }}</td>
                                                        <td class="py-2 px-4 border">
                                                            @if (now()->lt($allotment->rent_start_date))
                                                                Booking Completed
                                                            @elseif (now()->between($allotment->rent_start_date, $allotment->rent_end_date))
                                                                Assigned
                                                            @elseif (now()->gte($allotment->rent_end_date))
                                                                Completed
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="py-2 px-4 border text-center">No vehicle
                                                        allotment found
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /Vehicle Allotment Section -->
                        </div>
                    </div>
                </div>


            {{-- </div> --}}
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

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .content {
            position: relative;
        }

        .alert.alert-danger {
            width: fit-content;
            display: flex;
            position: absolute;
            right: 0px;
            top: 0px;
        }

        .alert.alert-danger ul li,
        .alert.alert-danger button {
            color: white;
        }

        .alert.alert-danger button {
            padding: 10px;
            font-size: 20px;
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
@endsection
