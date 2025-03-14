@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 class="card-header">Create New User</h5>
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

                        <form action="{{ route('vehicle.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <!-- Basic Info -->
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Category Name <span class="text-danger">*</span></label>
                                                <select name="category_id" id="category" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @if ($categories->isNotEmpty())
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="">No categories available</option>
                                                    @endif
                                                </select>
                                                @error('name')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="company_name" class="col-form-label">Company Name <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="company_name" name="company_name">
                                                    <option value="">Select Company</option>
                                                    <option value="Mahajan Group" data-abn="62 626 607 145">Mahajan Group</option>
                                                    <option value="EMM Kay Group" data-abn="52 652 574 528">EMM Kay Group</option>
                                                    <option value="Vaa Transport Pty Ltd" data-abn="">Vaa Transport Pty Ltd
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="abn" class="col-form-label">ABN <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="abn" name="abn">
                                                    <option value="">Select ABN</option>
                                                    <option value="62 626 607 145">62 626 607 145 ( Mahajan Group )</option>
                                                    <option value="52 652 574 528">52 652 574 528 ( EMM Kay Group )</option>
                                                    <option value="">( Vaa Transport Pty Ltd )</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="make">Make <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="make" class="form-control" id="make">
                                                @error('make')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="model">Model <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="model" class="form-control" id="model">
                                                @error('model')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="reg_no" class="form-control">
                                                @error('reg_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label" for="battery_size">Battery Size</label>
                                                <input type="text" name="battery_size" class="form-control" id="battery_size">
                                                @error('battery_size')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Purchase Date </label>
                                                <input type="month" name="purchase_date" class="form-control">
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
                                                    <option value="petrol">Petrol</option>
                                                    <option value="diesel">Diesel</option>
                                                    <option value="electric">Electric</option>
                                                    <option value="hybrid">Hybrid</option>
                                                </select>
                                                @error('fuel_type')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Vehicle Identification Number </label>
                                                <input type="text" name="vin" class="form-control">
                                                @error('vin')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Engine Number </label>
                                                <input type="text" name="engine_no" class="form-control">
                                                @error('engine_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Owner </label>
                                                <input type="text" name="owner" class="form-control">
                                                @error('owner')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Color </label>
                                                <input type="text" name="color" class="form-control">
                                                @error('color')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Type </label>
                                                <input type="text" name="type" class="form-control">
                                                @error('type')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Odometer </label>
                                                <input type="number" name="odometer" class="form-control">
                                                @error('odometer')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Transmission </label>
                                                <input type="text" name="transmission" class="form-control">
                                                @error('transmission')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Expiry Date </label>
                                                <input type="date" name="reg_expiry_date" class="form-control">
                                                @error('reg_expiry_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Last Service Date </label>
                                                <input type="date" name="last_service_date" class="form-control">
                                                @error('last_service_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Insurance Company </label>
                                                <input type="text" name="insurance_company" class="form-control">
                                                @error('insurance_company')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Insurance Number </label>
                                                <input type="text" name="insurance_number" class="form-control">
                                                @error('insurance_number')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Vehicle Inspection Report Expiry Date </label>
                                                <input type="date" name="vehicle_inspection_report_expiring_date"
                                                    class="form-control">
                                                @error('vehicle_inspection_report_expiring_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Cost Per Week </label>
                                                <input type="number" name="cost_per_week" class="form-control">
                                                @error('cost_per_week')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Thumbnail Image</label>
                                                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                                                @error('thumbnail')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label d-block">Rented </label>
                                                <div class="form-check form-switch d-flex align-items-center"
                                                    style="min-height: 2.5rem !important; padding-left: 1.5em">
                                                    <label class="form-check-label me-5" for="rentedToggle">Available</label>
                                                    <input class="form-check-input" type="checkbox" id="rentedToggle" name="rented"
                                                        value="1">
                                                    <label class="form-check-label ms-3" for="rentedToggle">Assigned</label>
                                                </div>
                                                @error('rented')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Thumbnail Alt</label>
                                                <input type="text" name="thumbnail_alt" class="form-control">
                                                @error('thumbnail_alt')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label d-block">Notes</label>
                                                <textarea name="notes" id="notes_add"></textarea>
                                                @error('notes')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Upload Files</label>
                                                <input type="file" name="files[]" class="form-control" id="fileInputStore"
                                                    multiple>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <!-- File Preview Container with Bootstrap Grid -->
                                                <div id="filePreviewStore" class="row mt-3"></div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Rented </label>
                                                <select name="rented" class="form-control" >
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                                @error('rented')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                                <!-- /Basic Info -->
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="#" class="btn btn-light me-2" data-bs-dismiss="offcanvas">Cancel</a>
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
.me-5 {
    margin-inline-end: 3.25rem !important;
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
        initializeCKEditor('notes_add');

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

                // Initialize file preview handler for the store form
                handleFilePreview('fileInputStore', 'filePreviewStore');
            });
        </script>
@endsection
