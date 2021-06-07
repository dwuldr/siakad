@extends('sbadmin/master')
@section('title', 'alumni')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Alumni</h1>
        </div>
        <div class="card-body">
            <form action="/alumni" method="POST">
                @csrf
                <div class="container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_alumni">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_alumni" name="nama_alumni">
                            @error('nama_alumni')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="idKelas">Kelas</label>
                            <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
                                <option>-- Pilih Kelas --</option>
                                @foreach($kelas as $data)
                                    <option value="{{ $data->idKelas }}">{{ $data->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idAjaran">Tahun Akademik</label>
                            <select id="idAjaran" name="idAjaran" class="form-control @error('idAjaran') is-invalid @enderror select2bs4">
                                <option>-- Pilih Tahun Akademik --</option>
                                @foreach($tahun_ajaran as $data)
                                    <option value="{{ $data->idAjaran }}">{{ $data->tahun_akademik }}</option>
                                @endforeach
                            </select>
                        </div>
                                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/alumni" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
        </div>
    </div>
@endsection
