@extends('layouts.backend.index')


@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-4">
                        <form id="searchForm" action="{{ route('category') }}" method="GET">
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
                            <a href="javascript:void(0);" class="btn create-new btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modaldemo8">
                                <span>
                                    <span class="d-flex align-items-center gap-2">
                                        <i class="icon-base ti tabler-plus icon-sm"></i>
                                        <span class="d-none d-sm-inline-block">Create Category</span>
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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                    <tr class="table-default">
                                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="icon-base ti tabler-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldemo8_{{ $category->id }}">
                                                        <i class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit
                                                    </a>

                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_driver_{{ $category->id }}">
                                                        <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
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
                        <!-- Dropdown for Per Page Selection -->
                        <form method="GET" action="{{ route('category') }}" class="ms-3">
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
                                {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
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
                    <h4 class="modal-title" id="modaldemo8Label">Create Category</h4>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <form id="createCategoryForm" method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="createCategoryForm" class="btn btn-primary">Submit</button>
                    <button class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- edit category modal --}}
    @if ($categories->isNotEmpty())
        @foreach ($categories as $category)
            <div class="modal fade" id="modaldemo8_{{ $category->id ?? '' }}" tabindex="-1"
                aria-labelledby="modaldemo8Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modaldemo8Label">Edit Category</h4>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form id="editCategoryForm_{{ $category->id ?? '' }}" method="POST"
                                action="{{ route('category.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $category->name) }}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" form="editCategoryForm_{{ $category->id ?? '' }}"
                                class="btn btn-primary">Submit</button>
                            <button class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- delete modal --}}
    @foreach ($categories as $category)
        <!-- Delete User Modal -->
        <div class="modal fade" id="delete_driver_{{ $category->id }}" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="icon d-flex justify-content-center">
                                <div class="avatar avatar-xl bg-danger-light rounded-circle mb-3">
                                    <i class="icon-base ti tabler-trash me-1 fs-36 text-danger"></i>
                                </div>
                            </div>
                            <h4 class="mb-2">Remove Category?</h4>
                            <p class="mb-0">Are you sure you want to remove this {{ $category->name }}?</p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('category.delete', $category->id) }}" method="POST"
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

    <style>
        .content-wrapper {
            position: relative;
        }

        .alert-success {
            position: absolute;
            top: 0px;
            right: 20px;
            padding: 11px !important;
            width: 30%;
            z-index: 1;
            background: #17a917;
            color: white;
        }

        .alert-danger {
            position: absolute;
            top: 0px;
            right: 20px;
            padding: 11px !important;
            width: 30%;
            z-index: 1;
            background: #cd1616;
            color: white;
        }

        .alert-danger li {
            list-style-type: none;
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
        document.getElementById("searchInput").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("pageInput").value = 1; // Reset to page 1 on new search
                document.getElementById("searchForm").submit();
            }
        });
    </script>
@endsection
