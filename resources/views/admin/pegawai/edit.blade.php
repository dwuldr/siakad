@extends('sbadmin/master')
@section('title', 'pegawai')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
        </div>
        <div class="card-body">
            <form action="{{url('admin/pegawai/'.$idPegawai)}}" method="POST">
                @method('patch')
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="{{$pegawai->nip}}">
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_guru">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="{{$pegawai->nama_guru}}">
                                @error('nama_guru')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" name="jk" id="jk" value="{{$pegawai->jk}}">
                                    <option>--Pilihan--</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="{{$pegawai->tmp_lahir}}">
                                @error('tmp_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$pegawai->tgl_lahir}}">
                                @error('tgl_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$pegawai->alamat}}">
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telp">Telp/HP</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="{{$pegawai->telp}}">
                                @error('telp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{$pegawai->status}}">
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{url('admin/pegawai/index')}}" class="btn btn-secondary ">Kembali</a>

                </div>
        </form>
    </div>
</div>
@endsection
