@extends('sbadmin/master')
@section('title', 'info')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Pengumuman</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/info/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pengumuman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($info as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->tgl}}</td>
                                    <td>{{$row->pengumuman}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{url('admin/info/edit/'.$row->idInfo)}}">
                                            <i class="fa fa-edit"></i></a>

                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/info/destroy/'.$row->idInfo)}}">
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

    </div>
@endsection

