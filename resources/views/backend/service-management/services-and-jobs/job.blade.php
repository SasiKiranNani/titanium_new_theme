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
                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modaldemo8"><i class="icon-base ti tabler-plus icon-sm"></i>Add
                                Job
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-start">#</th>
                                <th class="text-start">Service</th>
                                <th class="text-start">Job Name</th>
                                <th class="text-start">Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($serviceJobs->isNotEmpty())
                                @foreach ($serviceJobs as $serviceJob)
                                    <tr>
                                        <td>{{ ($serviceJobs->currentPage() - 1) * $serviceJobs->perPage() + $loop->iteration }}</td>
                                        <td>{{ $serviceJob->service->name }}</td>
                                        <td>{{ $serviceJob->name }}</td>
                                        <td>{{ $serviceJob->price }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="icon-base ti tabler-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldemo8_{{ $serviceJob->id ?? '' }}">
                                                        <i class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit
                                                    </a>

                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_service_{{ $serviceJob->id }}">
                                                        <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No data found</td>
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
                        <form method="GET" action="{{ route('services.job') }}">
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
                                {{ $serviceJobs->appends(request()->query())->links('pagination::bootstrap-4') }}
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
                    <h4 class="modal-title" id="modaldemo8Label">Create Job</h4>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <form action="{{ route('services.job.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <!-- Basic Info -->
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Service Name <span
                                                    class="text-danger">*</span></label>
                                            <select name="service_id" id="service_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('name')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control">
                                            @error('name')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                            <input type="text" name="price" id="price" class="form-control">
                                            @error('price')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="col-form-label">Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="description" id="description_add" cols="30" rows="10"></textarea>
                                            @error('description')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic Info -->
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <button type="button" class="btn btn-cancel waves-effect waves-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- edit modal --}}
    @if ($serviceJobs->isNotEmpty())
        @foreach ($serviceJobs as $serviceJob)
            <div class="modal fade" id="modaldemo8_{{ $serviceJob->id ?? '' }}" tabindex="-1"
                aria-labelledby="modaldemo8Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modaldemo8Label">Edit Job</h4>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="{{ route('services.job.update', $serviceJob->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Service Name <span
                                                    class="text-danger">*</span></label>
                                            <select name="service_id" id="service_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}"
                                                        {{ $serviceJob->service_id == $service->id ? 'selected' : '' }}>
                                                        {{ $service->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('name')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ $serviceJob->name }}">
                                            @error('name')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="col-form-label">Price <span class="text-danger">*</span></label>
                                            <input type="text" name="price" id="price" class="form-control"
                                                value="{{ $serviceJob->price }}">
                                            @error('price')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="col-form-label">Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="description" id="description_edit_{{ $serviceJob->id }}" cols="30" rows="10">{{ $serviceJob->description }}</textarea>
                                            @error('description')
                                                <p class="text-red-400 font-medium">{{ $message }}</p>
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
    @foreach ($serviceJobs as $serviceJob)
        <!-- Delete User Modal -->
        <div class="modal fade" id="delete_service_{{ $serviceJob->id }}" role="dialog" aria-hidden="true">
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
                            <h4 class="mb-2">Remove Job?</h4>
                            <p class="mb-0">Are you sure you want to remove this {{ $serviceJob->name }}?</p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('services.job.delete', $serviceJob->id) }}" method="POST"
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
        .modal {
            --bs-modal-width: 40rem !important;
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
        // Initialize CKEditor for the add form
        initializeCKEditor('description_add');

        // Initialize CKEditor for each edit form
        @foreach ($serviceJobs as $serviceJob)
            initializeCKEditor('description_edit_{{ $serviceJob->id }}');
        @endforeach

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
@endsection
