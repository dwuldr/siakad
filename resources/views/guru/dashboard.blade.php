@extends('sbadmin/guru_master')
@section('title', 'Dashboard Guru')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">DASHBOARD</h1>
        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Selamat Datang</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p class="mb-4">Sistem Informasi Akademik MTs Roudlatul Ulum Parang<a target="_blank"
                        href="https://datatables.net">official DataTables documentation</a>.</p>
                <img src="{{ url('vendor/sbadmin/logo mts.png')}}">
            </div>
        </div>
    </div>

</div>

@endsection
