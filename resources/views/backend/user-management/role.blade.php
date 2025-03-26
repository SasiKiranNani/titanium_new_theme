@extends('layouts.backend.index')


@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="mb-1">Roles List</h4>

        <p class="mb-6">
            A role provided access to predefined menus and features so that depending on <br />
            assigned role an administrator can have access to what user needs.
        </p>
        <!-- Role cards -->

        <div class="row g-6">
            @if ($roles->isNotEmpty())
                @foreach ($roles as $role)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="fw-normal mb-0 text-body">Total {{ $role->users->count() }} users</h6>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach ($role->users->take(3) as $user)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar pull-up" aria-label="{{ $user->name }}"
                                                data-bs-original-title="{{ $user->name }}">
                                                @if ($user->profile_image)
                                                    <img class="rounded-circle"
                                                        src="{{ asset('storage/' . $user->profile_image) }}" alt="Avatar">
                                                @else
                                                    <span
                                                        class="avatar-initial rounded-circle bg-secondary">{{ substr($user->name, 0, 1) }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                        @if ($role->users->count() > 3)
                                            <li class="avatar">
                                                <span class="avatar-initial rounded-circle pull-up" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom"
                                                    data-bs-original-title="{{ $role->users->count() - 3 }} more">
                                                    +{{ $role->users->count() - 3 }}
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="role-heading">
                                        <h5 class="mb-1">{{ $role->name }}</h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    @can('Edit Roles')
                                        <a href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#addRoleModal_{{ $role->id }}" class="role-edit-modal">
                                            <span style="color: #fe6d00 !important;">Edit Role</span>
                                        </a>
                                    @endcan

                                    @can('Delete Roles')
                                        <a href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#delete_role_{{ $role->id }}" class="role-delete-modal">
                                            <span style="color: #fe6d00 !important;">Delete Role</span>
                                        </a>
                                    @endcan

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @can('Create Roles')
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="row h-100">
                            <div class="col-sm-5">
                                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-4">
                                    <img src="{{ asset('backend//img/illustrations/add-new-roles.png') }}" class="img-fluid"
                                        alt="Image" width="83">
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                        class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role waves-effect waves-light">Add
                                        New Role</button>
                                    <p class="mb-0">
                                        Add new role, <br>
                                        if it doesn't exist.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

        </div>
    </div>


    {{-- add role modal --}}
    <div class="modal fade" id="addRoleModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="role-title">Add New Role</h4>
                        <p class="text-body-secondary">Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-3" action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="col-12 form-control-validation mb-3 fv-plugins-icon-container">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input type="text" id="modalRoleName" name="name" class="form-control"
                                placeholder="Enter a role name" tabindex="-1">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="mb-6">Role Permissions</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-medium">
                                                Administrator Access
                                                <i class="icon-base ti tabler-info-circle icon-xs" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" aria-label="Allows a full access to the system"
                                                    data-bs-original-title="Allows a full access to the system"></i>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                        <label class="form-check-label" for="selectAll"> Select All
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @if ($permissions->isNotEmpty())
                                        @php
                                        $groupedPermissions = $permissions->groupBy(function ($permission) {
                                            $parts = explode(' ', $permission->name);
                                            $type = $parts[1];

                                            // Special case for "Driver Details"
                                            if (
                                                str_contains($permission->name, 'Driver Details') ||
                                                str_contains($permission->name, 'Share From Driver')
                                            ) {
                                                return 'Drivers';
                                            }
                                            if (
                                                str_contains($permission->name, 'Vehicles Details') ||
                                                str_contains($permission->name, 'Share From Vehicle')
                                            ) {
                                                return 'Vehicles';
                                            }
                                            if (str_contains($permission->name, 'View Signed Agreement')) {
                                                return 'Allotment';
                                            }
                                            if (
                                                str_contains($permission->name, 'Company Vehicle Invoice')
                                            ) {
                                                return 'Company';
                                            }
                                            if (str_contains($permission->name, 'Other Vehicle Invoice')) {
                                                return 'Other';
                                            }

                                            return $type;
                                        });

                                        $customHeadings = [
                                            'Permissions' => 'Manage Permissions',
                                            'Roles' => 'Manage Roles',
                                            'Users' => 'Manage Users',
                                            'Drivers' => 'Driver Details',
                                            'Vehicles' => 'Vehicle Details',
                                            'Allotment' => 'Vehicle Allotment',
                                            'Company' => 'Company Vehicle Bookings',
                                            'Other' => 'Other Vehicle Bookings',
                                        ];
                                    @endphp

                                            @foreach ($groupedPermissions as $type => $permissionsGroup)
                                                <tr>
                                                    <td class="text-nowrap fw-medium text-heading">
                                                        {{ $customHeadings[$type] ?? ucfirst($type) }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-wrap">
                                                            @foreach ($permissionsGroup as $permission)
                                                                <div class="form-check my-2 flex-fill"
                                                                    style="min-width: 150px;">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="permission-{{ $permission->id }}"
                                                                        name="permission[]"
                                                                        value="{{ $permission->name }}">
                                                                    <label class="form-check-label"
                                                                        for="permission-{{ $permission->id }}">
                                                                        {{ $permission->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit"
                                class="btn btn-primary me-sm-4 me-1 waves-effect waves-light">Submit</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Role Modal -->
    @foreach ($roles as $role)
        <div class="modal fade" id="addRoleModal_{{ $role->id }}" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-6">
                            <h4 class="role-title">Edit Role</h4>
                            <p class="text-body-secondary">Set role permissions</p>
                        </div>
                        <!-- Add role form -->
                        <form id="addRoleForm" class="row g-3" method="POST"
                            action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12 form-control-validation mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="modalRoleName">Role Name</label>
                                <input type="text" id="modalRoleName" name="name" class="form-control"
                                    value="{{ $role->name }}" placeholder="Enter a role name" tabindex="-1">
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="mb-6">Role Permissions</h5>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap fw-medium">
                                                    Administrator Access
                                                    <i class="icon-base ti tabler-info-circle icon-xs"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        aria-label="Allows a full access to the system"
                                                        data-bs-original-title="Allows a full access to the system"></i>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="form-check mb-0">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="selectAll_{{ $role->id }}">
                                                            <label class="form-check-label"
                                                                for="selectAll_{{ $role->id }}"> Select All </label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if ($permissions->isNotEmpty())
                                                @php
                                                    $groupedPermissions = $permissions->groupBy(function ($permission) {
                                                        $parts = explode(' ', $permission->name);
                                                        $type = $parts[1];

                                                        // Special case for "Driver Details"
                                                        if (
                                                            str_contains($permission->name, 'Driver Details') ||
                                                            str_contains($permission->name, 'Share From Driver')
                                                        ) {
                                                            return 'Drivers';
                                                        }
                                                        if (
                                                            str_contains($permission->name, 'Vehicles Details') ||
                                                            str_contains($permission->name, 'Share From Vehicle')
                                                        ) {
                                                            return 'Vehicles';
                                                        }
                                                        if (str_contains($permission->name, 'View Signed Agreement')) {
                                                            return 'Allotment';
                                                        }
                                                        if (
                                                            str_contains($permission->name, 'Company Vehicle Invoice')
                                                        ) {
                                                            return 'Company';
                                                        }
                                                        if (str_contains($permission->name, 'Other Vehicle Invoice')) {
                                                            return 'Other';
                                                        }

                                                        return $type;
                                                    });

                                                    $customHeadings = [
                                                        'Permissions' => 'Manage Permissions',
                                                        'Roles' => 'Manage Roles',
                                                        'Users' => 'Manage Users',
                                                        'Drivers' => 'Driver Details',
                                                        'Vehicles' => 'Vehicle Details',
                                                        'Allotment' => 'Vehicle Allotment',
                                                        'Company' => 'Company Vehicle Bookings',
                                                        'Other' => 'Other Vehicle Bookings',
                                                    ];
                                                @endphp

                                                @foreach ($groupedPermissions as $type => $permissionsGroup)
                                                    <tr>
                                                        <td class="text-nowrap fw-medium text-heading">
                                                            {{ $customHeadings[$type] ?? ucfirst($type) }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-wrap">
                                                                @foreach ($permissionsGroup as $permission)
                                                                    <div class="form-check my-2 flex-fill"
                                                                        style="min-width: 150px;">
                                                                        <input
                                                                            {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}
                                                                            class="form-check-input" type="checkbox"
                                                                            id="permission-{{ $permission->id }}_{{ $role->id }}"
                                                                            name="permission[]"
                                                                            value="{{ $permission->name }}">
                                                                        <label class="form-check-label"
                                                                            for="permission-{{ $permission->id }}_{{ $role->id }}">
                                                                            {{ $permission->name }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn btn-primary me-sm-4 me-1 waves-effect waves-light">Submit</button>
                                <button type="reset" class="btn btn-label-secondary waves-effect"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                        <!--/ Add role form -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- delete Role Modal --}}
    @foreach ($roles as $role)
        <!-- Delete User Modal -->
        <div class="modal fade" id="delete_role_{{ $role->id }}" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="icon d-flex justify-content-center">
                                <div class="avatar avatar-xl bg-danger-light rounded-circle mb-3">
                                    <i class="icon-base ti tabler-trash fs-36 text-danger"></i>
                                </div>
                            </div>
                            <h4 class="mb-2">Remove Role?</h4>
                            <p class="mb-0">Are you sure you want to remove this {{ $role->name }}?</p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('roles.delete', $role->id) }}" method="POST"
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
        .modal-simple .modal-content {
            padding: 0px;
        }

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
        $(document).ready(function() {
            // Function to handle "Select All" checkbox
            function handleSelectAll(modalId, selectAllId) {
                const selectAllCheckbox = $(`#${modalId} #${selectAllId}`);
                const permissionCheckboxes = $(`#${modalId} input[name="permission[]"]`);

                // When "Select All" is clicked
                selectAllCheckbox.on('change', function() {
                    permissionCheckboxes.prop('checked', this.checked);
                });

                // When any permission checkbox is clicked
                permissionCheckboxes.on('change', function() {
                    if (!this.checked) {
                        selectAllCheckbox.prop('checked', false);
                    } else {
                        const allChecked = permissionCheckboxes.length === permissionCheckboxes.filter(
                            ':checked').length;
                        selectAllCheckbox.prop('checked', allChecked);
                    }
                });

                // Initialize "Select All" state based on current permissions
                const allChecked = permissionCheckboxes.length === permissionCheckboxes.filter(':checked').length;
                selectAllCheckbox.prop('checked', allChecked);
            }

            // Apply to "Add Role" modal
            handleSelectAll('addRoleModal', 'selectAll');

            // Apply to each "Edit Role" modal
            @foreach ($roles as $role)
                handleSelectAll('addRoleModal_{{ $role->id }}', 'selectAll_{{ $role->id }}');
            @endforeach
        });
    </script>
@endsection
