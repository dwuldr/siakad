@extends('sbadmin/master')
@section('title', 'Users')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">TAMBAH USER</h1>

    <form action="/users" method="POST">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"
                    class="form-control @error('username') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" id="level" class="form-control" required="true">
                    <option value=''>Pilih Level</option>
                    <option value='Admin'>Admin</option>
                    <option value='Guru'>Guru</option>
                    <option value='Siswa'>Siswa</option>
                </select>

            </div>
            <div class="form-group">
                <label for="password_2">Password</label>
                <input type="password" id="password_2" name="password_2"
                    class="form-control @error('password_2') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/users" class="btn btn-secondary">Kembali</a>
        </div>

    </form>
@endsection
