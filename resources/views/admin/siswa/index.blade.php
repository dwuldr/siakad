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
                                <th>Kelas</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Telp/HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data['siswa'] as $idSiswa =>$siswa)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$siswa->users->username }}</td>
                                    <td>{{$siswa->kelas->nama_kelas }}</td>
                                    <td>{{$siswa->nis}}</td>
                                    <td>{{$siswa->nama_siswa}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td>{{$siswa->jk}}</td>
                                    <td>{{$siswa->tmp_lahir}}</td>
                                    <td>{{$siswa->tgl_lahir}}</td>
                                    <td>{{$siswa->telp}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('siswa.edit', ['id' => $siswa->idSiswa])}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('siswa.destroy', ['id' => $siswa->idSiswa ])}}">
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
