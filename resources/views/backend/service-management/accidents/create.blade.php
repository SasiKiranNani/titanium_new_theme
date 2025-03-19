@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 class="card-header">Create New Booking</h5>
                    </div>
                    <div class="col-sm-8 card-header">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <a href="{{ route('services.accident') }}" class="btn create-new btn-primary">
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

                        <form action="{{ route('services.accident.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <!-- Basic Info -->
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Accident Date <span class="text-danger">*</span></label>
                                                <input type="date" name="accident_date" id="accident_date" class="form-control">
                                                @error('accident_date')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number <span
                                                        class="text-danger">*</span></label>
                                                <div class="custom-dropdown mt-2">
                                                    <input type="text" class="form-control" id="search_reg_no"
                                                        placeholder="Select a registration number">
                                                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="">
                                                    <div class="options" id="options">
                                                        @foreach ($vehicles as $v)
                                                            <div class="option" data-value="{{ $v->id }}">
                                                                {{ $v->reg_no }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @error('reg_no')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Insurance Reference <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="insurance_ref" id="insurance_ref" class="form-control">
                                                @error('insurance_ref')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                                <textarea  type="text" name="description" id="description_add" class="form-control"></textarea>
                                                @error('description')
                                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Files</label>
                                                <input type="file" name="file[]" class="form-control" id="fileInputStore"
                                                    multiple>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <!-- File Preview Container with Bootstrap Grid -->
                                                <div id="filePreviewStore" class="row mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Basic Info -->
                            </div>
                            <div class="d-flex align-items-center justify-content-center mt-3">
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
          .file-upload-wrapper {
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            position: relative;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .file-upload-wrapper:hover {
            background-color: #f3f4f6;
            border-color: #6b7280;
        }

        /* File Upload Input (hidden) */
        .file-upload-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* File Upload Preview */
        .file-upload-preview img.img-thumbnail {
            width: 150px;
            height: auto;
            margin-top: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .gallery-thumbnails {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .gallery-thumbnails img {
            width: 100px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* File Upload Wrapper */
        .file-upload-wrapper {
            position: relative;
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .file-upload-wrapper:hover {
            background-color: #f3f4f6;
            border-color: #6b7280;
        }

        /* File Upload Input (hidden for styling) */
        .file-upload-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 10;
        }

        /* Placeholder Text */
        .file-upload-placeholder {
            font-size: 14px;
            color: #6b7280;
            pointer-events: none;
        }

        .file-upload-placeholder .upload-link {
            color: #3b82f6;
            text-decoration: underline;
            cursor: pointer;
        }

        .file-upload-preview img {
            max-width: 150px;
            max-height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .image-preview img {
            flex: 1 0 calc(25% - 10px);
            /* Adjust percentage for the number of images per row */
            max-width: calc(25% - 10px);
            max-height: 150px;
            border: 1px solid #ccc;
            border-radius: 4px;
            object-fit: cover;
        }

        /* Add responsiveness for smaller screens */
        @media (max-width: 768px) {
            .image-preview img {
                flex: 1 0 calc(50% - 10px);
                max-width: calc(50% - 10px);
            }
        }

        @media (max-width: 480px) {
            .image-preview img {
                flex: 1 0 calc(100% - 10px);
                max-width: calc(100% - 10px);
            }
        }

        .image-preview img {
            padding: 5px;
        }

        .custom-dropdown {
            position: relative;
            width: 100%;
        }

        #search_reg_no {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        #options {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 200px;
            /* Restrict height and make it scrollable */
            overflow-y: auto;
            background: #fff;
            border: 1px solid #ccc;
            border-top: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .option {
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            border-bottom: 1px solid #eee;
            transition: background 0.2s ease-in-out;
        }

        .option:last-child {
            border-bottom: none;
        }

        .option:hover {
            background: #f4f4f4;
        }

        @media (max-width: 768px) {
            #search_reg_no {
                font-size: 14px;
            }

            .option {
                font-size: 14px;
                padding: 8px;
            }
        }

        /* Fixed width and height for file previews */
        .file-preview-item {
            width: 200px;
            /* Adjust as needed */
            height: 117px;
            /* Adjust as needed */
            overflow: hidden;
            /* Ensure content doesn't overflow */
            position: relative;
            border: 1px solid #ddd;
            /* Optional border */
            border-radius: 8px;
            /* Optional rounded corners */
        }

        /* Ensure images fit within the fixed dimensions */
        .file-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Maintain aspect ratio */
        }

        /* Hover effect for icons */
        .file-preview-item .icon-container {
            position: absolute;
            top: 10px;
            right: 10px;
            display: none;
            /* Hide icons by default */
            gap: 10px;
            /* Space between icons */
        }

        /* Show icons on hover */
        .file-preview-item:hover .icon-container {
            display: flex;
            /* Show icons on hover */
        }

        /* Style for icons */
        .file-preview-item .icon-container .btn {
            padding: 5px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
   <script>
       // Initialize CKEditor for the add form
       initializeCKEditor('description_add');

       // Function to initialize CKEditor on the specific textarea
       function initializeCKEditor(id) {
           CKEDITOR.replace(id, {
               extraPlugins: 'htmlwriter, font, colorbutton',
               allowedContent: true,
               versionCheck: false,
               format_tags: 'p;h1;h2;h3;h4;h5;h6', // Allow heading tags from h1-h6
           });
       }
       document.addEventListener("DOMContentLoaded", function() {
           const searchInput = document.getElementById('search_reg_no');
           const optionsContainer = document.getElementById('options');
           const vehicleIdInput = document.getElementById('vehicle_id');

           // Show options when the input is clicked
           searchInput.addEventListener('click', function() {
               optionsContainer.style.display = 'block';
               this.value = ''; // Clear the input when dropdown opens
               filterOptions(''); // Reset the filter
           });

           // Filter options based on input
           searchInput.addEventListener('input', function() {
               filterOptions(this.value.toLowerCase());
           });

           // Handle option selection
           optionsContainer.addEventListener('click', function(event) {
               if (event.target.classList.contains('option')) {
                   const selectedOption = event.target;
                   searchInput.value = selectedOption.textContent.trim();
                   vehicleIdInput.value = selectedOption.getAttribute('data-value');

                   // Hide the dropdown
                   optionsContainer.style.display = 'none';
               }
           });

           // Hide options when clicking outside
           document.addEventListener('click', function(event) {
               if (!event.target.closest('.custom-dropdown')) {
                   optionsContainer.style.display = 'none';
               }
           });

           // Filter options function
           function filterOptions(query) {
               const options = optionsContainer.querySelectorAll('.option');
               options.forEach(option => {
                   const text = option.textContent.toLowerCase();
                   option.style.display = text.includes(query) ? 'block' : 'none';
               });
           }
       });
       // store form file review
       $(document).ready(function() {
           // Function to handle file previews
           function handleFilePreview(fileInputId, previewContainerId) {
               const fileInput = $(`#${fileInputId}`)[0];
               const previewContainer = $(`#${previewContainerId}`);

               // Function to update previews
               function updatePreviews() {
                   previewContainer.empty(); // Clear previous previews

                   // Loop through selected files
                   for (let i = 0; i < fileInput.files.length; i++) {
                       const file = fileInput.files[i];
                       const fileURL = URL.createObjectURL(file);

                       // Determine file type
                       const isImage = file.type.startsWith('image/');
                       const isPDF = file.type === 'application/pdf';
                       const isDocument = file.type === 'application/msword' || file.type ===
                           'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

                       // Create preview element based on file type
                       let previewElement = '';
                       if (isImage) {
                            previewElement = `
                            <div class="col-md-4 mb-3 position-relative">
                                <div class="file-preview-item border p-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <img src="${fileURL}" alt="${file.name}" class="img-thumbnail" style="max-width: 100%;">
                                        </div>
                                        <div class="ms-2 position-absolute" style="top: 9px; right: 21px;">
                                            <button type="button" class="btn btn-danger btn-sm remove-file" data-file-index="${i}">
                                                    <i class="icon-base ti tabler-trash me-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                        } else if (isPDF || isDocument) {
                            const iconClass = isPDF ? 'ti ti-file-type-pdf' : 'ti ti-file-type-doc';
                            previewElement = `
                                <div class="col-md-4 mb-3 position-relative">
                                    <div class="file-preview-item border p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <iframe src="${fileURL}#page=1" width="100%" height="100%"></iframe>
                                            </div>
                                            <div class="ms-2 position-absolute" style="top: 9px; right: 21px;">
                                                <button type="button" class="btn btn-danger btn-sm remove-file" data-file-index="${i}">
                                                        <i class="icon-base ti tabler-trash me-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                        }

                       // Append preview to container
                       previewContainer.append(previewElement);
                   }
               }

               // Initial preview update
               updatePreviews();

               // Handle file input change
               $(fileInput).on('change', function() {
                   updatePreviews();
               });

               // Remove file from preview and input
               $(document).on('click', '.remove-file', function() {
                   const fileIndex = $(this).data('file-index'); // Get the index of the file to remove

                   // Create a new FileList using DataTransfer
                   const dataTransfer = new DataTransfer();
                   for (let i = 0; i < fileInput.files.length; i++) {
                       if (i !== fileIndex) {
                           dataTransfer.items.add(fileInput.files[
                               i]); // Add all files except the one to remove
                       }
                   }

                   // Update the file input with the new FileList
                   fileInput.files = dataTransfer.files;

                   // Update the previews
                   updatePreviews();
               });
           }

           // Initialize file preview handler for the store form
           handleFilePreview('fileInputStore', 'filePreviewStore');
       });

       // update form file review
       $(document).ready(function() {
           // Function to handle file previews
           function handleFilePreview(fileInputId, previewContainerId) {
               const fileInput = $(`#${fileInputId}`)[0];
               const previewContainer = $(`#${previewContainerId}`);

               // Function to update previews
               function updatePreviews() {
                   previewContainer.empty(); // Clear previous previews

                   // Loop through selected files
                   for (let i = 0; i < fileInput.files.length; i++) {
                       const file = fileInput.files[i];
                       const fileURL = URL.createObjectURL(file);

                       // Determine file type
                       const isImage = file.type.startsWith('image/');
                       const isPDF = file.type === 'application/pdf';
                       const isDocument = file.type === 'application/msword' || file.type ===
                           'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

                       // Create preview element based on file type
                       let previewElement = '';
                       if (isImage) {
                           previewElement = `
                       <div class="col-md-4 mb-3 position-relative">
                           <div class="file-preview-item border p-2">
                               <div class="d-flex align-items-center">
                                   <div class="flex-grow-1">
                                       <img src="${fileURL}" alt="${file.name}" class="img-thumbnail" style="max-width: 100%;">
                                   </div>
                                   <div class="ms-2 position-absolute" style="top: 9px; right: 21px;">
                                       <button type="button" class="btn btn-danger btn-sm remove-file" data-file-index="${i}">
                                           <i class="ti ti-trash"></i>
                                       </button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   `;
                       } else if (isPDF || isDocument) {
                           const iconClass = isPDF ? 'ti ti-file-type-pdf' : 'ti ti-file-type-doc';
                           previewElement = `
                       <div class="col-md-4 mb-3 position-relative">
                           <div class="file-preview-item border p-2">
                               <div class="d-flex align-items-center">
                                   <div class="d-flex">
                                       <i class="${iconClass} fs-3"></i>
                                   </div>
                                   <div class="ms-2 position-absolute" style="top: 9px; right: 21px;">
                                       <button type="button" class="btn btn-danger btn-sm remove-file" data-file-index="${i}">
                                           <i class="ti ti-trash"></i>
                                       </button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   `;
                       }

                       // Append preview to container
                       previewContainer.append(previewElement);
                   }
               }

               // Initial preview update
               updatePreviews();

               // Handle file input change
               $(fileInput).on('change', function() {
                   updatePreviews();
               });

               // Remove file from preview and input
               $(document).on('click', '.remove-file', function() {
                   const fileIndex = $(this).data('file-index'); // Get the index of the file to remove

                   // Create a new FileList using DataTransfer
                   const dataTransfer = new DataTransfer();
                   for (let i = 0; i < fileInput.files.length; i++) {
                       if (i !== fileIndex) {
                           dataTransfer.items.add(fileInput.files[
                               i]); // Add all files except the one to remove
                       }
                   }

                   // Update the file input with the new FileList
                   fileInput.files = dataTransfer.files;

                   // Update the previews
                   updatePreviews();
               });
           }

           // Initialize file preview handler for the update form
           handleFilePreview('fileInputUpdate', 'filePreviewUpdate');
       });

       // $(document).ready(function() {
       //     // Delete individual file
       //     $(document).on('click', '.delete-file', function() {
       //         const fileId = $(this).data('file-id'); // Get the file ID

       //         // Send AJAX request to delete the file
       //         $.ajax({
       //             url: "{{ route('services.accident.file.delete', '') }}/" +
       //             fileId, // Correct URL
       //             type: 'DELETE',
       //             data: {
       //                 _token: '{{ csrf_token() }}' // CSRF token
       //             },
       //             success: function(response) {
       //                 if (response.success) {
       //                     // Remove the file preview from the DOM
       //                     $(`button[data-file-id="${fileId}"]`).closest('.col-md-4').remove();
       //                 }
       //             },
       //             error: function(xhr) {
       //                 console.error('Error deleting file:', xhr.responseText);
       //             }
       //         });
       //     });
       // });

       $(document).ready(function() {
           // Delete individual file
           $(document).on('click', '.delete-file', function() {
               const fileId = $(this).data('file-id'); // Get the file ID
               const $fileElement = $(`button[data-file-id="${fileId}"]`).closest('.col-md-4');

               // Show a loading indicator
               $fileElement.html(
                   '<div class="text-center"><i class="ti ti-loader"></i> Deleting...</div>');

               // Send AJAX request to delete the file
               $.ajax({
                   url: "{{ route('services.accident.file.delete', '') }}/" +
                       fileId, // Correct URL
                   type: 'DELETE',
                   data: {
                       _token: '{{ csrf_token() }}' // CSRF token
                   },
                   success: function(response) {
                       if (response.success) {
                           // Remove the file preview from the DOM
                           $fileElement.remove();
                       }
                   },
                   error: function(xhr) {
                       console.error('Error deleting file:', xhr.responseText);
                       // Restore the file preview if deletion fails
                       $fileElement.html(`
                   <div class="file-preview-item">
                       <div class="d-flex align-items-center">
                           <div class="flex-grow-1">
                               <span>Error deleting file. Please try again.</span>
                           </div>
                       </div>
                   </div>
               `);
                   }
               });
           });
       });
   </script>
@endsection
