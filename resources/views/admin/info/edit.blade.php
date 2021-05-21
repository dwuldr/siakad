@extends('sbadmin/master')
@section('title', 'info')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Mapel</h1>

    <form action="{{ route('info.update', $info->idInfo)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" id="tgl" name="tgl" value="{{$info->tgl}}" class="form-control @error('tgl') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="pengumuman">Pengumuman</label>
                    <input type="text" id="pengumuman" name="pengumuman" value="{{$info->pengumuman}}" class="form-control @error('pengumuman') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/info" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
