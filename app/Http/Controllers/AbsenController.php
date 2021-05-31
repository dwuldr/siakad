<?php
// setlocale(LC_TIME, 'id_ID.utf8');
namespace App\Http\Controllers;

use App\Absensi;
use App\Jadwal;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hariIndo($hariInggris)
    {
        switch ($hariInggris) {
            case 'Sunday':
                return 'Minggu';
            case 'Monday':
                return 'Senin';
            case 'Tuesday':
                return 'Selasa';
            case 'Wednesday':
                return 'Rabu';
            case 'Thursday':
                return 'Kamis';
            case 'Friday':
                return 'Jumat';
            case 'Saturday':
                return 'Sabtu';
            default:
                return 'hari tidak valid';
        }
    }

    public function index()
    {
        // return session('id');
        $day = date("l");
        $hari = $this->hariIndo($day);

        $data = Jadwal::where('jadwal.idGuru', session('id'))
            ->leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('mapel', 'mapel.idMapel', 'jadwal.idMapel')
            ->select('mapel.nama_mapel', 'jadwal.*')
            ->where('jadwal.hari', $hari)
            ->get();
        // return $data;
        return view('guru.absensi.jadwal', compact('data'));
    }

    public function listAbsen($id)
    {
        $kelas = Jadwal::where('idJadwal', $id)->first();
        $data = Absensi::where('idJadwal', $id)
            ->get();
        // return $data;
        return view('guru.absensi.listAbsensi', compact('data', 'kelas'));
    }

    public function listSiswa($idKelas)
    {
        $data = Jadwal::leftJoin('kelas', 'kelas.idKelas', 'jadwal.idKelas')
            ->leftJoin('siswa', 'siswa.idKelas', 'kelas.idKelas')
            ->where('jadwal.idKelas', $idKelas)
            ->select('siswa.*', 'kelas.nama_kelas')
            ->get();
        // return $data;
        return view('guru.absensi.listSiswa', compact('data'));
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
