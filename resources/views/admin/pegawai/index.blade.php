@extends('sbadmin/master')
@section('title', 'pegawai')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Pegawai</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/pegawai/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Pegawai</a>
                <a href="{{ url('.....')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export Excel</a>
                <a href="{{ url('.....')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success btn-icon-split"><i
                    class="fas fa-download fa-sm text-white-50"></i> Import Excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telp/HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nip}}</td>
                                    <td>{{$row->nama_guru}}</td>
                                    <td>{{$row->jk}}</td>
                                    <td>{{$row->alamat}}</td>
                                    <td>{{$row->telp}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>
                                        <a href="{{url('/admin/pegawai/show/'.$row->idPegawai)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-warning" href="{{url('admin/pegawai/edit/'.$row->idPegawai)}}">
                                            <i class="fa fa-edit"></i></a>

                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');"
                                        action="{{url('admin/pegawai/destroy/'.$row->idPegawai)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
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
        @include('sweetalert::alert')
    </div>
@endsection

