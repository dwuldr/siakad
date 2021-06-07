@extends('sbadmin/master')
@section('title', 'tahun_ajaran')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Tahun Ajaran</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/tahun_ajaran/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tahun Akademik</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($tahun_ajaran as $idAjaran =>$ajaran)
                                <tr>
                                    <td>{{$ajaran->tahun_akademik}}</td>
                                    <td>{{$ajaran->semester}}</td>
                                    <td>{{$ajaran->status}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('tahun_ajaran.edit', ['id' => $ajaran->idAjaran])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('tahun_ajaran.destroy', ['id' => $ajaran->idAjaran ])}}">
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

