<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Siswa;
use App\Kelas;
use App\User;
use App\Spp;
use App\Pembayaran;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pembayaran = Pembayaran::all();
        $siswa = DB::table('siswa')->get();

        $data = ['pembayaran' => $pembayaran, 'siswa' => $siswa];
        return view("admin.pembayaran.index", compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayaran = pembayaran::all();
        $siswa = Siswa::all();
        // $data = [$users, $kelas, $spp];

        return view("admin.pembayaran.create", compact('pembayaran', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaran = new Pembayaran();
        $pembayaran->idSiswa = $request->get("idSiswa");
        $pembayaran->tgl = $request->get("tgl");
        $pembayaran->jenis_bayar = $request->get("jenis_bayar");
        $pembayaran->jumlah_bayar = $request->get("jumlah_bayar");
        $pembayaran->save();
        $pembayaran = Pembayaran::all();
        return redirect('pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($idPembayaran);
        $siswa = Siswa::all();
        return view("admin.pembayaran.edit", compact('pembayaran', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($idPembayaran);
        $pembayaran->idSiswa = $request->get("idSiswa");
        $pembayaran->tgl = $request->get("tgl");
        $pembayaran->jenis_bayar = $request->get("jenis_bayar");
        $pembayaran->jumlah_bayar = $request->get("jumlah_bayar");
        $pembayaran->save();
        return redirect('pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPembayaran)
    {
        $pembayaran = Pembayaran::find($idPembayaran);
        if(!$pembayaran) {
            return redirect('pembayaran');
        }
        $pembayaran->delete();
        return redirect('pembayaran');
    }
}
