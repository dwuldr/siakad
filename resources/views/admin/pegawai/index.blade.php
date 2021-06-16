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
                <a href="{{url('admin/pegawai/cetak-data-pegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
                <a href="{{ url('exportPegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export Excel</a>
                <button type="button" href="{{ url('importPegawai')}}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-download fa-sm text-white-50"></i>Import Data</button>
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
                                        <a class="btn btn-outline-warning" href="{{url('admin/pegawai/edit/'.$row->idPegawai)}}"><i class="fa fa-edit"></i></a>

                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');"
                                        action="{{url('admin/pegawai/destroy/'.$row->idPegawai)}}">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url ('importPegawai')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                    <button type="button" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        @include('sweetalert::alert')
    </div>
@endsection

