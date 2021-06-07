@extends('sbadmin/master')
@section('title', 'tahun_ajaran')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">Tambah Data Akademik</h1>
        </div>
        <div class="card-body">
            <form action="/tahun_ajaran" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Akademik</label>
                    <input type="text" id="tahun_ajaran" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                            <select class="form-control" name="semester" id="semester">
                                <option>--Pilihan--</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <span class="badge badge-success"><i class="fa fa-check-circle"></i> &nbsp;HADIR</span>
                                <option>--Pilihan--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">NonAktif</option>
                            </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/tahun_ajaran" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
        </div>
    </div>
@endsection

