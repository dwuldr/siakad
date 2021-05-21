@extends('sbadmin/master')
@section('title', 'pembayaran')

@section('content')
{{session('sukses')}}
    <h1 class="h3 mb-4 text-gray-800">Pembayaran</h1>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('pembayaran/create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  Tambah Pembayaran</a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Siswa</th>
                                <th>Tanggal</th>
                                <th>Jenis Pembayaran</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data['pembayaran'] as $idPembayaran =>$pembayaran)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$pembayaran->siswa->nama_siswa }}</td>
                                    <td>{{$pembayaran->tgl}}</td>
                                    <td>{{$pembayaran->jenis_bayar}}</td>
                                    <td>{{$pembayaran->jumlah_bayar}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('pembayaran.edit', ['id' => $pembayaran->idPembayaran])}}">
                                            <i class="fa fa-edit"></i></a>

                                    <form method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')"
                                        action="{{route('pembayaran.destroy', $pembayaran->idPembayaran)}}">
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

