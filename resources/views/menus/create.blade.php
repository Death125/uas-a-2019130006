@extends('layouts.master')
@section('title', 'Add New Menu')

@section('content')
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        <div class="container-md mx-auto" style="width: 700px;">
            <h2>Add New Menu</h2>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="id">Id</label>
                    <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                        value="{{ old('id') }}">
                    @error('id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="rekomendasi">Rekomendasi</label>
                    <input placeholder="Input 1 for yes, 0 for no" type="number"
                        class="form-control @error('rekomendasi') is-invalid @enderror" name="rekomendasi" id="rekomendasi"
                        min="0" max="1" value="{{ old('rekomendasi') }}">
                    @error('rekomendasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                        id="harga" value="{{ old('harga') }}">
                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
                </div>
            </div>
        </div>
    </form>
@endsection
