@extends('sbadmin/master')
@section('title', 'guru')

@section('content')
<section class="content-header">
      <h1>
        Detail Guru
      </h1>
      <div class="table-responsive">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('guru.index') }}"> Back</a>
        </div>
        <table class="table table-bordered table-striped table-hover table-condensed">
          <tbody>
            <tr>
              <td>NIP</td>
              <td>{{ $pegawai->nip}}</td>
            </tr>
            <tr>
              <td>Nama Pegawai</td>
              <td>{{ $pegawai->nama}}</td>
            </tr>
            <tr>
              <td>OPD/Dinas</td>
              <td>{{ $pegawai->opd}}</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>{{ $pegawai->status_2}}</td>
            </tr>
          </tbody>
        </table>
      </div>

        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
