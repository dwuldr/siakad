@extends('sbadmin/master')
@section('title', 'Edit Profil')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
  <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title text-capitalize">Edit Profile {{ Auth::user()->name }}</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('pengaturan.ubah-profile') }}" method="post">
        @csrf
        <div class="card-body">
          @if (Auth::user()->level == "Guru")
            <div class="row">
              <input type="hidden" name="level" value="{{ Auth::user()->guru(Auth::user())->level }}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)" value="{{ Auth::user()->guru(Auth::user())->nip }}" class="form-control @error('nip') is-invalid @enderror" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L"
                                @if (Auth::user()->guru(Auth::user())->jk == 'L')
                                    selected
                                @endif
                            >Laki-Laki</option>
                            <option value="P"
                                @if (Auth::user()->guru(Auth::user())->jk == 'P')
                                    selected
                                @endif
                            >Perempuan</option>
                        </select>
                    </div>
                </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="name_guru">Nama Guru</label>
                      <input type="text" id="name_guru" name="name_guru" value="{{ Auth::user()->name_guru }}" class="form-control @error('name_guru') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                      <label for="tmp_lahir">Tempat Lahir</label>
                      <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->guru(Auth::user())->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->guru(Auth::user())->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="date" id="alamat" name="alamat" value="{{ Auth::user()->guru(Auth::user())->alamat }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                  <div class="form-group">
                      <label for="telp">Nomor Telpon/HP</label>
                      <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" value="{{ Auth::user()->guru(Auth::user()->alamat)->telp }}" class="form-control @error('telp') is-invalid @enderror">
                  </div>
              </div>

            </div>
          @elseif (Auth::user()->level == "Siswa")
            <div class="row" name="level" value="{{ Auth::user()->siswa(Auth::user())->level }}">
                <input type="hidden">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name_siswa">Nama Siswa</label>
                        <input type="text" id="name_siswa" name="name_siswa" value="{{ Auth::user()->name_siswa }}" class="form-control @error('name_siswa') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L"
                                @if (Auth::user()->siswa(Auth::user())->jk == 'L')
                                    selected
                                @endif
                            >Laki-Laki</option>
                            <option value="P"
                                @if (Auth::user()->siswa(Auth::user())->jk == 'P')
                                    selected
                                @endif
                            >Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ Auth::user()->siswa(Auth::user())->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->siswa(Auth::user())->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->siswa(Auth::user())->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" id="nis" name="nis" onkeypress="return inputAngka(event)" value="{{ Auth::user()->siswa(Auth::user())->nis }}" class="form-control @error('nis') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor Telpon/HP</label>
                        <input type="text" id="telp" name="telp" value="{{ Auth::user()->siswa(Auth::user())->telp }}" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                    </div>
                </div>
            </div>
          @else
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" value="{{ Auth::user()->username }}" class="form-control @error('username') is-invalid @enderror" name="username" autocomplete="off">
                </div>
              </div>
            </div>
          @endif
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
            window.location="{{ route('profile') }}";
        });
    });
</script>
@endsection
