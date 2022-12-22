{{-- View untuk menampilkan form tambah order --}}
@extends('layouts.master')
@section('title', 'Order')

@section('carousel')
@endsection

@section('content')
    <form action="{{ route('createOrder') }}" method="POST">
        @csrf

        <div class="container-md mx-auto" style="width: 60%;">
            <h2>Make New Order</h2>

            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <select style="width:100%;height: 50px;" name="status" id="dropdown-Size">
                        <option disabled selected>Pilih status order</option>
                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Menunggu Pembayaran" {{ old('status') == 'Menunggu Pembayaran' ? 'selected' : '' }}>
                            Menunggu pembayaran</option>
                    </select>

                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mt-3 mb-3">
                    <select class="menuName" style="width:100%;height: 50px;" name="menu_id" id="menu_id">
                        <option disabled selected>Pilih Menu yang anda inginkan</option>

                        @foreach ($menu as $menus)
                            @if (old('menu_id') == $menus->id)
                                <option value="{{ $menus->id }}" selected>{{ $menus->nama }}</option>
                            @else
                                <option value="{{ $menus->id }}">{{ $menus->nama }}</option>
                            @endif
                        @endforeach

                    </select>

                    @error('menu_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                        min="1" id='quantity' value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="rekomendasi">Rekomendasi</label>
                    <input type="text" class="form-control @error('rekomendasi') is-invalid @enderror" name="rekomendasi"
                        min="1" id='rekomendasi' value="" readonly>
                    @error('rekomendasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col">
                    <h3 class='totalPrice'></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

    @push('js_after')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on('change', '.quantity', function() {
                    var id = document.getElementById('menu_id').value;

                    console.log(id);


                })
            })
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('change', '.menuName', function() {
                    //  console.log('change');
                    // console.log(id);

                    var menuId = $(this).val();
                    var price = $(this).parent().parent().parent();

                    quantity = document.getElementById('quantity').value;
                    let ppn = 0.11;

                    const formatter = new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'IDR'
                    });

                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('findMenuPrice') !!}',
                        data: {
                            'id': menuId,
                        },
                        dataType: 'json',
                        success: function(data) {
                            //  console.log("price");
                            // console.log(data.harga);
                            var totalPrice = (data.harga * quantity) + ppn * (data.harga *
                                quantity);

                            price.find('.totalPrice').html("Total harga yang harus dibayar : " +
                                formatter.format(totalPrice));

                            // console.log(quantity);
                        },
                        error: function() {
                            console.log('error');
                        }

                    });
                });
            });
        </script>
    @endpush
@endsection
