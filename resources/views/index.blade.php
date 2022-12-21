{{-- Navigasi ke halaman utama, halaman menu, dan halaman order --}}
{{-- Informasi angka total data menu dan angka total data order --}}
@extends('layouts.master')
@section('title', 'Home')

@push('css_after')
    <style>
        .container1 {
            position: relative;
            text-align: center;
            color: white;
            margin: 0 auto;
        }

        .font-lucida {
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        .centered {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .jbg-color {
            filter: invert(18%) sepia(22%) saturate(177%) hue-rotate(32deg) brightness(75%) contrast(30%);
        }
    </style>
@endpush

@section('carousel')
    @parent
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    {{-- Introduction --}}
    <div class="py-2 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Bright Restaurant</h1>
                <p class="lead text-muted font-lucida"> There are so many choices of food and drinks that you can try at
                    affordable
                    prices. What are you waiting for ? let's order now!</p>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-6 mb-3 font-lucida">
                <h5> Total Our Menu : {{ $menus }}</h5>
            </div>
            <div class="col-6 mb-3 font-lucida">
                <h5>Total Order : {{ $orders }}</h5>
            </div>
        </div>
    </div>

    <div class="container align-items-center justify-content-center mb-4">
        <div class="row w-100 p-0 mx-auto justify-content-center" style="width: 100%;">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3 d-flex align-items-stretch">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('assets/images/menu.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Our Menu</h5>
                        <p class="card-text text-justify">The menu that we provide is very diverse, ranging from
                            appetizers,
                            desserts,
                            and drinks.</p>
                        <a href="{{ route('menus.index') }}" class="btn btn-primary">View our menu</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3 d-flex align-items-stretch">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('assets/images/menu2.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Order</h5>
                        <p class="card-text text-justify">Don't forget to order food and drinks at our restaurant :)</p>
                        <a href="{{ route('order') }}" class="btn btn-primary">Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
