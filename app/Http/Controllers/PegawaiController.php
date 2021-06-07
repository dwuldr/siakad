<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\Users;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = Pegawai::all();
        return view('admin/pegawai/index', compact('pegawai'));
    }
    public function create(){
        $pegawai = Pegawai::all();
        return view('admin/pegawai/create', compact('pegawai'));
    }
    public function store(Request $request){
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
    public function edit($id){
        $pegawai = Pegawai::where('idPegawai', $id)->first();
        return view('admin/pegawai/edit', compact('pegawai', 'id'));
    }
    public function update(Request $request, $id){
        Pegawai::where('idPegawai', $id)
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

}
