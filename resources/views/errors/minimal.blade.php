<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/error.css') }}">
</head>
<body>
<div id="error">
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
{{--            <img class="img-error" src="@yield('image')" alt="Not Found">--}}
            <div class="text-center">
                <h1 class="error-title">@yield('code')</h1>
                <p class="fs-5 text-gray-600"> @yield('message')</p>
                <a href="{{ url('/') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
