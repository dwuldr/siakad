@extends('sbadmin/guru_master')
@section('title', 'List Kelas')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Siswa Kelas {{$kelas->nama_kelas}}</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th >Aksi</th>
                            </tr>


                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->nis}}</td>
                                    <td>{{$item->nama_siswa}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/raport/cetak/'.$item->idSiswa) }}">
                                            Cetak Raport</a>

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
