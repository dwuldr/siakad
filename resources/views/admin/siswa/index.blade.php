@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">SISWA</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/siswa/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Siswa</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengguna</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Telp/HP</th>
                                <th>Nama Orang Tua</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->users->username }}</td>
                                    <td>{{$item->nis}}</td>
                                    <td>{{$item->nama_siswa}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->jk}}</td>
                                    <td>{{$item->tmp_lahir}}</td>
                                    <td>{{$item->tgl_lahir}}</td>
                                    <td>{{$item->telp}}</td>
                                    <td>{{$item->nama_ortu}}</td>
                                    <td>{{$item->status_2}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('siswa.edit', ['id' => $item->idSiswa])}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('siswa.destroy', ['id' => $item->idSiswa ])}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
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
