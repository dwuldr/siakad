@extends('sbadmin/master')
@section('title', 'jadwal')

@section('content')
{{session('sukses')}}
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Jadwal Kelas</h3>
				{{-- <h5>{{$semester_aktif}}</h5> --}}
				{{-- <h5>{{$id}}</h5> --}}

				{{-- <div>
				<a href="{{url('admin/jadwal/create/'.$id)}}" class="btn btn-small btn-success mb-1"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
				</div> --}}
				<ul class="nav nav-pills ml-auto p-2">

            </div>
            <div class="card-header py-3">
                <a href="{{url('admin/jadwal/create')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a>
                <a href="{{url('admin/cetak-jadwal')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
                    <a href="{{url('admin/cetak-jadwal')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Cetak Excel</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @dump($data) --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Semester</th>
                                <th>Guru</th>
                                <th>Hari</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->mapel->nama_mapel }}</td>
                                    <td>{{$row->semester->tgl_efektif }}</td>
                                    <td>{{$row->pegawai->nama_guru }}</td>
                                    <td>{{$row->hari }}</td>
                                    <td>{{$row->jam_mulai }}</td>
                                    <td>{{$row->jam_selesai }}</td>
                                    <td>
                                        <a href="{{url('/admin/jadwal/detail/'.$row->idJadwal)}}" class="btn btn-outline-primary"><i class="fas fa-search"></i></i></a>
                                        <a class="btn btn-outline-warning" href="{{url('/admin/jadwal/edit/'.$row->idJadwal)}}"><i class="fa fa-edit"></i></a>

                                        <form action="{{ url('admin/jadwal/destroy', $row->idJadwal)}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></button>
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
