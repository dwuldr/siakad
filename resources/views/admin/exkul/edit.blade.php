@extends('sbadmin/master')
@section('title', 'exkul')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Mapel</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('exkul.update', $exkul->idExkul)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_exkul">Nama Extrakulikuler</label>
                            <input type="text" id="nama_exkul" name="nama_exkul" value="{{$exkul->nama_exkul}}" class="form-control @error('nama_exkul') is-invalid @enderror">
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
                                        <option value="Minggu">Minggu</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="time" id="waktu" name="waktu" class="form-control @error('waktu') is-invalid @enderror">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/exkul" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
        </div>
    </div>
@endsection
