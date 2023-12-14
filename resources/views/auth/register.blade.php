@extends('layouts.app')

@section('content')
<title>Saul Theme by Keenthemes</title>
<meta charset="utf-8" />
<meta name="description" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
<meta name="keywords" content="Saul, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
<meta property="og:url" content="https://keenthemes.com/products/saul-html-pro" />
<meta property="og:site_name" content="Keenthemes | Saul HTML Free" />
<link rel="canonical" href="https://preview.keenthemes.com/saul-html-free" />
<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>

<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-600px p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('register') }}" id="kt_sign_up_form">
                @csrf
                <!--begin::Heading-->
                <div class="mb-10 text-center">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Create an Account</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-semibold fs-4">Already have an account?
                        <a href="{{ route('login') }}" class="link-primary fw-bold">Sign in here</a>
                    </div>
                    <!--end::Link-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="row fv-row mb-7">
                    <!--begin::Col-->
                  
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <label class="form-label fw-bold text-dark fs-6"> Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <label class="form-label fw-bold text-dark fs-6">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-label fw-bold text-dark fs-6">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-5">
                    <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-check form-check-custom form-check-solid form-check-inline">
                        <input class="form-check-input" type="checkbox" name="terms" value="1" required />
                        <span class="form-check-label fw-semibold text-gray-700 fs-6">I Agree
                            <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                        </span>
                    </label>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
        <!--begin::Links-->
        <div class="d-flex flex-center fw-semibold fs-6">
            <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>
            <a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
            <a href="https://keenthemes.com/products/saul-html-pro" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Body-->

@endsection
