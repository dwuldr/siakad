@extends('sbadmin/master')
@section('title', 'pembayaran')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit pembayaran</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pembayaran.update', $pembayaran->idPembayaran)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="idSiswa">User</label>
                    <select id="idSiswa" name="idSiswa" class="form-control @error('idSiswa') is-invalid @enderror select2bs4">
                        <option value="">-- Pilih Username --</option>
                        @foreach($siswa as $data)
                            @if ($data->idSiswa == $pembayaran->idSiswa)
                                <option value="{{ $data->idSiswa }}" selected>{{ $data->nama_siswa }}</option>
                            @else
                                <option value="{{ $data->idSiswa }}">{{ $data->nama_siswa }}</option>
                            @endif
                        @endforeach
                    </select>
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
        <a href="/pembayaran" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


