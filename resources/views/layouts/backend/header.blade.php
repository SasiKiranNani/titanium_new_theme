<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
    id="layout-navbar">




    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="icon-base ti tabler-menu-2 icon-md"></i>
        </a>
    </div>


    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">

        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper px-md-0 px-2 mb-0 d-flex align-items-center"
                style="gap: 5px; color: #be623f !important;">
                <p class="user-details" style="margin: 0px"><b style="font-size: 18px">Hi {{ Auth::user()->name }}</b></p>
                <p class="user-details" style="margin: 0px; padding: 0px;">( {{ Auth::user()->roles->pluck('name')->join(', ') }} )</p>
            </div>
        </div>

        <!-- /Search -->





        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        {{-- <img src="{{ asset('backend/img/avatars/1.png') }}" alt class="rounded-circle" /> --}}
                        <span class="rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px; background-color: #f0f0f0; font-weight: bold; color: #333;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(strrchr(Auth::user()->name, ' '), 1, 1)) }}
                        </span>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item mt-0" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        {{-- <img src="{{ asset('backend/img/avatars/1.png') }}" alt
                                            class="rounded-circle" /> --}}
                                        <span class="rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: #f0f0f0; font-weight: bold; color: #333;">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(strrchr(Auth::user()->name, ' '), 1, 1)) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small
                                        class="text-body-secondary">{{ Auth::user()->roles->pluck('name')->join(', ') }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <div class="d-grid px-2 pt-2 pb-1">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger d-flex" style="width: 100%;">
                                    <small class="align-middle">Logout</small>
                                    <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ User -->

        </ul>
    </div>
</nav>

<!-- / Navbar -->
