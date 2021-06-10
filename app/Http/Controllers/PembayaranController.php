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
        $siswa = Kelas::all();
        return view('admin/pembayaran/index', compact('pembayaran', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('admin/pembayaran/create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idSiswa' => 'required',
            'tgl' => 'required',
            'jenis_bayar' => 'required',
            'jumlah_bayar' => 'required',
            ]);
            $pembayaran= new siswa;
            $pembayaran->idSiswa = $request->idSiswa;
            $pembayaran->tgl = $request->tgl;
            $pembayaran->jenis_bayar = $request->jenis_bayar;
            $pembayaran->jumlah_bayar = $request->jumlah_bayar;
            $pembayaran->save();
            return redirect('admin/pembayaran/index');
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
        $siswa = Siswa::all();
        $pembayaran = Pembayaran::where('idPembayaran', $idPembayaran)->first();
        return view('admin/pembayaran/edit', compact('pembayaran', 'siswa', 'idPembayaran'));
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
        return redirect('admin/pembayaran/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = pembayaran::find($id);
        $pembayaran->delete();
        return redirect('admin/pembayaran/index');
    }
}
