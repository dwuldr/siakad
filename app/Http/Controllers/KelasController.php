<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Guru;
use App\Jadwal;
use App\Siswa;
use Illumninate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        $guru = DB::table('guru')->paginate(5);

        $data = ['kelas' => $kelas, 'guru' => $guru];
        return view("admin.kelas.index", compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = guru::all();
        return view("admin.kelas.create", compact('guru'));
    }

    public function kelas($idkelas)
    {
        $guru = Guru::all();
        return view("admin.kelas.create", compact('guru'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas();
        $kelas->idGuru = $request->get("idGuru");
        $kelas->nama_kelas = $request->get("nama_kelas");
        $kelas->save();
        $kelas = Kelas::all();
        return redirect('kelas');
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
    public function edit($idKelas)
    {

        $kelas = Kelas::findOrFail($idKelas);
        $guru = Guru::all();
        return view("admin.kelas.edit", compact('guru', 'kelas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKelas)
    {

        $kelas = Kelas::findOrFail($idKelas);
        $kelas->idGuru = $request->get('idGuru');
        $kelas->nama_kelas = $request->get("nama_kelas");
        $kelas->save();
        return redirect('kelas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKelas)
    {

        $kelas = Kelas::find($idKelas);
        if(!$kelas) {
            return redirect('kelas');
        }
        $kelas->delete();
        return redirect('kelas');
    }
}
