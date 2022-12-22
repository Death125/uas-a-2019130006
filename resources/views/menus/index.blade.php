@extends('layouts.master')
@section('title', 'Menu')

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
                        <h2>Menu List</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('menus.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Add New Menu</span>
                        </a>
                    </div>
                </div>
            </div>

            <table style="table-layout: fixed;width: 100%" class="table table-striped table-success table-hover">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Rekomendasi</th>
                        <th style="width: 20%">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr class="text-center">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a class="text" href="{{ route('menus.show', $menu->id) }}">
                                    {{ $menu->id }}
                                </a>
                            </td>
                            <td>{{ $menu->nama }}</td>
                            <td>
                                @if ($menu->rekomendasi == 1)
                                    <p>Yes</p>
                                @else
                                    <p>No</p>
                                @endif
                            </td>
                            <td class="price">{{ $menu->harga }}</td>
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
