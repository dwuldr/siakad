@extends('sbadmin/master')
@section('title', 'mapel')

@section('content')
{{session('sukses')}}

        <!-- DataTales Example -->
<h1 class="h3 mb-4 text-gray-800">MAPEL</h1>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <a href="{{url('admin/mapel/create')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mapel</th>
                                    <th>Aksi</th>
                                </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($mapel as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->nama_mapel}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{url('admin/mapel/edit/'.$row->idMapel)}}">
                                    <i class="fa fa-edit"></i></a>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                        action="{{url('admin/mapel/destroy/'.$row->idMapel)}}">{{ csrf_field() }}
                                        @method('delete')
                                        <input type="hidden" value="DELETE" name="_method"><button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

