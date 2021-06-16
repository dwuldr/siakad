<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jadwal;
use App\Mapel;
use App\Kelas;
use App\Pegawai;
use App\Semester;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin/jadwal/index', compact('kelas'));

    }
    public function pilihSemester($id)
    {
        $semester = DB::table('semester')
        // ->join('jadwal', 'jadwal.idSemester', '=', 'semester.idSemester')
        // ->join('jadwal', 'jadwal.idKelas', '=', 'kelas.idKelas')
        ->select('semester.*')
        ->orderBy('semester.tgl_efektif')
        // ->where('jadwal.idKelas', $request->session()->get('session_idKelas'))
        // ->groupBy('semester.idSemester')
        // ->groupBy('semester.tgl_efektif')
        // ->groupBy('semester.keterangan')
        ->get();
        // ->join('jadwal', 'jadwal.idKelas', '=', 'kelas.idKelas')
        // ->join('jadwal', 'jadwal.idSemester', '=', 'semester.idSemester')
        // ->select('semester.*')
        // ->orderBy('semester.tgl_efektif')
        // ->where('jadwal.idSemester', $request->session()->get('session_idSemester'))
        // ->get();
        return view('admin/jadwal/pilihSemester', compact('semester', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $semester = Semester::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $pegawai = Pegawai::all();
        // $data = [$users, $kelas, $spp];

        return view("admin.jadwal.create", compact('jadwal', 'semester', 'mapel', 'kelas', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $request->validate([
         //   'nama_mapel' => 'required',
           // 'nama_guru' => 'required',
            //'hari' => 'required',
            //'jam_mulai' => 'required',
            //'jam_selesai' => 'required',
            //]);
            toast('Data Berhasil Ditambahkan!','success');
            $jadwal=new jadwal;
            $jadwal->idKelas = $request->idKelas;
            $jadwal->idPegawai = $request->idPegawai;
            $jadwal->idMapel = $request->idMapel;
            $jadwal->idSemester = $request->idSemester;
            $jadwal->hari = $request->hari;
            $jadwal->jam_mulai = $request->jam_mulai;
            $jadwal->jam_selesai = $request->jam_selesai;
            $jadwal->save();
            return redirect('admin/jadwal/show/{idKelas}/{idJadwal}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::all();
        $jadwal = Jadwal::all();
        $pegawai = Pegawai::all();
        $semester = Semester::all();
        return view('admin/jadwal/show', compact('kelas','jadwal','semester'));

        // $kelas = Kelas::all();
        // return view('admin/jadwal/index', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idJadwal)
    {

        $jadwal = Jadwal::where('idJadwal', $idJadwal)->first();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $pegawai = Pegawai::all();
        $semester = Semester::all();
        return view("admin.jadwal.edit", compact('idJadwal', 'semester', 'mapel', 'kelas', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idJadwal)
    {
        toast('Data Berhasil Diubah!','success');
        Jadwal::where('idJadwal', $idJadwal)
        ->update([
            'idKelas' => $request->idKelas,
            'idMapel' => $request->idMapel,
            'idPegawai' => $request->idPegawai,
            'idSemester' => $request->idSemester,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);
        return redirect('admin/jadwal/show/{idKelas}/{idJadwal}');
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
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect('admin/jadwal/show/{idKelas}/{idJadwal}');
    }

    public function cetakForm()
    {
        return view('admin.Jadwal.cetak-jadwal');
    }

    public function cetakJadwalPertanggal($tglawal, $tglakhir)
    {
           //dd([$tglawal, $tglakhir]);
           $tglawal = $tglawal;
           $tglakhir = $tglakhir;
           $cetakPerTanggal = Jadwal::with('semester')->whereBetween('tgl_efektif', [$tglawal, $tglakhir]);
           $pdf = PDF::loadview('admin/jadwal/cetak-data-pertanggal',compact('cetakPerTanggal', 'tglawal', 'tglakhir'));
        //    return view('admin/jadwal/cetak-data-pertanggal', compact('cetakPertanggal'));

        $pdf->setPaper("a4", 'potrait');
        return $pdf->stream();
    }

    public function detail($id)
    {
        $jadwal = Jadwal::where('idJadwal', $id)->first();
        $kelas = Kelas::where('idKelas', $id)->get();
        $mapel = Mapel::where('idMapel', $id)->get();
        $semester = Semester::where('idSemester', $id)->get();
        $pegawai = Pegawai::where('idPegawai', $id)->get();
        return view('admin/jadwal/detail', compact('jadwal', 'kelas', 'mapel', 'semester', 'pegawai'));
    }

}
