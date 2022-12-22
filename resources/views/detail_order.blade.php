@extends('layouts.master')
@section('title', 'Home')

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: rgb(69, 194, 194);
        }
    </style>
@endpush

@section('carousel')
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Detail Order</h2>
                    </div>

                </div>
            </div>

            <table style="table-layout: fixed;width: 100%" class="table table-striped table-success table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order_id</th>
                        <th>Menu_id</th>
                        <th>Nama menu</th>
                        <th>Rekomendasi</th>
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th style="width: 20%">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order_menus as $order_menu)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $order_menu->order->id }}</td>
                            <td><a class="text" href="{{ route('menus.show', $order_menu->menu->id) }}">
                                    {{ $order_menu->menu->id }}
                                </a>
                            </td>
                            <td>{{ $order_menu->menu->nama }}</td>
                            <td>
                                @if ($order_menu->menu->rekomendasi == 1)
                                    <p>Yes</p>
                                @else
                                    <p>No</p>
                                @endif
                            </td>
                            <td>{{ $order_menu->order->status }}</td>
                            <td>{{ $order_menu->quantity }}</td>
                            <td class="price">{{ $order_menu->menu->harga }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('js_after')
        <script>
            const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'IDR'
            });
            const elements = document.querySelectorAll('.price');
            [...elements].forEach((element) => {
                element.innerHTML = formatter.format(element.innerHTML);
            });
        </script>
    @endpush
@endsection
