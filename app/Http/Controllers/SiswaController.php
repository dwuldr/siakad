<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Siswa;
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

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $users = DB::table('users')->get();

        $data = ['siswa' => $siswa, 'users' => $users];
        return view("admin.siswa.index", compact('siswa'));
    }

    public function siswa($idSiswa)
    {
        $siswa = Siswa::find($idSiswa);
        return view('siswa.show', compact('siswa'));

        return view('admin.siswa.index')->with('siswa',$idSiswa);
    }

    public function dashboard()
    {
        return view('siswa/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $users = User::all();
        // $data = [$users, $kelas, $spp];

        return view("admin.siswa.create", compact('siswa', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->idUsers = $request->get("idUsers");
        $siswa->nis = $request->get("nis");
        $siswa->nama_siswa = $request->get("nama_siswa");
        $siswa->alamat = $request->get("alamat");
        $siswa->jk = $request->get("jk");
        $siswa->tmp_lahir = $request->get("tmp_lahir");
        $siswa->tgl_lahir = $request->get("tgl_lahir");
        $siswa->telp = $request->get("telp");
        $siswa->nama_ortu = $request->get("nama_ortu");
        $siswa->status_2 = $request->get("status_2");
        $siswa->save();
        $siswa = Siswa::all();
        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idSiswa)
    {
        $idSiswa = Crypt::decrypt($idSiswa);
        $siswa = Siswa::findorfail($idSiswa);
        return view('admin.siswa.details', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSiswa)
    {
        $siswa = Siswa::findOrFail($idSiswa);
        $users = User::all();
        return view("admin.siswa.edit", compact('siswa', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idSiswa)
    {
        $siswa = Siswa::findOrFail($idSiswa);
        $siswa->idUsers = $request->get('idUsers');
        $siswa->nis = $request->get("nis");
        $siswa->nama_siswa = $request->get("nama_siswa");
        $siswa->alamat = $request->get("alamat");
        $siswa->jk = $request->get("jk");
        $siswa->tmp_lahir = $request->get("tmp_lahir");
        $siswa->tgl_lahir = $request->get("tgl_lahir");
        $siswa->telp = $request->get("telp");
        $siswa->nama_ortu = $request->get("nama_ortu");
        $siswa->status_2 = $request->get("status_2");
        $siswa->save();
        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSiswa)
    {

        $siswa = Siswa::find($idSiswa);
        if(!$siswa) {
            return redirect('siswa');
        }
        $siswa->delete();
        return redirect('siswa');
    }

    public function absensi()
    {
        $siswa = Siswa::all();
        return view('siswa.absen', compact('siswa'));
    }
}
