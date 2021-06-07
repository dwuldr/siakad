@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Guru</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas->idKelas)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idGuru">Guru</label>
                    <select id="idGuru" name="idGuru" class="form-control @error('idGuru') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Guru --</option>
                        @foreach($guru as $data)
                            @if ($data->idGuru == $kelas->idGuru)
                                <option value="{{ $data->idGuru }}" selected>{{ $data->nama_guru }}</option>
                            @else
                                <option value="{{ $data->idGuru }}">{{ $data->nama_guru }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" value="{{$kelas->nama_kelas}}" class="form-control" id="nama_kelas" name="nama_kelas">
                    @error('nama_kelas')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/kelas" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection

