@extends('sbadmin/master')
@section('title', 'semester')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Tahun Ajaran</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{url('admin/semester/create')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tahun Ajaran</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Tanggal </th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($semester as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->tahun_ajaran}}</td>
                                    <td>{{$row->tgl_efektif}}</td>
                                    <td>{{$row->keterangan}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{url('admin/semester/edit/'.$row->idSemester)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/semester/destroy/'.$row->idSemester)}}">
                                            @method('delete')
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

