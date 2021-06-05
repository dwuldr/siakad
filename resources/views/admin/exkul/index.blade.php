@extends('sbadmin/master')
@section('title', 'exkul')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Extrakulikuler</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/exkul/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Extrakulikuler</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Extrakulikuler</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($exkul as $idExkul =>$item)
                                <tr>
                                    <td>{{$item->nama_exkul}}</td>
                                    <td>{{$item->hari}}</td>
                                    <td>{{$item->waktu}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('exkul.edit', ['id' => $item->idExkul])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('exkul.destroy', ['id' => $item->idExkul ])}}">
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

