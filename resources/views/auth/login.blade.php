{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')
@section('content')
	<!--begin::Head-->
	<head><base href=""/>
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

    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
                    {{-- <a href="{{ url('/') }}" class="py-2 py-lg-20">
                        <img alt="Logo" src="{{ asset('assets/media/logos/mail.svg') }}" class="h-40px h-lg-50px" />
                    </a> --}}

                </div>
                <div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{ asset('assets/media/illustrations/sketchy-1/17.png') }})"></div>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <form class="form w-100" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In to Saul HTML Free</h1>
                            <div class="text-gray-400 fw-semibold fs-4">New Here? <a href="{{ route('register') }}" class="link-primary fw-bold">Create an Account</a></div>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bold text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                               
                            </div>
                            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" />
                            <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bold">Forgot Password ?</a>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    {{ __('Login') }}
                                </button>

                             
                            </div>
                        </div>
@endsection