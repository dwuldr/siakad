@extends('sbadmin/master')
@section('title', 'Mapel')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Mapel</h1>

    <form action="/mapel" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_mapel">Nama Mapel</label>
                    <input type="text" id="nama_mapel" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/mapel" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
