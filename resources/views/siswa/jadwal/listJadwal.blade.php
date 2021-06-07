@extends('sbadmin/siswa_master')
@section('title', 'List Jadwal')

@section('content')
    {{ session('sukses') }}
    <h1 class="h3 mb-4 text-gray-800">Data Jadwal</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/jadwal/list/{{$id}}/add/{{$mapel->idMapel}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah Jadwal</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>23 Mei 2021</td>
                                    <td>Bahasa Indonesia</td>
                                    <td>7B</td>
                                    <td>
                                        <a class="btn btn-success" href="">
                                            <i class="fa fa-eye"></i></a>
                                        <a class="btn btn-info" href="">
                                            <i class="fa fa-download"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
