@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/siswa')}}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idKelas" name="idKelas">
                        <label for="nis">NISN</label>
                        <input type="text" class="form-control" id="nis" name="nis">
                        @error('nis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa">
                        @error('nama_siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idKelas">Kelas</label>
                        <select id="idKelas" name="idKelas" class="form-control @error('idKelas') is-invalid @enderror select2bs4">
                            <option>-- Pilih Kelas --</option>
                            @foreach($kelas as $data)
                                <option value="{{ $data->idKelas }}">{{ $data->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk">
                            <option>--Pilihan--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                        @error('tmp_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        @error('tgl_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telp">Telp/HP</label>
                        <input type="text" class="form-control" id="telp" name="telp">
                        @error('telp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ortu">Nama OrangTua</label>
                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu">
                        @error('nama_ortu')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_2">Status</label>
                        <select class="form-control" name="status_2" id="status_2">
                            <option>--Pilihan--</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Alumni">Alumni</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{url('admin/siswa/index')}}" class="btn btn-secondary ">Kembali</a>

        </div>
    </form>
        </div>
    </div>
@endsection
