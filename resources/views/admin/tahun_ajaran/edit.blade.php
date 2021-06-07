@extends('sbadmin/master')
@section('title', 'tahun_ajaran')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Edit Mapel</h1>
            <a href="/alumni/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Data Alumni</a>
        </div>
        <div class="card-body">
            <form action="{{ route('tahun_ajaran.update', $tahun_ajaran->idAjaran)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_akademik">Tahun Akademik</label>
                    <input type="text" id="tahun_akademik" name="tahun_akademik" value="{{$tahun_ajaran->tahun_akademik}}" class="form-control @error('tahun_akademik') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                        <select class="form-control" name="semester" id="semester">
                            <option>--Pilihan--</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option>--Pilihan--</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">NonAktif</option>
                        </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/tahun_ajaran" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection


