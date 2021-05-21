@extends('sbadmin/master')
@section('title', 'info')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">info</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/info/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Info</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Pengumuman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($info as $idInfo =>$info)
                                <tr>
                                    <td>{{$info->tgl}}</td>
                                    <td>{{$info->pengumuman}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('info.edit', ['id' => $info->idInfo])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('info.destroy', ['id' => $info->idInfo ])}}">
                                            @method('DELETE')
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

