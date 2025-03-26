<aside id="layout-menu" class="layout-menu menu-vertical menu">

    <div class="app-brand demo d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard') }}" class="app-brand-link mx-auto">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="">
                </span>
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>

    {{-- <div class="menu-inner-shadow"></div> --}}



    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        @can('View Dashboard')
            <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboard</div>
                </a>
            </li>
        @endcan

        @canany(['View Drivers', 'View Categories', 'View Vehicles', 'Upcoming Allotment', 'Ongoing Allotment',
            'Completed Allotment'])
            <!-- Vehicle Management -->
            <li class="menu-header small">
                <span class="menu-header-text" data-i18n="Apps & Pages">Vehicle Management</span>
            </li>

            {{-- driver --}}
            @can('View Drivers')
                <li
                    class="menu-item {{ request()->is('admin/drivers/list') || request()->is('admin/driver/details') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon icon-base ti tabler-users"></i>
                        <div data-i18n="Users">Driver Details</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('admin/drivers/list') ? 'active' : '' }}">
                            <a href="{{ route('drivers.list') }}" class="menu-link">
                                <div data-i18n="List">List</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/driver/details') ? 'active' : '' }}">
                            <a href="{{ route('driver.details') }}" class="menu-link">
                                <div data-i18n="List">Details</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('View Categories')
                {{-- category --}}
                <li class="menu-item {{ request()->is('admin/category') ? 'active' : '' }}">
                    <a href="{{ route('category') }}" class="menu-link">
                        <i class="menu-icon icon-base ti tabler-category"></i>
                        <div data-i18n="Dashboards">Categories</div>
                    </a>
                </li>
            @endcan

            @can('View Vehicles')
                {{-- vehicle --}}
                <li
                    class="menu-item {{ request()->is('admin/vehicles') || request()->is('admin/vehicle/details') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon icon-base ti tabler-car"></i>
                        <div data-i18n="Users">Vehicle Details</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('admin/vehicles') ? 'active' : '' }}">
                            <a href="{{ route('vehicle') }}" class="menu-link">
                                <div data-i18n="List">List</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/vehicle/details') ? 'active' : '' }}">
                            <a href="{{ route('vehicle.details') }}" class="menu-link">
                                <div data-i18n="List">Details</div>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @canany(['Upcoming Allotment', 'Ongoing Allotment', 'Completed Allotment'])
                {{-- vehicle allotment --}}
                <li
                    class="menu-item {{ request()->is('admin/assign-vehicle/upcoming') || request()->is('admin/assign/vehicle/ongoing') || request()->is('admin/assign/vehicle/completed') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon icon-base ti tabler-truck"></i>
                        <div data-i18n="Users">Vehicle Allotment</div>
                    </a>
                    <ul class="menu-sub">
                        @can('Upcoming Allotment')
                            <li class="menu-item {{ request()->is('admin/assign-vehicle/upcoming') ? 'active' : '' }}">
                                <a href="{{ route('assign.vehicle.list') }}" class="menu-link">
                                    <div data-i18n="List">Up Coming</div>
                                </a>
                            </li>
                        @endcan

                        @can('Ongoing Allotment')
                            <li class="menu-item {{ request()->is('admin/assign/vehicle/ongoing') ? 'active' : '' }}">
                                <a href="{{ route('assign.vehicle.ongoing') }}" class="menu-link">
                                    <div data-i18n="List">On Going</div>
                                </a>
                            </li>
                        @endcan

                        @can('Completed Allotment')
                            <li class="menu-item {{ request()->is('admin/assign/vehicle/completed') ? 'active' : '' }}">
                                <a href="{{ route('assign.vehicle.completed') }}" class="menu-link">
                                    <div data-i18n="List">Completed</div>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany

        @endcanany


        @canany([
            'View Timeslot',
            'View Services',
            'View Jobs',
            'View Company Vehicle Bookings',
            'View Other Vehicle
            Bookings',
            'View Accident',
            ])
            {{-- Service Management --}}
            <li class="menu-header small">
                <span class="menu-header-text" data-i18n="Apps & Pages">Service Management</span>
            </li>

            @can('View Timeslot')
                <li class="menu-item {{ request()->is('admin/time-slots') ? 'active' : '' }}">
                    <a href="{{ route('time.slots') }}" class="menu-link">
                        <i class="menu-icon icon-base ti tabler-clock"></i>
                        <div data-i18n="Dashboards">Time Slot</div>
                    </a>
                </li>
            @endcan


            @canany(['View Services', 'View Jobs'])
                <li
                    class="menu-item {{ request()->is('admin/services/service') || request()->is('admin/services/job') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon icon-base ti tabler-briefcase"></i>
                        <div data-i18n="Users">Services & Jobs</div>
                    </a>
                    <ul class="menu-sub">
                        @can('View Services')
                            <li class="menu-item {{ request()->is('admin/services/service') ? 'active' : '' }}">
                                <a href="{{ route('services.service') }}" class="menu-link">
                                    <div data-i18n="List">Services</div>
                                </a>
                            </li>
                        @endcan

                        @can('View Jobs')
                            <li class="menu-item {{ request()->is('admin/services/job') ? 'active' : '' }}">
                                <a href="{{ route('services.job') }}" class="menu-link">
                                    <div data-i18n="List">Jobs</div>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany

            @canany(['View Company Vehicle Bookings', 'View Other Vehicle Bookings'])
                <li
                    class="menu-item {{ request()->is('admin/services/company-vehicle') || request()->is('admin/services/other-vehicle') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon icon-base ti tabler-calendar"></i>
                        <div data-i18n="Users">Service Bookings</div>
                    </a>
                    <ul class="menu-sub">
                        @can('View Company Vehicle Bookings')
                            <li class="menu-item {{ request()->is('admin/services/company-vehicle') ? 'active' : '' }}">
                                <a href="{{ route('services.company-vehicle') }}" class="menu-link">
                                    <div data-i18n="List">Company Vehicle</div>
                                </a>
                            </li>
                        @endcan

                        @can('View Other Vehicle Bookings')
                            <li class="menu-item {{ request()->is('admin/services/other-vehicle') ? 'active' : '' }}">
                                <a href="{{ route('services.other-vehicle') }}" class="menu-link">
                                    <div data-i18n="List">Other Vehicle</div>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany

            @can('View Accident')
                <li class="menu-item {{ request()->is('admin/services/accident') ? 'active' : '' }}">
                    <a href="{{ route('services.accident') }}" class="menu-link">
                        <i class="menu-icon icon-base ti tabler-alert-triangle"></i>
                        <div data-i18n="Dashboards">Accident</div>
                    </a>
                </li>
            @endcan
        @endcanany





        @canany(['Company Vehicle Invoice Management', 'Other Vehicle Invoice Management'])

            {{-- Invoice Management --}}
            <li class="menu-header small">
                <span class="menu-header-text" data-i18n="Apps & Pages">Invoice Management</span>
            </li>

            <li
                class="menu-item {{ request()->is('admin/services/company-vehicle/invoice') || request()->is('admin/services/other-vehicle/invoice') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-file-invoice"></i>
                    <div data-i18n="Users">Service Invoices</div>
                </a>
                <ul class="menu-sub">
                    @can('Company Vehicle Invoice Management')
                        <li class="menu-item {{ request()->is('admin/services/company-vehicle/invoice') ? 'active' : '' }}">
                            <a href="{{ route('services.company-vehicle.invoice') }}" class="menu-link">
                                <div data-i18n="List">Company Invoice</div>
                            </a>
                        </li>
                    @endcan

                    @can('Other Vehicle Invoice Management')
                        <li class="menu-item {{ request()->is('admin/services/other-vehicle/invoice') ? 'active' : '' }}">
                            <a href="{{ route('services.other-vehicle.invoice') }}" class="menu-link">
                                <div data-i18n="List">Other Invoice</div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany

        @canany(['View Users', 'View Roles', 'View Permissions'])
            {{-- user management --}}
            <li class="menu-header small">
                <span class="menu-header-text" data-i18n="Apps & Pages">User Management</span>
            </li>

            <li
                class="menu-item {{ request()->is('admin/users') || request()->is('admin/roles') || request()->is('admin/permissions') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-settings"></i>
                    <div data-i18n="Management">Roles & Permissions</div>
                </a>
                <ul class="menu-sub">

                    @can('View Users')
                        <li class="menu-item {{ request()->is('admin/users') ? 'active' : '' }}">
                            <a href="{{ route('users') }}" class="menu-link">
                                <div data-i18n="List">Users</div>
                            </a>
                        </li>
                    @endcan

                    @can('View Roles')
                        <li class="menu-item {{ request()->is('admin/roles') ? 'active' : '' }}">
                            <a href="{{ route('roles') }}" class="menu-link">
                                <div data-i18n="List">Roles</div>
                            </a>
                        </li>
                    @endcan

                    @can('View Permissions')
                        <li class="menu-item {{ request()->is('admin/permissions') ? 'active' : '' }}">
                            <a href="{{ route('permissions') }}" class="menu-link">
                                <div data-i18n="List">Permissions</div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany

    </ul>


</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>
<!-- / Menu -->
