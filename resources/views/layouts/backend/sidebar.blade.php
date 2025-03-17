<aside id="layout-menu" class="layout-menu menu-vertical menu">

    <div class="app-brand demo d-flex justify-content-between align-items-center">
        <a href="index.html" class="app-brand-link mx-auto">
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
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <!-- Vehicle Management -->
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Apps & Pages">Vehicle Management</span>
        </li>

        {{-- driver --}}
        <li class="menu-item {{ request()->is('admin/drivers/list') || request()->is('admin/driver/details') ? 'active open' : '' }}">
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

        {{-- category --}}
        <li class="menu-item {{ request()->is('admin/category') ? 'active' : '' }}">
            <a href="{{ route('category') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboards">Categories</div>
            </a>
        </li>

        {{-- vehicle --}}
        <li class="menu-item {{ request()->is('admin/vehicles') || request()->is('admin/vehicle/details') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
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

        {{-- vehicle allotment --}}
        <li class="menu-item {{ request()->is('admin/assign-vehicle/upcoming') || request()->is('admin/assign/vehicle/ongoing') || request()->is('admin/assign/vehicle/completed') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="Users">Vehicle Allotment</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/assign-vehicle/upcoming') ? 'active' : '' }}">
                    <a href="{{ route('assign.vehicle.list') }}" class="menu-link">
                        <div data-i18n="List">Up Coming</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/assign/vehicle/ongoing') ? 'active' : '' }}">
                    <a href="{{ route('assign.vehicle.ongoing') }}" class="menu-link">
                        <div data-i18n="List">On Going</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/assign/vehicle/completed') ? 'active' : '' }}">
                    <a href="{{ route('assign.vehicle.completed') }}" class="menu-link">
                        <div data-i18n="List">Completed</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Service Management --}}
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Apps & Pages">Service Management</span>
        </li>

        <li class="menu-item {{ request()->is('admin/time-slots') ? 'active' : '' }}">
            <a href="{{ route('time.slots') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboards">Time Slot</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="Users">Services & Jobs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('services.service') }}" class="menu-link">
                        <div data-i18n="List">Services</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="List">Jobs</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="Users">Service Bookings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="List">Company Vehicle</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="List">Other Vehicle</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboards">Accident</div>
            </a>
        </li>
    </ul>


</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>
<!-- / Menu -->
