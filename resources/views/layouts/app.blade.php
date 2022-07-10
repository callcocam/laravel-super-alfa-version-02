<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Superalfa') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/logo.png') }}" type="image/x-icon">
    @livewireStyles
    <!-- Scripts -->
</head>
<body>
<div id="app">
    @livewire('container')
    @include('navigation-menu')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @isset($header)
            <div class="page-heading">
                <h3>{{ $header }}</h3>
            </div>
        @endisset
        {{ $slot }}
{{--        <footer>--}}
{{--            <div class="footer clearfix mb-0 text-muted">--}}
{{--                <div class="float-start">--}}
{{--                    <p>2021 &copy; Mazer</p>--}}
{{--                </div>--}}
{{--                <div class="float-end">--}}
{{--                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a--}}
{{--                            href="http://ahmadsaugi.com">A. Saugi</a></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
    </div>
</div>
@livewireScripts

<script src="{{ mix('js/app.js') }}"></script>
@livewireChartsScripts
@include('includes.scripts')

@stack('scripts')
</body>
</html>
