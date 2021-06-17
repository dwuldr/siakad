@extends('sbadmin/master')
@section('title', 'siswa')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/siswa/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Siswa</a>
                <a href="{{url('admin/siswa/cetak-data-Siswa')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank" rel="noopener noreferrer"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
                <a href="{{ url('exportSiswa')}}" class="d-none d-sm-inline-block btn btn-sm btn btn-success"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export Excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Telp/HP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nis}}</td>
                                    <td>{{$row->nama_siswa}}</td>
                                    <td>{{$row->kelas->nama_kelas}}</td>
                                    <td>{{$row->telp}}</td>
                                    <td>{{$row->status_2}}</td>
                                    <td>
                                        <a href="{{url('/admin/siswa/show/'.$row->idSiswa)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-outline-warning" href="{{url('admin/siswa/edit/'.$row->idSiswa)}}"><i class="fa fa-edit"></i></a>

                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?') Alert::question('Question Title', 'Question Message');"
                                        action="{{url('admin/siswa/destroy/'.$row->idSiswa)}}">
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
                        <form action="{{ url ('importSiswa')}}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    {{method_field('PUT')}}
                                    {{ @csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
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


