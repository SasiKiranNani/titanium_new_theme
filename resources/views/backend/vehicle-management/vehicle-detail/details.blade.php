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
                            <a href="{{ route('vehicle') }}" class="btn create-new btn-primary">
                                <span>
                                    <span class="d-flex align-items-center gap-2">
                                        <i class="icon-base ti tabler-arrow-left icon-sm"></i>
                                        <span class="d-none d-sm-inline-block">Back</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Vehicle Details Section -->
                <div class="border border-gray-300 rounded-lg shadow-md p-6 bg-gray-50">

                    <div class="flex justify-between items-center mb-6 border-b pb-3">
                        <h1 class="text-xl font-bold text-gray-800">🚗 Vehicle Details</h1>
                        <span class="text-sm text-gray-600">
                            @if (isset($vehicle) && $vehicle->last_service_date)
                                Last Service Date: <span
                                    class="font-semibold">{{ \Carbon\Carbon::parse($vehicle->last_service_date)->format('d M Y') }}</span>
                            @else
                                <span class="text-red-500">No Service Done</span>
                            @endif
                        </span>
                    </div>

                    <div class="text-blue-700 text-lg font-semibold mb-4">
                        <span class="font-semibold">{{ $vehicle->reg_no ?? '' }}</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📅 Company Name:</span>
                            <span class="font-semibold">{{ $vehicle->company_name ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📅 ABN:</span>
                            <span class="font-semibold">{{ $vehicle->abn ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📅 Purchase Month/Year:</span>
                            <span class="font-semibold">{{ $vehicle->purchase_date ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">⛽ Fuel Type:</span>
                            <span class="font-semibold">{{ $vehicle->fuel_type ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">⛽ Battery Size:</span>
                            <span class="font-semibold">{{ $vehicle->battery_size ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🏭 Make:</span>
                            <span class="font-semibold">{{ $vehicle->make ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🚘 Model:</span>
                            <span class="font-semibold">{{ $vehicle->model ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🛡️ Insurance Company:</span>
                            <span class="font-semibold">{{ $vehicle->insurance_company ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🔢 Insurance Number:</span>
                            <span class="font-semibold">{{ $vehicle->insurance_number ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">👤 Owner:</span>
                            <span class="font-semibold">{{ $vehicle->owner ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🔍 VIN:</span>
                            <span class="font-semibold">{{ $vehicle->vin ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">⚙️ Engine Number:</span>
                            <span class="font-semibold">{{ $vehicle->engine_no ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">⚙️ Odometer Reading:</span>
                            <span class="font-semibold">{{ $vehicle->odometer ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🎨 Color:</span>
                            <span class="font-semibold">{{ $vehicle->color ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">🚗 Type:</span>
                            <span class="font-semibold">{{ $vehicle->type ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">⚙️ Transmission:</span>
                            <span class="font-semibold">{{ $vehicle->transmission ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">💰 Total Service Amount:</span>
                            <span class="font-semibold">{{ $vehicle->total_service_amount ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📜 Registration Expiry:</span>
                            <span class="font-semibold">{{ $vehicle->reg_expiry_date ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📜 Insurance Company:</span>
                            <span class="font-semibold">{{ $vehicle->insurance_company ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📜 Insurance Number:</span>
                            <span class="font-semibold">{{ $vehicle->insurance_number ?? '' }}</span>
                        </div>
                        <div class="bg-white p-3 rounded-md">
                            <span class="font-semibold text-gray-700">📜 Vehicle Inspection Report Expiry Date:</span>
                            <span
                                class="font-semibold">{{ $vehicle->vehicle_inspection_report_expiring_date ?? '' }}</span>
                        </div>
                    </div>

                    <?php $status = $vehicle?->rented; ?>
                    <div class="mt-6">
                        <span class="font-bold text-lg text-orange-600">📌 Status:
                            <span class="font-semibold">
                                <?php
                                if ($status == 0) {
                                    echo 'Available';
                                } elseif ($status == 1) {
                                    echo 'Assigned';
                                } else {
                                    echo 'Completed';
                                }
                                ?>
                            </span>
                        </span>
                    </div>
                </div>
                <!-- /Vehicle Details Section -->
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
    <script src="https://cdn.tailwindcss.com"></script>
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
@endsection
