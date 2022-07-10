<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Superalfa') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/auth.css') }}"> <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="shortcut icon" href="{{ asset('assets/admin/images/logo/logo.png') }}" type="image/x-icon">
    </head>
    <body>
    <div id="auth" class="container-fluid">
        <div class="row h-100 justify-content-center mt-10 m-3">
            <div class="col-lg-6 col-12">
                <div id="auth">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
