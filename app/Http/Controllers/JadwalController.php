<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jadwal;
use App\Mapel;
use App\Kelas;
use App\Guru;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PDF;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $guru = Guru::all();
        // $data = [$users, $kelas, $spp];

        return view("admin.jadwal.create", compact('jadwal', 'mapel', 'kelas', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = new Jadwal();
        $jadwal->idMapel = $request->get("idMapel");
        $jadwal->idKelas = $request->get("idKelas");
        $jadwal->idGuru = $request->get("idGuru");
        $jadwal->hari = $request->get("hari");
        $jadwal->jam_mulai = $request->get("jam_mulai");
        $jadwal->jam_selesai = $request->get("jam_selesai");
        $jadwal->save();
        $jadwal = Jadwal::all();
        return redirect('jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::where('idKelas', $id)->get();
        $jadwal = Jadwal::where('idSemester',$id)->get();
        return view('admin/jadwal/show', compact('jadwal', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idJadwal)
    {
        $jadwal = Jadwal::findOrFail($idJadwal);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $guru = Guru::all();
        return view("admin.jadwal.edit", compact('jadwal', 'mapel', 'kelas', 'guru'));
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
        $jadwal = Jadwal::findOrFail($idJadwal);
        $jadwal->idMapel = $request->get('idMapel');
        $jadwal->idKelas = $request->get('idKelas');
        $jadwal->idGuru = $request->get('idGuru');
        $jadwal->hari = $request->get('hari');
        $jadwal->jam_mulai = $request->get("jam_mulai");
        $jadwal->jam_selesai = $request->get("jam_selesai");
        $jadwal->save();
        return redirect('jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idJadwal)
    {
        $jadwal = Jadwal::find($idJadwal);
        if(!$jadwal) {
            return redirect('jadwal');
        }
        $jadwal->delete();
        return redirect('jadwal');
    }
}
