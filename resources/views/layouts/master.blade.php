<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bright Restaurant') | Bright Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> @stack('css_after')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Bright Restaurant</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home<span
                        class="sr-only">(current)</span></a>
                <a class="nav-link {{ Route::is('menus.index') ? 'active' : '' }}"
                    href="{{ route('menus.index') }}">Menu<span class="sr-only">(current)</span></a>
                <a class="nav-link {{ Route::is('order') ? 'active' : '' }}" href="{{ route('order') }}">Order<span
                        class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <div class="col p-4"> @yield('content') </div>
    {{-- Content END --}}

    <div class="text-center text-white p-3 fixed-bottom bg-primary">
        © 2022 Copyright:
        <a class="text-white" href="#">Viki Fernando</a>

        <div class="row m-0 p-0">
            <div class="col">
                <b> <a class="text-dark" style="border-bottom:1px solid blue" href="{{ url('/') }}">Home</a></b>
            </div>
        </div>
    </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script> @stack('js_after')
</body>

</html>
