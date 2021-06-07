@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')
    {{ session('sukses') }}
    <h1 class="h3 mb-4 text-gray-800">Data Kehadiran Siswa</h1>
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
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Ijin</th>
                                <th>Alpha</th>
                            </tr>
                        </thead>
                        <tbody>


                            @php $i = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <input type="hidden" name="idSiswa[]" value="{{ $item->idSiswa }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="keterangan{{ $item->idSiswa }}"
                                                    {{ $item->ijin == '0' && $item->sakit == '0' && $item->alpha == '0' ? 'checked' : '' }}
                                                    id="keterangan{{ $item->idSiswa }}" value="1" class="form-check-input"
                                                    type="radio">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="keterangan{{ $item->idSiswa }}"
                                                    {{ $item->sakit == '1' ? 'checked' : '' }}
                                                    id="keterangan{{ $item->idSiswa }}" value="2" class="form-check-input"
                                                    type="radio">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="keterangan{{ $item->idSiswa }}"
                                                    {{ $item->ijin == '1' ? 'checked' : '' }}
                                                    id="keterangan{{ $item->idSiswa }}" value="3"
                                                    class="form-check-input" type="radio">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="keterangan{{ $item->idSiswa }}"
                                                    {{ $item->alpha == '1' ? 'checked' : '' }}
                                                    id="keterangan{{ $item->idSiswa }}" value="4"
                                                    class="form-check-input" type="radio">
                                            </div>
                                        </div>
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
