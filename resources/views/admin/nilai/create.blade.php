@extends('sbadmin2/master')
@section('title', 'nilai')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Nilai</h1>
        </div>
        <div class="card-body">
            <form action="/nilai" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option>-- Pilih mapel--</option>
                        @foreach($mapel as $data)
                            {{-- <option value="{{ $data->idMapel }}">{{ $data->nama_guru }}</option> --}}
                            <option value="{{ $data->idMapel }}">{{ $data->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idGuru">Guru</label>
                    <select id="idGuru" name="idGuru" class="form-control @error('idGuru') is-invalid @enderror select2bs4">
                        <option>-- Pilih Guru --</option>
                        @foreach($guru as $data)
                            {{-- <option value="{{ $data->idGuru }}">{{ $data->nama_guru }}</option> --}}
                            <option value="{{ $data->idGuru }}">{{ $data->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSiswa">Siswa</label>
                    <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                        <option>-- Pilih --</option>
                        @foreach($siswa as $data)
                            {{-- <option value="{{ $data->idSiswa }}">{{ $data->nama_guru }}</option> --}}
                            <option value="{{ $data->idSiswa }}">{{ $data->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nilai_harian">UH</label>
                    <input type="text" class="form-control" id="nilai_harian" name="nilai_harian">
                    @error('nilai_harian')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_uts">UTS</label>
                    <input type="text" class="form-control" id="nilai_uts" name="nilai_uts">
                    @error('nilai_uts')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_uas">UAS</label>
                    <input type="text" class="form-control" id="nilai_uas" name="nilai_uas">
                    @error('nilai_uas')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/nilai" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


