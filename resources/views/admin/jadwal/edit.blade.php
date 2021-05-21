@extends('sbadmin/master')
@section('title', 'jadwal')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Edit Jadwal</h1>

    <form action="{{ route('jadwal.update', $jadwal->idJadwal)}}"method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Mapel --</option>
                        @foreach($mapel as $data)
                            <option value="{{ $data->idMapel }}">{{ $data->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idKelas">Kelas</label>
                    <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $data)
                            <option value="{{ $data->idKelas }}">{{ $data->nama_kelas }}</option>
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
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" value="{{$jadwal->jam_mulai}}" class="form-control" id="jam_mulai" name="jam_mulai">
                    @error('jam_mulai')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" value="{{$jadwal->jam_selesai}}" class="form-control" id="jam_selesai" name="jam_selesai">
                    @error('jam_selesai')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/jadwal" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
