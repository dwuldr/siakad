@extends('sbadmin/master')
@section('title', 'alumni')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Data Alumni</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/alumni/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Data Alumni</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @dump($data) --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tahun Akademik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data['alumni'] as $idAlumni =>$item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->nama_alumni }}</td>
                                    <td>{{$item->kelas->nama_kelas }}</td>
                                    <td>{{$item->tahun_ajaran->tahun_ajaran }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('alumni.edit', ['id' => $item->idAlumni])}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('alumni.destroy', ['id' => $item->idAlumni ])}}">
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
