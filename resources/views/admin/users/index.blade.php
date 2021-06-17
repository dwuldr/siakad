@extends('sbadmin/master')
@section('title', 'users')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">DATA USER</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  TAMBAH USER</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Level User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->level}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/users/edit/'.$row->idUsers)}}">
                                            <i class="fa fa-edit"></i></a>

                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/users/destroy/'.$row->idUsers)}}">
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
        </div>
    </div>
@endsection
