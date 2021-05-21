@extends('sbadmin/master')
@section('title', 'Users')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">TAMBAH USER</h1>

    <form action="/users" method="POST">
        @csrf
        <div class="container">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <div class="col-sm-4">
                        <select name="level" id="level" class="form-control" required="true">
                            <option value=''></option>
                            <option value='Admin'>Admin</option>
                            <option value='Guru'>Guru</option>
                            <option value='Siswa'>Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_2">Password</label>
                    <input type="password_2" id="password_2" name="password_2" class="form-control @error('password_2') is-invalid @enderror">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/users" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
