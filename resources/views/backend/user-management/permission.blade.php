@extends('layouts.backend.index')


@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row card-header">
                    <!-- Search Form -->
                    <div class="col-sm-4">
                        <form id="searchForm" action="{{ route('permissions') }}" method="GET">
                            <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                            <input type="hidden" id="pageInput" name="page" value="{{ request('page', 1) }}">
                            <input type="hidden" name="sort_by" value="{{ request('sort_by', 'id') }}">
                            <input type="hidden" name="sort_order" value="{{ request('sort_order', 'asc') }}">

                            <div class="icon-form mb-3 mb-sm-0">
                                <input type="text" id="searchInput" name="search" class="form-control"
                                    placeholder="Search Name" value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>

                    <!-- Sorting Dropdown -->
                    <div class="col-sm-8">
                        <div class="d-flex align-items-center flex-wrap row-gap-2 justify-content-sm-end">
                            <div class="me-2">
                                <form id="sortForm" action="{{ route('permissions') }}" method="GET">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    <input type="hidden" name="sort_by" id="sortByInput"
                                        value="{{ request('sort_by', 'id') }}">

                                    <select id="sortOrder" name="sort_order" class="form-select">
                                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                            Ascending</option>
                                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>
                                            Descending</option>
                                    </select>
                                </form>
                            </div>

                            <!-- Create Permission Button -->
                            <a href="javascript:void(0);" class="btn create-new btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addPermissionModal">
                                <span class="d-flex align-items-center gap-2">
                                    <i class="icon-base ti tabler-plus icon-sm"></i>
                                    <span class="d-none d-sm-inline-block">Create permissions</span>
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
                                <th>Assigned to</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <tr class="table-default">
                                        <td> {{ request('sort_order') == 'desc' ? $permissions->total() - (($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration - 1) : ($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <span class="text-nowrap">
                                                @foreach ($permission->roles as $role)
                                                    @php
                                                        // Define colors for roles (you can customize this)
                                                        $colors = ['primary', 'success', 'info', 'warning', 'danger'];
                                                        $color = $colors[$loop->index % count($colors)]; // Cycle through colors
                                                    @endphp
                                                    <a href="javascript:void(0);">
                                                        <span class="badge bg-label-{{ $color }} me-2">
                                                            {{ $role->name }}
                                                        </span>
                                                    </a>
                                                @endforeach
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="icon-base ti tabler-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Edit Button -->
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editPermissionModal_{{ $permission->id }}">
                                                        <i class="icon-base ti tabler-pencil me-1 text-blue"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete_permission_{{ $permission->id }}">
                                                        <i class="icon-base ti tabler-trash me-1 text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center">No permissions found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Per Page Selection -->
                <div class="row m-3 justify-content-between">
                    <div class="col-md-auto me-auto">
                        <form method="GET" action="{{ route('permissions') }}">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="page" value="{{ request('page') }}">
                            <input type="hidden" name="sort_by" value="{{ request('sort_by', 'id') }}">
                            <input type="hidden" name="sort_order" value="{{ request('sort_order', 'asc') }}">

                            <label for="per_page" class="form-label me-2">Show:</label>
                            <select name="per_page" id="perPage" class="form-select d-inline-block w-auto"
                                onchange="this.form.submit()">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                            </select>
                        </form>
                    </div>

                    <!-- Pagination -->
                    <div class="col-md-auto ms-auto">
                        <div class="dt-paging">
                            @if ($perPage !== 'all')
                                {{ $permissions->appends(request()->query())->links('pagination::bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- store modal --}}
    <!-- Add Permission Modal -->
    <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-simple">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h3>Add New Permission</h3>
                        <p class="text-body-secondary">Permissions you may use and assign to your users.</p>
                    </div>
                    <form id="addPermissionForm" class="row" method="POST"
                        action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="col-12 form-control-validation mb-4 fv-plugins-icon-container">
                            <label class="form-label" for="modalPermissionName">Permission Name</label>
                            <input type="text" id="modalPermissionName" name="name" class="form-control"
                                placeholder="Permission Name" autofocus="">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 text-center demo-vertical-spacing">
                            <button type="submit" class="btn btn-primary me-sm-4 me-1 waves-effect waves-light">Create
                                Permission</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                                aria-label="Close">Discard</button>
                        </div>
                        <input type="hidden">
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    @foreach ($permissions as $permission)
        <!-- Edit Modal -->
        <div class="modal fade" id="editPermissionModal_{{ $permission->id }}" tabindex="-1" aria-modal="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-simple">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h3>Edit Permission</h3>
                            <p class="text-body-secondary">Edit permission as per your requirements.</p>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <h6 class="alert-heading mb-2">Warning</h6>
                            <p class="mb-0">By editing the permission name, you might break the system permissions
                                functionality. Please ensure you're absolutely certain before proceeding.</p>
                        </div>
                        <form id="editPermissionForm" class="row"
                            action="{{ route('permissions.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-9 form-control-validation fv-plugins-icon-container">
                                <label class="form-label" for="editPermissionName">Permission Name</label>
                                <input type="text" id="editPermissionName" name="name" class="form-control"
                                    placeholder="Permission Name" tabindex="-1" value="{{ $permission->name }}">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-sm-3 mb-4">
                                <label class="form-label invisible d-none d-sm-inline-block">Button</label>
                                <button type="submit"
                                    class="btn btn-primary mt-1 mt-sm-0 waves-effect waves-light">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- delete modal --}}
    @foreach ($permissions as $permission)
        <!-- Delete User Modal -->
        <div class="modal fade" id="delete_permission_{{ $permission->id }}" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="icon d-flex justify-content-center">
                                <div class="avatar avatar-xl bg-danger-light rounded-circle mb-3">
                                    <i class="icon-base ti tabler-trash fs-36 text-danger"></i>
                                </div>
                            </div>
                            <h4 class="mb-2">Remove Driver?</h4>
                            <p class="mb-0">Are you sure you want to remove this {{ $permission->name }}?</p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('permissions.delete', $permission->id) }}" method="POST"
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

        .avatar.avatar-xl {
            width: 4rem;
            height: 4rem;
            line-height: 4rem;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-danger-light {
            background: #FFEEEC;
        }

        .avatar.avatar-xl i {
            width: 100%;
            height: 30px;
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
        document.getElementById('sortOrder').addEventListener('change', function() {
            let selectedOrder = this.value;
            let url = new URL(window.location.href);
            url.searchParams.set('sort_order', selectedOrder);

            // Ensure `sort_by` parameter is included (default to 'id' if missing)
            if (!url.searchParams.get('sort_by')) {
                url.searchParams.set('sort_by', 'id');
            }

            // Retain existing parameters
            let search = document.querySelector('input[name="search"]').value;
            let perPage = document.querySelector('select[name="per_page"]')
            .value; // Updated to fetch from select dropdown
            let page = 1; // Reset to first page on sorting change

            if (search) url.searchParams.set('search', search);
            if (perPage) url.searchParams.set('per_page', perPage);
            url.searchParams.set('page', page); // Ensure it always starts from page 1

            window.location.href = url.toString();
        });
    </script>
@endsection
