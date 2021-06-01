@extends('sbadmin/guru_master')
@section('title', 'nilai guru')

@section('content')
    {{ session('sukses') }}
    <h1 class="h3 mb-4 text-gray-800">List Mata Pelajaran</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/nilai/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah Nilai</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($mapel as $mpl)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $mpl->nama_mapel }}</td>
                                    <td>{{ $mpl->nama_kelas }}</td>

                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('nilai.edit', ['id' => $mpl->idKelas]) }}">
                                            Input Nilai</a>

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
