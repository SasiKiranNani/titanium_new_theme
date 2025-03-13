@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 class="card-header">Edit User</h5>
                    </div>
                    <div class="col-sm-8 card-header">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <a href="{{ route('drivers.list') }}" class="btn create-new btn-primary">
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

                        <form class="card-body" action="{{ route('drivers.update', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="name" class="form-control" placeholder="john.doe"
                                        value="{{ old('name', $user->name) }}" autocomplete="name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="email" id="multicol-email" class="form-control"
                                            autocomplete="email" placeholder="john.doe" aria-label="john.doe"
                                            value="{{ old('email', $user->email) }}" aria-describedby="multicol-email2">
                                        <span class="input-group-text" id="multicol-email2">@example.com</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-abn">ABN</label>
                                    <input type="text" name="abn" id="multicol-abn" class="form-control"
                                        value="{{ old('abn', $user->abn) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Birth Date</label>
                                    <input type="text" id="multicol-birthdate" name="dob"
                                        class="form-control dob-picker flatpickr-input" placeholder="YYYY-MM-DD"
                                        value="{{ old('dob', $user->dob) }}" readonly="readonly">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-licence_no">Licence Number</label>
                                    <input type="text" name="licence_no" id="multicol-licence_no" class="form-control"
                                        value="{{ old('licence_no', $user->licence_no) }}" placeholder="Licence Number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-contact">Contact </label>
                                    <input type="text" name="contact" id="multicol-contact" class="form-control"
                                        value="{{ old('contact', $user->contact) }}" placeholder="Contact">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-address">Address</label>
                                    <textarea name="address" class="form-control" id="collapsible-address" rows="2" placeholder="1456, Mall Road"
                                        autocomplete="address">{{ old('address', $user->address) }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Suburb</label>
                                    <input type="text" name="suburb" id="suburb" class="form-control"
                                        value="{{ old('suburb', $user->suburb) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" id="state" class="form-control"
                                        value="{{ old('state', $user->state) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="collapsible-pincode">Postalcode</label>
                                    <input type="text" name="postalcode" id="collapsible-pincode"
                                        class="form-control" value="{{ old('postalcode', $user->postalcode) }}"
                                        placeholder="658468">
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="collapsible-notes">Notes</label>
                                    <textarea name="notes" class="form-control" id="collapsible-notes" rows="2">{{ old('notes', $user->notes) }}</textarea>
                                </div>
                                <!-- Old Files Section -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="col-form-label d-block">Old Files <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            @if ($user->files->count() > 0)
                                                @foreach ($user->files as $file)
                                                    <div class="col-md-3 mb-3">
                                                        <div class="file-preview-item border p-2">
                                                            <img src="{{ asset($file->file_path) }}" class="img-fluid"
                                                                alt="{{ $file->file_name }}">
                                                            <div class="mt-2 text-center">
                                                                <a href="{{ asset($file->file_path) }}" target="_blank"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="icon-base ti tabler-eye"></i>
                                                                </a>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm delete-file"
                                                                    data-file-id="{{ $file->id }}">
                                                                    <i class="icon-base ti tabler-trash me-1"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12">
                                                    <p>No old files uploaded for this user.</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- File Upload Section -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="col-form-label">Upload Files</label>
                                        <input type="file" name="files[]" class="form-control"
                                            id="fileInputUpdate_{{ $user->id }}" multiple>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <!-- File Preview Container with Bootstrap Grid -->
                                        <div id="filePreviewUpdate_{{ $user->id }}" class="row mt-3"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h5 class="fw-semibold">Assign Roles</h5>
                                    @if ($roles->isNotEmpty())
                                        @foreach ($roles as $role)
                                            <div class="col-lg-2 col-md-2 col-sm-12 mt-3">
                                                <div class="form-check mb-0 d-flex align-items-center" style="gap: 5px;">
                                                    <input {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                                        type="checkbox" id="role-{{ $role->id }}" class="rounded"
                                                        name="role[]" value="{{ $role->name }}">
                                                    <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="pt-6">
                                <button type="submit"
                                    class="btn btn-primary me-4 waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
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
        initializeCKEditor('collapsible-notes');

        // Function to initialize CKEditor on the specific textarea
        function initializeCKEditor(id) {
            CKEDITOR.replace(id, {
                extraPlugins: 'htmlwriter',
                allowedContent: true,
                versionCheck: false,
                format_tags: 'p;h1;h2;h3;h4;h5;h6', // Allow heading tags from h1-h6
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#multicol-birthdate", {
                dateFormat: "Y-m-d", // Format YYYY-MM-DD
                allowInput: true, // Allow manual input
                altInput: true, // Show a more readable date format
                altFormat: "F j, Y", // Alternative format (e.g., January 1, 2024)
            });
        });
    </script>

    {{-- File Upload --}}
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
                            <div class="col-md-4 mb-3">
                                <div class="file-preview-item border p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <span>${file.name}</span>
                                        </div>
                                        <div class="ms-2">
                                            <button type="button" class="btn btn-danger btn-sm remove-file" data-file-name="${file.name}">
                                                <i class="icon-base ti tabler-trash me-1"></i>
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

            handleFilePreview('fileInputUpdate_{{ $user->id }}', 'filePreviewUpdate_{{ $user->id }}');

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
                            url: `/admin/driver-files/${fileId}`,
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
@endsection
