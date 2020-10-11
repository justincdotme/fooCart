<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @yield('content')

    @stack('vars')
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Justin Christenson</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#">Contact Us</a>
            </li>
        </ul>
    </footer>
</div>

<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>