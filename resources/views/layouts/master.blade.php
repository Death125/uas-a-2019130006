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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                <a class="nav-link {{ Route::is('detailOrder') ? 'active' : '' }}"
                    href="{{ route('detailOrder') }}">Detail Order<span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    @section('carousel')
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/images/restaurantview.jpg') }}" alt="First slide"
                        height="600">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><b>Bright Restaurant</b></h5>
                        <p>Join us, you will get the best service, beautiful views that you can enjoy and a wide variety
                            of dishes will make you never satisfied to keep trying</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/restaurantTable.jpg') }}" alt="Second slide"
                        height="600">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/Food.png') }}" alt="Third slide"
                        height="600">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </header>
    @show

    {{-- Content --}}
    <div class="col p-4"> @yield('content') </div>
    {{-- Content END --}}

    {{-- Footer  --}}
    <footer
        class="bg-dark text-center text-white {{ Route::is('order') ? 'fixed-bottom' : '' }} {{ Route::is('menus.show') ? 'fixed-bottom' : '' }}">
        <div class="container p-4">
            {{-- Join our --}}
            <section class="mb-4">
                <p>
                    Join Our digital mailing list and get news, deals and be first to know about events at Bright
                    Restaurant!
                </p>
            </section>

            {{-- SignUp Newsletter --}}
            <section class="">
                <form action="">

                    <div class="row d-flex justify-content-center">

                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>

                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                            </div>
                        </div>

                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </section>

            <span style="font-family: Arial, Helvetica, sans-serif">
                <p class="text-center">Follow us at</p>
            </span>

            <section class="mb-2 mt-1">
                {{-- Facebook --}}
                <a href="{{ url('https://id-id.facebook.com/') }}" target="_blank"><img
                        src="{{ asset('assets/images/fb.png') }}" width="80" height="50"></a>

                {{-- Twitter  --}}
                <a href="{{ url('https://twitter.com/') }}" target="_blank"><img
                        src="{{ asset('assets/images/Twitter.png') }}" width="80" height="50"></a>

                {{-- Gmail  --}}
                <a href="{{ url('https://mail.google.com//') }}" target="_blank"><img
                        src="{{ asset('assets/images/Gmail.png') }}" width="80" height="50"></a>

                {{-- Instagram  --}}
                <a href="{{ url('https://www.instagram.com/?hl=id') }}" target="_blank"><img
                        src="{{ asset('assets/images/Instagram.png') }}" width="80" height="50"></a>

                {{-- Youtube  --}}
                <a href="{{ url('https://www.youtube.com/') }}" target="_blank"><img
                        src="{{ asset('assets/images/Youtube.png') }}" width="80" height="50"></a>
            </section>

        </div>
        </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="#">Viki Fernando</a>

            <div class="row m-0 p-0">
                <div class="col">
                    <a href="{{ url('/') }}">Home</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script> @stack('js_after')
</body>

</html>
