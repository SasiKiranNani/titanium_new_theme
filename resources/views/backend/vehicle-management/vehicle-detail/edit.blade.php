@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 class="card-header">Edit Vehicle</h5>
                    </div>
                    <div class="col-sm-8 card-header">
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
                    <div class=" mb-6">

                        <form action="{{ route('vehicle.update', $vehicle->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <!-- Basic Info -->
                                <div>
                                    <div class="row">

                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Category Name <span
                                                        class="text-danger">*</span></label>
                                                <select name="category_id" id="categorySelect" class="form-control" disabled>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($vehicle->category_id == $category->id) selected @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Category Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="hidden" name="category_id" value="{{ $vehicle->category_id }}"
                                                    class="form-control" readonly>
                                                <input type="text" name="category_name" class="form-control"
                                                    value="{{ $vehicle->category->name }}" readonly>
                                                @error('category_id')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="company_name" class="col-form-label">Company Name</label>
                                                <select class="form-control" id="company_name" name="company_name" disabled>
                                                    <option value="" selected>Select a Company Name</option>
                                                    <option value="Mahajan Group"
                                                        {{ $vehicle->company_name == 'Mahajan Group' ? 'selected' : '' }}>Mahajan
                                                        Group</option>
                                                    <option value="EMM Kay Group"
                                                        {{ $vehicle->company_name == 'EMM Kay Group' ? 'selected' : '' }}>EMM Kay
                                                        Group</option>
                                                </select>
                                                @error('company_name')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="company_name" class="col-form-label">Company Name <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="company_name" name="company_name">
                                                    <option value="">Select Company</option>
                                                    <option value="Mahajan Group" data-abn="62 626 607 145"
                                                        {{ old('company_name', $vehicle->company_name) == 'Mahajan Group' ? 'selected' : '' }}>
                                                        Mahajan Group</option>
                                                    <option value="EMM Kay Group" data-abn="52 652 574 528"
                                                        {{ old('company_name', $vehicle->company_name) == 'EMM Kay Group' ? 'selected' : '' }}>
                                                        EMM Kay Group</option>
                                                    <option value="Vaa Transport Pty Ltd" data-abn=""
                                                        {{ old('company_name', $vehicle->company_name) == 'Vaa Transport Pty Ltd' ? 'selected' : '' }}>
                                                        Vaa Transport Pty Ltd</option>
                                                </select>
                                            </div>
                                            @error('company_name')
                                            <p class="text-red-400 font-medium">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="abn" class="col-form-label">ABN <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="abn" name="abn">
                                                    <option value="">Select ABN</option>
                                                    <option value="62 626 607 145"
                                                        {{ old('abn', $vehicle->abn) == '62 626 607 145' ? 'selected' : '' }}>
                                                        62 626 607 145 ( Mahajan Group )</option>
                                                    <option value="52 652 574 528"
                                                        {{ old('abn', $vehicle->abn) == '52 652 574 528' ? 'selected' : '' }}>
                                                        52 652 574 528 ( EMM Kay Group )</option>
                                                    <option value=""
                                                        {{ old('abn', $vehicle->abn) == '' ? 'selected' : '' }}>( Vaa
                                                        Transport Pty Ltd )</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="reg_no" class="form-control"
                                                    value="{{ old('reg_no', $vehicle->reg_no) }}">
                                                @error('reg_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Make <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="make" class="form-control"
                                                    value="{{ old('make', $vehicle->make) }}">
                                                @error('make')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Model <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="model" class="form-control"
                                                    value="{{ old('model', $vehicle->model) }}">
                                                @error('model')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="battery_size">Battery Size</label>
                                                <input type="text" name="battery_size" class="form-control"
                                                    id="battery_size"
                                                    value="{{ old('battery_size', $vehicle->battery_size) }}">
                                                @error('battery_size')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none">
                                            <div class="mb-3">
                                                <label class="col-form-label">Slug <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="slug" class="form-control"
                                                    value="{{ old('slug', $vehicle->slug) }}" readonly>
                                                @error('slug')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Purchase Date </label>
                                                <input type="month" name="purchase_date" class="form-control"
                                                    value="{{ old('purchase_date', $vehicle->purchase_date ? date('Y-m', strtotime($vehicle->purchase_date)) : '') }}">
                                                @error('purchase_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Fuel Type </label>
                                                <select name="fuel_type" class="form-control">
                                                    <option value="">Select Fuel Type</option>
                                                    <option value="petrol"
                                                        {{ old('fuel_type', $vehicle->fuel_type) == 'petrol' ? 'selected' : '' }}>
                                                        Petrol</option>
                                                    <option value="diesel"
                                                        {{ old('fuel_type', $vehicle->fuel_type) == 'diesel' ? 'selected' : '' }}>
                                                        Diesel</option>
                                                    <option value="electric"
                                                        {{ old('fuel_type', $vehicle->fuel_type) == 'electric' ? 'selected' : '' }}>
                                                        Electric</option>
                                                    <option value="hybrid"
                                                        {{ old('fuel_type', $vehicle->fuel_type) == 'hybrid' ? 'selected' : '' }}>
                                                        Hybrid</option>
                                                </select>
                                                @error('fuel_type')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Vehicle Identification Number </label>
                                                <input type="text" name="vin" class="form-control"
                                                    value="{{ old('vin', $vehicle->vin) }}">
                                                @error('vin')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Engine Number </label>
                                                <input type="text" name="engine_no" class="form-control"
                                                    value="{{ old('engine_no', $vehicle->engine_no) }}">
                                                @error('engine_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Owner</label>
                                                <input type="text" name="owner" class="form-control"
                                                    value="{{ old('owner', $vehicle->owner) }}">
                                                @error('owner')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Color</label>
                                                <input type="text" name="color" class="form-control"
                                                    value="{{ old('color', $vehicle->color) }}">
                                                @error('color')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Type</label>
                                                <input type="text" name="type" class="form-control"
                                                    value="{{ old('type', $vehicle->type) }}">
                                                @error('type')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Odometer</label>
                                                <input type="number" name="odometer" class="form-control"
                                                    value="{{ old('odometer', $vehicle->odometer) }}">
                                                @error('odometer')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Transmission </label>
                                                <input type="text" name="transmission" class="form-control"
                                                    value="{{ old('transmission', $vehicle->transmission) }}">
                                                @error('transmission')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Expiry Date </label>
                                                <input type="date" name="reg_expiry_date" class="form-control"
                                                    value="{{ old('reg_expiry_date', $vehicle->reg_expiry_date) }}">
                                                @error('reg_expiry_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Last Service Date </label>
                                                <input type="date" name="last_service_date" class="form-control"
                                                    value="{{ old('last_service_date', $vehicle->last_service_date) }}">
                                                @error('last_service_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Insurance Company </label>
                                                <input type="text" name="insurance_company" class="form-control"
                                                    value="{{ old('insurance_company', $vehicle->insurance_company) }}">
                                                @error('insurance_company')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Insurance Number </label>
                                                <input type="text" name="insurance_number" class="form-control"
                                                    value="{{ old('insurance_number', $vehicle->insurance_number) }}">
                                                @error('insurance_number')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Cost Per Week </label>
                                                <input type="number" name="cost_per_week" class="form-control"
                                                    value="{{ old('cost_per_week', $vehicle->cost_per_week) }}">
                                                @error('cost_per_week')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Thumbnail Image</label>
                                                <input type="file" name="thumbnail" class="form-control"
                                                    accept="image/*">
                                                @error('thumbnail')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Thumbnail Alt </label>
                                                <input type="text" name="thumbnail_alt" class="form-control"
                                                    value="{{ old('thumbnail_alt', $vehicle->thumbnail_alt) }}">
                                                @error('thumbnail_alt')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label d-block">Rented </label>
                                                <div class="form-check form-switch d-flex align-items-center"
                                                    style="min-height: 2.5rem !important;">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="rentedToggle_{{ $vehicle->id }}"
                                                        {{ $vehicle->rented ? 'checked' : '' }}>
                                                </div>
                                                @error('rented')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Vehicle Inspection Report Expiring </label>
                                                <input type="text" name="vehicle_inspection_report_expiring_date"
                                                    class="form-control"
                                                    value="{{ old('vehicle_inspection_report_expiring_date', $vehicle->vehicle_inspection_report_expiring_date) }}">
                                                @error('vehicle_inspection_report_expiring_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="col-form-label">Existing Thumbnail Image</label>
                                                    @if ($vehicle->thumbnail)
                                                        <img class="vehicle_img"
                                                            src="{{ asset('vehicles/thumbnails/' . $vehicle->thumbnail) }}"
                                                            alt="{{ $vehicle->thumbnail_alt }}">
                                                    @else
                                                        No Thumbnail Image
                                                    @endif
                                                    @error('thumbnail')
                                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label d-block">Rented
                                                            <span class="text-danger">*</span></label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="rentedToggle"
                                                        name="rented" value="1"
                                                        {{ old('rented', $vehicle->rented) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="rentedToggle">Yes</label>
                                                </div>
                                                @error('rented')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label d-block">Notes</label>
                                                <textarea name="notes" id="notes_edit_{{ $vehicle->id }}">{{ old('notes', $vehicle->notes) }}</textarea>
                                                @error('notes')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label d-block">Old Files </label>
                                                <div class="row">
                                                    @if ($vehicle->files->count() > 0)
                                                        @foreach ($vehicle->files as $file)
                                                            <div class="col-md-3 mb-3">
                                                                <div class="file-preview-item border p-2">
                                                                    <img src="{{ asset($file->file_path) }}"
                                                                        class="img-fluid" alt="{{ $file->file_name }}">
                                                                    <div class="mt-2 text-center">
                                                                        <a href="{{ asset($file->file_path) }}"
                                                                            target="_blank"
                                                                            class="btn btn-primary btn-sm">
                                                                            <i class="icon-base ti tabler-eye icon-22px"></i> View
                                                                        </a>
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm delete-file"
                                                                            data-file-id="{{ $file->id }}">
                                                                            <i class="icon-base ti tabler-trash icon-22px"></i> Delete
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="col-md-12">
                                                            <p>No old files uploaded for this vehicle.</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                @error('files')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Upload Files</label>
                                                <input type="file" name="files[]" class="form-control"
                                                    id="fileInputUpdate_{{ $vehicle->id }}" multiple>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <!-- File Preview Container with Bootstrap Grid -->
                                                <div id="filePreviewUpdate_{{ $vehicle->id }}" class="row mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Basic Info -->
                                <div class="d-flex align-items-center justify-content-center mt-3">
                                    <a href="#" class="btn btn-light me-2" data-bs-dismiss="offcanvas">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
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

    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .file-preview-item {
            position: relative;
        }

        .file-preview-item .mt-2 {
            position: absolute;
            top: 30%;
            right: 0;
            display: none;
            width: 100%;
            height: 100%;
        }

        .file-preview-item:hover .mt-2 {
            display: block;
        }

        .vehicle_img {
            width: 500px;
            height: 250px;
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

    <script>
        // Initialize CKEditor for the add form
        initializeCKEditor('notes_edit_{{ $vehicle->id }}');

        // Function to initialize CKEditor on the specific textarea
        function initializeCKEditor(id) {
            CKEDITOR.replace(id, {
                extraPlugins: 'htmlwriter',
                allowedContent: true,
                versionCheck: false,
                format_tags: 'p;h1;h2;h3;h4;h5;h6', // Allow heading tags from h1-h6
            });
        }
    </script>
    {{-- file preview --}}
    <script>
        $(document).ready(function() {
            // Function to handle file previews
            function handleFilePreview(fileInputId, previewContainerId) {
                $(`#${fileInputId}`).on('change', function(e) {
                    const files = e.target.files;
                    const previewContainer = $(`#${previewContainerId}`);
                    previewContainer.empty(); // Clear previous previews

                    // Loop through selected files
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const fileURL = URL.createObjectURL(file);

                        // Create preview element
                        const previewElement = `
                           <div class="col-md-2 mb-3">
                                <div class="file-preview-item border p-2">
                                    <div class="position-relative">
                                        <div class="">
                                            <img src="${fileURL}" alt="${file.name}" class="img-fluid" style="max-height: 100px;">
                                        </div>
                                        <div class="ms-2 position-absolute top-0 end-0">
                                            <button type="button" class="btn btn-danger btn-sm remove-file" data-file-name="${file.name}">
                                                <i class="icon-base ti tabler-trash icon-22px"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Append preview to container
                        previewContainer.append(previewElement);
                    }
                });

                // Remove file from preview and input
                $(document).on('click', '.remove-file', function() {
                    const fileName = $(this).data('file-name');
                    const fileInput = $(`#${fileInputId}`)[0];

                    // Remove file from input
                    const files = Array.from(fileInput.files);
                    const updatedFiles = files.filter(file => file.name !== fileName);

                    // Update file input
                    const dataTransfer = new DataTransfer();
                    updatedFiles.forEach(file => dataTransfer.items.add(file));
                    fileInput.files = dataTransfer.files;

                    // Remove preview element
                    $(this).closest('.col-md-4').remove();
                });
            }

            handleFilePreview('fileInputUpdate_{{ $vehicle->id }}',
                'filePreviewUpdate_{{ $vehicle->id }}');

            // Initialize file preview handler for the store form
            handleFilePreview('fileInputStore', 'filePreviewStore');
        });
    </script>
    {{-- sweet alret for deleting files --}}
    <script>
        $(document).ready(function() {
            // Handle file deletion with SweetAlert confirmation
            $(document).on('click', '.delete-file', function() {
                const fileId = $(this).data('file-id'); // Get the file ID
                const fileElement = $(this).closest('.col-md-3'); // Correct selector for the file element

                // Show SweetAlert confirmation popup
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to delete this file. This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to delete the file
                        $.ajax({
                            url: `/admin/vehicle-files/${fileId}`,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // Show success message
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'The file has been deleted.',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });

                                // Remove the file element from the DOM
                                fileElement.remove();
                            },
                            error: function(xhr) {
                                // Show error message
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to delete the file.',
                                    icon: 'error',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find all modals
        const modals = document.querySelectorAll('.modal');

        modals.forEach((modal) => {
            // Get modal ID
            const modalId = modal.id;

            // Select input fields specific to this modal
            const costPerWeekInput = modal.querySelector('[name="cost_per_week"]');
            const countInput = modal.querySelector('[name="count"]');
            const timeUnitSelect = modal.querySelector('[name="time_unit"]');
            const rentStartDateInput = modal.querySelector('[name="rent_start_date"]');
            const rentEndDateInput = modal.querySelector('[name="rent_end_date"]');
            const totalDaysInput = modal.querySelector('[name="total_days"]');
            const totalPriceInput = modal.querySelector('[name="total_price"]');

            // Set min attribute for rent_start_date to today's date
            const today = new Date();
            const threeMonthsAgo = new Date();
            threeMonthsAgo.setMonth(today.getMonth() - 3);

            rentStartDateInput.min = formatDate(threeMonthsAgo);

            // Add event listeners for input changes
            countInput.addEventListener('input', () => calculateValues(modal));
            timeUnitSelect.addEventListener('change', () => calculateValues(modal));
            rentStartDateInput.addEventListener('change', () => calculateValues(modal));
            costPerWeekInput.addEventListener('input', () => calculateValues(
                modal)); // Added listener for cost_per_week

            // Function to calculate total days and total price
            function calculateValues(modal) {
                const count = parseInt(countInput.value) || 1;
                const timeUnit = timeUnitSelect.value;
                const rentStartDate = new Date(rentStartDateInput.value);
                const costPerWeek = parseFloat(costPerWeekInput.value) || 0;

                // Ensure the rent start date is valid
                if (isNaN(rentStartDate.getTime())) {
                    console.log("Invalid rent start date");
                    return;
                }

                let rentEndDate = new Date(rentStartDate);

                // Calculate rent end date based on time unit
                if (timeUnit === 'months') {
                    rentEndDate.setMonth(rentEndDate.getMonth() + count);
                } else if (timeUnit === 'years') {
                    rentEndDate.setFullYear(rentEndDate.getFullYear() + count);
                } else if (timeUnit === 'weeks') {
                    rentEndDate.setDate(rentEndDate.getDate() + (7 * count));
                } else if (timeUnit === 'days') {
                    rentEndDate.setDate(rentEndDate.getDate() + count);
                }

                // Update rent end date field
                rentEndDateInput.value = formatDate(rentEndDate);

                // Calculate total days
                const totalDays = Math.floor((rentEndDate - rentStartDate) / (1000 * 60 * 60 * 24));
                totalDaysInput.value = totalDays;

                // Calculate total price (convert weekly cost to daily cost)
                const costPerDay = costPerWeek / 7;
                const totalPrice = totalDays * costPerDay;

                // Round total price and update the input
                totalPriceInput.value = Math.round(totalPrice);

                console.log("Total Days:", totalDays);
                console.log("Total Price:", Math.round(totalPrice));
            }

            // Utility function to format Date object as yyyy-mm-dd
            function formatDate(date) {
                const year = date.getFullYear();
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const day = date.getDate().toString().padStart(2, '0');
                return `${year}-${month}-${day}`;
            }
        });
    });
</script>
@endsection
