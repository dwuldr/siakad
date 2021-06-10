@extends('sbadmin/master')
@section('title', 'kelas')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">KELAS</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/kelas/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($kelas as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->nama_kelas}}</td>
                                    <td>
                                        <a href="{{url('/admin/kelas/show/'.$row->idKelas)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-warning" href="{{url('admin/kelas/edit/'.$row->idKelas)}}">
                                            <i class="fa fa-edit"></i></a>

                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/kelas/destroy/'.$row->idKelas)}}">
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

