@extends('sbadmin/master')
@section('title', 'nilai')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit nilai</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('nilai.update', $nilai->idNilai)}}"method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih mapel --</option>
                        @foreach($mapel as $data)
                            <option value="{{ $data->idNilai }}">{{ $data->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idGuru">Guru</label>
                    <select id="idGuru" name="idGuru" class="form-control @error('idGuru') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Guru --</option>
                        @foreach($guru as $data)
                            <option value="{{ $data->idGuru }}">{{ $data->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSiswa">Siswa</label>
                    <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Tahun --</option>
                        @foreach($siswa as $data)
                            <option value="{{ $data->idSiswa }}">{{ $data->nama_siswa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nilai_harian">UH</label>
                    <input type="text" value="{{$siswa->nilai_harian}}" class="form-control" id="nilai_harian" name="nilai_harian">
                    @error('nilai_harian')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_uts">UTS</label>
                    <input type="text" value="{{$siswa->nilai_uts}}" class="form-control" id="nilai_uts" name="nilai_uts">
                    @error('nilai_uts')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nilai_uas">UAS</label>
                    <input type="text" value="{{$siswa->nilai_uas}}" class="form-control" id="nilai_uas" name="nilai_uas">
                    @error('nilai_uas')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/nilai" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


