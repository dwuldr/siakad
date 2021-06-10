@extends('sbadmin/master')
@section('title', 'pembayaran')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit pembayaran</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/pembayaran/'.$idPembayaran)}}" method="POST">
        @csrf
        @method('patch')
        <div class="container">
            <div class="col-md-6">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="idSiswa">Nama Siswa</label>
                        <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                            <option>-- Pilih Siswa --</option>
                            @foreach($siswa as $data)
                                <option value="{{ $data->idSiswa }}">{{ $data->nama_siswa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" value="{{$pembayaran->tgl}}" class="form-control" id="tgl" name="tgl">
                    @error('tgl')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_bayar">Jenis Pembayaran</label>
                    <input type="text" value="{{$pembayaran->jenis_bayar}}"class="form-control" id="jenis_bayar" name="jenis_bayar">
                    @error('jenis_bayar')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Pembayaran</label>
                    <input type="text" value="{{$pembayaran->jumlah_bayar}}"class="form-control" id="jumlah_bayar" name="jumlah_bayar">
                    @error('jumlah_bayar')
                        <small class="text-danger">{{ $message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{url('admin/pembayaran/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


