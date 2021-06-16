@extends('sbadmin/master')
@section('title', 'Jadwal')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/jadwal/')}}" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="idSemester">Semester</label>
                    <select id="idSemester" name="idSemester" class="form-control @error('idSemester') is-invalid @enderror select2bs4">
                        <option>-- Pilih Semester--</option>
                        @foreach($semester as $data)
                            <option value="{{ $data->idSemester }}">{{ $data->tgl_efektif }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idPegawai">Pegawai</label>
                    <select id="idPegawai" name="idPegawai" class="form-control @error('idPegawai') is-invalid @enderror select2bs4">
                        <option>-- Pilih Mapel --</option>
                        @foreach($pegawai as $data)
                            <option value="{{ $data->idPegawai }}">{{ $data->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idMapel">Mapel</label>
                    <select id="idMapel" name="idMapel" class="form-control @error('idMapel') is-invalid @enderror select2bs4">
                        <option>-- Pilih Mapel --</option>
                        @foreach($mapel as $data)
                            <option value="{{ $data->idMapel }}">{{ $data->nama_mapel }}</option>
                        @endforeach
                    </select>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hari">Hari</label>
                            <select class="form-control" name="hari" id="hari">
                                <option>--Pilihan--</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum`at">Jum`at</option>
                                <option value="Sabtu">Sabtu</option>

                            </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                    @error('jam_mulai')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                    @error('jam_selesai')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{url('admin/jadwal/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection

