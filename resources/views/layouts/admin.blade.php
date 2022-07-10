<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Superalfa') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/choices.js/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack("head_style")
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/logo.png') }}" type="image/x-icon">
    @livewireStyles
    <!-- Scripts -->
    @stack("head_script")
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body>
    <div id="app">
        @livewire('container')
        @isset($show_menu)
            @include('navigation-menu-admin', ['show_menu'=>$show_menu])
        @else
            @include('navigation-menu-admin', ['show_menu'=>true])
        @endisset

        <div id="main">
            <header class="mb-3">
                @isset($show_menu)
                    <a href="#" class="burger-btn d-block {{ $show_menu ? 'd-xl-none' : '' }}">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                @else
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                @endisset
            </header>
            @isset($header)
                <div class="page-heading">
                    <h3>{{ $header }}</h3>
                </div>
            @endisset
            {{ $slot }}
            {{-- <footer> --}}
            {{-- <div class="footer clearfix mb-0 text-muted"> --}}
            {{-- <div class="float-start"> --}}
            {{-- <p>2021 &copy; Mazer</p> --}}
            {{-- </div> --}}
            {{-- <div class="float-end"> --}}
            {{-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a --}}
            {{-- href="http://ahmadsaugi.com">A. Saugi</a></p> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </footer> --}}
        </div>
    </div>
    @livewireScripts
    @livewireChartsScripts
    @include('includes.scripts')
    <script>
        //  autosize(document.querySelectorAll('textarea'));
    </script>
    @stack("script")
</body>

</html>
