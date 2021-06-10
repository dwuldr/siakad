@extends('sbadmin/master')
@section('title', 'semester')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
            <h1 class="h3 mb-4 text-gray-800">EDIT DATA</h1>
    </div>
    <div class="card-body">

        <form action="{{url('admin/semester/'.$id)}}" method="POST">
            @method('patch')
            @csrf
            <div class="container">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" value="{{$semester->tahun_ajaran}}" class="form-control" id="tahun_ajaran" name="tahun_ajaran">
                        @error('tahun_ajaran')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tgl_efektif">Tanggal</label>
                        <input type="text" value="{{$semester->tgl_efektif}}" class="form-control" id="tgl_efektif" name="tgl_efektif">
                        @error('tgl_efektif')
                            <small class="text-danger">{{ $message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keterangan">Semester</label>
                        <select class="form-control" name="keterangan" id="keterangan">
                            <option>--Pilihan--</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{url('admin/semester/index')}}" class="btn btn-secondary btn-sm">Kembali</a>
        </form>
    </div>
</div>
@endsection

