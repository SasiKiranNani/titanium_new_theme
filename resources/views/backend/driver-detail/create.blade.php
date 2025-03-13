@extends('layouts.backend.index')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">


            <div class="card">
                <div class="row">
                    <div class="card mb-6">
                        <h5 class="card-header">Create New User</h5>
                        <form class="card-body">
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-username">Username</label>
                                    <input type="text" name="name" id="multicol-username" class="form-control"
                                        placeholder="john.doe">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-email">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="email" id="multicol-email" class="form-control"
                                            placeholder="john.doe" aria-label="john.doe" aria-describedby="multicol-email2">
                                        <span class="input-group-text" id="multicol-email2">@example.com</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-abn">ABN</label>
                                    <input type="text" name="abn" id="multicol-abn" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-birthdate">Birth Date</label>
                                    <input type="text" id="multicol-birthdate" name="dob"
                                        class="form-control dob-picker flatpickr-input" placeholder="YYYY-MM-DD"
                                        readonly="readonly">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-licence_no">Licence Number</label>
                                    <input type="text" name="licence_no" id="multicol-licence_no" class="form-control"
                                        placeholder="Licence Number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-contact">Contact </label>
                                    <input type="text" name="contact" id="multicol-contact" class="form-control"
                                        placeholder="Contact">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-address">Address</label>
                                    <textarea name="address" class="form-control" id="collapsible-address" rows="2" placeholder="1456, Mall Road"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="collapsible-city">Suburb</label>
                                    <input type="text" id="collapsible-city" class="form-control" placeholder="Jackson">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="collapsible-city">State</label>
                                    <input type="text" id="collapsible-city" class="form-control" placeholder="Jackson">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="collapsible-pincode">Pincode</label>
                                    <input type="text" id="collapsible-pincode" class="form-control"
                                        placeholder="658468">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-password-toggle">
                                        <label class="form-label" for="multicol-password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="multicol-password" class="form-control"
                                                placeholder="············" aria-describedby="multicol-password2">
                                            <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                                    class="icon-base ti tabler-eye-off"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-password-toggle">
                                        <label class="form-label" for="multicol-confirm-password">Confirm Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="multicol-confirm-password" class="form-control"
                                                placeholder="············" aria-describedby="multicol-confirm-password2">
                                            <span class="input-group-text cursor-pointer"
                                                id="multicol-confirm-password2"><i
                                                    class="icon-base ti tabler-eye-off"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="collapsible-notes">Notes</label>
                                    <textarea name="notes" class="form-control" id="collapsible-notes" rows="2"></textarea>
                                </div>
                                <div class="row mb-3">
                                    <h5 class="fw-semibold">Assign Roles</h5>
                                    @if ($roles->isNotEmpty())
                                        @foreach ($roles as $role)
                                        <div class="col-lg-2 col-md-2 col-sm-12 mt-3">
                                            <div class="form-check mb-0 me-4 me-lg-12">
                                                <input class="form-check-input" type="checkbox"
                                                    id="role-{{ $role->id }}" name="role[]"
                                                    value="{{ $role->name }}">
                                                <label class="form-check-label"
                                                    for="role-{{ $role->id }}">{{ $role->name }} </label>
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

    <style>

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
@endsection
