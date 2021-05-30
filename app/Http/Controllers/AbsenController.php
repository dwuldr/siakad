<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Jadwal;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return session('id');
        $data = Jadwal::where('jadwal.idGuru', session('id'))
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
            ->select('mapel.nama_mapel', 'jadwal.*')
            ->get();
        // return $data;
        return view('guru.absensi.jadwal', compact('data'));
    }

    public function listAbsen($id)
    {

        // $data = Absensi::
        return view('guru.absensi.listAbsensi', compact('data'));
    }

    public function listSiswa($id)
    {
        $data = Jadwal::leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
        ->leftJoin('siswa', 'siswa.idKelas', 'kelas.idKelas')
        ->where('jadwal.idJadwal', $id)
        ->select('siswa.*', 'kelas.nama_kelas')
        ->get();
        return view('guru.absensi.listSiswa');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
