@extends('sbadmin/master')
@section('title', 'Mapel')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Mapel</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('mapel.update', $mapel->idMapel)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_mapel">Nama Mapel</label>
                    <input type="text" id="nama_mapel" name="nama_mapel" value="{{$mapel->nama_mapel}}" class="form-control @error('nama_mapel') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/mapel" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


