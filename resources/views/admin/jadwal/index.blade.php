@extends('sbadmin/master')
@section('title', 'jadwal')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">JADWAL</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/jadwal/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Jadwal</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @dump($data) --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Guru</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data['jadwal'] as $idJadwal =>$jadwal)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$jadwal->mapel->nama_mapel }}</td>
                                    <td>{{$jadwal->kelas->nama_kelas }}</td>
                                    <td>{{$jadwal->guru->nama_guru }}</td>
                                    <td>{{$jadwal->jam_mulai }}</td>
                                    <td>{{$jadwal->jam_selesai }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('jadwal.edit', ['id' => $jadwal->idJadwal])}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('jadwal.destroy', ['id' => $jadwal->idJadwal ])}}">
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
