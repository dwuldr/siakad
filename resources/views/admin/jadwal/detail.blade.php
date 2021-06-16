@extends('sbadmin/master')
@section('title', 'Detail Jadwal')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
			<div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-dark">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$jadwal->semester->tgl_efektif}}</h3>
                <h6 class="widget-user-desc">{{$jadwal->pegawai->nama_guru}}</h6>
                <h5 class="widget-user-desc">{{$jadwal->kelas->nama_kelas}}</h5>
                <h5 class="widget-user-desc">{{$jadwal->mapel->nama_mapel}}</h5>
              </div>
              <div class="table-responsive">
                <table class = "table">
                  <tbody>
                    <tr>
                        <th>Hari :</th>
                        <td>{{$jadwal->hari}}</td>
                      </tr>
                    <tr>
                      <th>Jam Mulai / Jam Selesai :</th>
                      <td>{{$jadwal->jam_mulai}}, {{$jadwal->jam_selesai}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card-body">
                  <a href="{{url('admin/jadwal/show/{idKelas}/{idJadwal}')}}" class="btn btn-outline-primary">Kembali</a>
              </div>
            </div>
			</div>
		</div>
	</div>
</section>
@endsection
