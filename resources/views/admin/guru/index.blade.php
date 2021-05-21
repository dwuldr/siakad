@extends('sbadmin/master')
@section('title', 'guru')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">GURU</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('guru/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Guru</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telp/HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data['guru'] as $idGuru =>$guru)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$guru->nip}}</td>
                                    <td>{{$guru->nama_guru}}</td>
                                    <td>{{$guru->alamat}}</td>
                                    <td>{{$guru->jk}}</td>
                                    <td>{{$guru->telp}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('guru.show', ['id' => $guru->idGuru]) }}"><i class="fa fa-refresh"></i></a>
                                        <a class="btn btn-warning" href="{{route('guru.edit', ['id' => $guru->idGuru])}}">
                                            <i class="fa fa-edit"></i></a>

                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                        action="{{route('guru.destroy', $guru->idGuru)}}">
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

