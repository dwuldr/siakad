@extends('sbadmin/master')
@section('title', 'pembayaran')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">PEMBAYARAN</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('admin/pembayaran/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal</th>
                                <th>Jenis Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($pembayaran as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->siswa->nama_siswa}}</td>
                                    <td>{{$row->tgl}}</td>
                                    <td>{{$row->jenis_bayar}}</td>
                                    <td>{{$row->jumlah_bayar}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{url('admin/pembayaran/edit/'.$row->idPembayaran)}}">
                                            <i class="fa fa-edit"></i></a>

                                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                            action="{{url('admin/pembayaran/destroy/'.$row->idPembayaran)}}">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
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

