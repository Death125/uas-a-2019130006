@extends('layouts.master')
@section('title', 'Home')

@section('carousel')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $menu->nama }}</h2>
            </div>

            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3 confirmation">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <p class="lead">Rekomendasi : {{ $menu->rekomendasi }}</p>
        <p class="lead">Harga : <span class="price">{{ $menu->harga }}</span></p>
    </div>
@endsection

@push('js_after')
    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function(e) {
            if (!confirm('Are you sure want to delete this menu?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>

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
