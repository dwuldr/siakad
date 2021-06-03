@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Detail Nilai</h1>

    @if (session('alert'))
        <div class="alert alert-success" role="alert">
            {{ session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>KKM</th>
                                <th>Nilai Akademik</th>
                                <th>Nilai Kreatifitas</th>
                            </tr>
                        </thead>
                        <tbody>


                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>{{ $item->kkm }}</td>
                                    <td>{{ $item->nilai_akademik }}</td>
                                    <td>{{ $item->nilai_kreatifitas }}</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>

@endsection
