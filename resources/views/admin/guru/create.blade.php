@extends('sbadmin/master')
@section('title', 'guru')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Guru</h1>

    <form action="/guru" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idUsers">User</label>
                        <select id="idUsers" name="idUsers"
                            class="form-control @error('idUsers') is-invalid @enderror select2bs4">
                            <option>-- Pilih Username --</option>
                            @foreach ($users as $data)
                                {{-- <option value="{{ $data->idUsers }}">{{ $data->nama_guru }}</option> --}}
                                <option value="{{ $data->idUsers }}">{{ $data->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                        @error('nip')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                        @error('nama_guru')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/guru" class="btn btn-secondary ">Kembali</a>

        </div>
    </form>
@endsection
