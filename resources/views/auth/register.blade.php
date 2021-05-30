@extends('auth.main')
@section('title', 'Register')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Pendaftaran Siswa Baru</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{url('daftar')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Nama Lengkap</label>
                                        <input class="form-control" name="nama_siswa" id="inputFirstName" type="text" placeholder="Nama Lengkap"  required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Nomor Telepon</label>
                                    <input class="form-control" name="telp" id="inputLastName" type="number" placeholder="Nomor HP/Telepon"  required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Tempat Lahir</label>
                                        <input class="form-control" name="tmp_lahir" id="inputFirstName" type="text" placeholder="Tempat Lahir"  required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Tanggal Lahir</label>
                                    <input class="form-control " name="tgl_lahir" id="inputLastName" type="date" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Nama Orang Tua</label>
                                    <input class="form-control"name="nama_ortu" type="text" placeholder="Nama Orang Tua"  required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Alamat</label>
                                <textarea name="alamat" class="form-control" id="" cols="2" placeholder="Alamat" required></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Username</label>
                                        <input class="form-control" name="username" id="inputFirstName" type="text" placeholder="Username"  required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Password</label>
                                    <input class="form-control" id="inputLastName" name="password_2" type="password" placeholder="Password"  required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4 mb-0"><button type="submit" href="login.php">Daftar</a></div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection

