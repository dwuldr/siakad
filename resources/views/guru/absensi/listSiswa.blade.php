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


                            @foreach ($data as $item)
                                <tr>
                                    @php $i = 1 @endphp
                                    <td>{{ $i++ }}</td>
                                    <td>{{ date('d, M Y') }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="sakit[]" value="" class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="ijin[]" value="" class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-check">
                                                <input name="alpha[]" value="" class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
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
