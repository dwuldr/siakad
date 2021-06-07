@extends('sbadmin/master')
@section('title', 'guru')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Guru</h1>
        <div class="card-body">
            <form action="{{ route('guru.update', $guru->idGuru)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idUsers">User</label>
                    <select id="idUsers" name="idUsers" class="form-control @error('idUsers') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Username --</option>
                        @foreach($users as $data)
                            @if ($data->idUsers == $guru->idUsers)
                                <option value="{{ $data->idUsers }}" selected>{{ $data->username }}</option>
                            @else
                                <option value="{{ $data->idUsers }}">{{ $data->username }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" value="{{$guru->nip}}" class="form-control" id="nip" name="nip">
                    @error('nip')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" value="{{$guru->nama_guru}}" class="form-control" id="nama_guru" name="nama_guru">
                    @error('nama_guru')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk">
                            <option>--Pilihan--</option>
                            @if ($guru->jk == 'L')
                                <option value="L" selected>Laki-laki</option>
                                <option value="P">Perempuan</option>
                            @elseif ($guru->jk == 'P')
                                <option value="L">Laki-laki</option>
                                <option value="P" selected>Perempuan</option>
                            @else
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            @endif
                        </select>
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" value="{{$guru->tmp_lahir}}" class="form-control" id="tmp_lahir" name="tmp_lahir">
                    @error('tmp_lahir')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal</label>
                    <input type="date" value="{{$guru->tgl_lahir}}" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    @error('tgl_lahir')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" value="{{$guru->alamat}}"class="form-control" id="alamat" name="alamat">
                    @error('alamat')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telp">Telp/HP</label>
                    <input type="text" value="{{$guru->telp}}" class="form-control" id="telp" name="telp">
                    @error('telp')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/mapel" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection
