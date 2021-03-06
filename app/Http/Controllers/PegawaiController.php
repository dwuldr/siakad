<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\Users;
use DB;
use PDF;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('admin/pegawai/index', compact('pegawai'));
    }

    public function create(){
        $pegawai = Pegawai::all();
        return view('admin/pegawai/create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        toast('Data Berhasil Ditambahkan!','success');
        $request->validate([
            'nama_guru' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'status' => 'required',
        ]);
        $pegawai = new pegawai;
        $pegawai->nip = $request->nip;
        $pegawai->nama_guru = $request->nama_guru;
        $pegawai->jk = $request->jk;
        $pegawai->tmp_lahir = $request->tmp_lahir;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->alamat = $request->alamat;
        $pegawai->telp = $request->telp;
        $pegawai->status = $request->status;
        $pegawai->save();
        return redirect('admin/pegawai/index');
    }

    public function edit($idPegawai){
        $pegawai = Pegawai::where('idPegawai', $idPegawai)->first();
        return view('admin/pegawai/edit', compact('pegawai', 'idPegawai'));
    }

    public function update(Request $request, $idPegawai)
    {
        toast('Data Berhasil Diubah!','success');
        Pegawai::where('idPegawai', $idPegawai)
        ->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'status' => $request->status,
        ]);
        return redirect('admin/pegawai/index');
    }

    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return view('admin/pegawai/show', compact('pegawai'));
    }

    public function destroy($id)
    {
        toast('Data Berhasil Dihapus!','success');
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('admin/pegawai/index');

    }

    public function cetakPegawai()
    {
           //dd([$tglawal, $tglakhir]);

           $pegawai = Pegawai::all();
           $pdf = PDF::loadview('admin/pegawai/cetak-data-pegawai',['pegawai'=>$pegawai]);
        // return view('admin.Pegawai.cetak-data-pegawai', compact('cetakPegawai'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }

    public function pegawaiexport()
    {
        return Excel::download(new PegawaiExport,'pegawai.xlsx');
    }

    public function pegawaiimportexcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PegawaiImport, $file);
        return redirect('admin/pegawai/index');
    }

    public function absensi()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.absen', compact('pegawai'));
    }

}
