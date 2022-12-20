{{-- View untuk menampilkan form tambah order --}}
@extends('layouts.master')
@section('title', 'Order')

@section('content')
    <form action="{{ route('createOrder') }}" method="POST">
        @csrf

        <div class="container-md mx-auto" style="width: 60%;">
            <h2>Make New Order</h2>

            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <select style="width:100%;height: 50px;" name="status" id="dropdown-Size">
                        <option disabled selected>Pilih status order</option>

                        <option>Selesai</option>
                        <option>Menunggu pembayaran</option>

                    </select>

                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-3 mb-3">
                    <select style="width:100%;height: 50px;" name="nama" id="dropdown-Size">
                        <option disabled selected>Pilih Menu yang anda inginkan</option>

                        @foreach ($menus as $menu)
                            <option value="{{ $menu->nama }}">{{ $menu->nama }}</option>
                        @endforeach

                    </select>

                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                        quantity="quantity" value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col">
                    <h3>Total harga yang harus dibayar : </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
