<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Pegawai;
use App\Kelas;
use App\Siswa;
use App\Jadwal;
use App\Nilai;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

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
        $kelas = Kelas::all();
        return view('admin/siswa/index', compact('siswa', 'kelas'));
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
        $kelas = Kelas::all();
        return view('admin/siswa/create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        toast('Data Berhasil Ditambahkan!','success');
        $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'idkelas' => 'required',
            'telp' => 'required',
            'status_2' => 'required',
            ]);

            $siswa=new siswa;
            $siswa->nis = $request->nis;
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->idKelas = $request->idKelas;
            $siswa->alamat = $request->alamat;
            $siswa->jk = $request->jk;
            $siswa->tmp_lahir = $request->tmp_lahir;
            $siswa->tgl_lahir = $request->tgl_lahir;
            $siswa->telp = $request->telp;
            $siswa->nama_ortu = $request->nama_ortu;
            $siswa->status_2 = $request->status_2;
            $siswa->save();
            return redirect('admin/siswa/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::where('idSiswa', $id)->first();
        $kelas = Kelas::where('idKelas', $id)->get();
        return view('admin/siswa/show', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSiswa)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::where('idSiswa', $idSiswa)->first();
        return view('admin/siswa/edit', compact('siswa', 'kelas', 'idSiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Alert::success('Data Berhasil Diubah', 'Success');
       Siswa::where('idSiswa', $id)
        ->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'idKelas' => $request->idKelas,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'telp' => $request->telp,
            'nama_ortu' => $request->nama_ortu,
            'status_2' => $request->status_2,
        ]);
        return redirect('admin/siswa/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toast('Data Berhasil Dihapus!','success');
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('admin/siswa/index');
    }

    public function absensi()
    {
        $siswa = Siswa::all();
        return view('siswa.absen', compact('siswa'));
    }

    public function lihatJadwal()
    {
        $jadwal = Jadwal::all();
        return view('siswa/jadwal/lihat-jadwal', compact('jadwal'));
    }

    public function lihatNilai()
    {
        $nilai = Nilai::all();
        return view('siswa/lihat-nilai', compact('nilai'));
    }

    public function cetakSiswa()
    {
           //dd([$tglawal, $tglakhir]);

           $siswa = Siswa::all();
           $pdf = PDF::loadview('admin/siswa/cetak-data-siswa',['siswa'=>$siswa]);
        // return view('admin.Pegawai.cetak-data-pegawai', compact('cetakPegawai'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }

    public function siswaexport()
    {
        return Excel::download(new SiswaExport,'siswa.xlsx');
    }

    public function siswaimportexcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new SiswaImport, $file);
        return redirect('admin/siswa/index');
    }

}

