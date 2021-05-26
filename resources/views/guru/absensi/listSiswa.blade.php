@extends('sbadmin/guru_master')
@section('title', 'List Absensi')

@section('content')
    {{ session('sukses') }}
    <h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Sakit</th>
                                <th>Ijin</th>
                                <th>Alpha</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php $i = 1 @endphp
                            @foreach ($data['nilai'] as $idNilai => $nilai)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$nilai->mapel->nama_mapel }}</td>
                                    <td>{{$nilai->guru->nama_guru }}</td>
                                    <td>{{$nilai->siswa->nama_siswa }}</td>
                                    <td>{{$nilai->nilai_harian}}</td>
                                    <td>{{$nilai->nilai_uts}}</td>
                                    <td>{{$nilai->nilai_uas}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('nilai.edit', ['id' => $nilai->idNilai])}}">
                                            <i class="fa fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{route('nilai.destroy', ['id' => $nilai->idNilai ])}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach --}}
                            <tr>
                                <td>1</td>
                                <td>23 Mei 2021</td>
                                <td>Ahmad</td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <div class="form-check">
                                            <input name="sakit[]" value="" class="form-check-input" type="checkbox" >
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <div class="form-check">
                                            <input name="ijin[]" value="" class="form-check-input" type="checkbox" >
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <div class="form-check">
                                            <input name="alpha[]" value="" class="form-check-input" type="checkbox" >
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 text-right border-top mt-2 pt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
