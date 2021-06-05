<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Kelas;
use App\TahunAjaran;
use App\Alumni;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = Alumni::with('kelas')->get();
        $kelas = DB::table('kelas')->get();

        $data = ['alumni' => $alumni, 'kelas' => $kelas];
        return view("admin.alumni.index", compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumni = Alumni::all();
        $kelas = Kelas::all();
        $tahun_ajaran = TahunAjaran::all();
        // $data = [$users, $kelas, $spp];

        return view("admin.alumni.create", compact('alumni', 'tahun_ajaran', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni = new Alumni();
        $alumni->nama_alumni = $request->get("nama_alumni");
        $alumni->idKelas = $request->get("idKelas");
        $alumni->idAjaran = $request->get("idAjaran");
        $alumni->save();
        $alumni = Alumni::all();
        return redirect('alumni');
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
    public function edit($idAlumni)
    {
        $alumni = Alumni::findOrFail($idAlumni);
        $kelas = Kelas::all();
        $tahun_ajaran = TahunAjaran::all();
        return view("admin.alumni.edit", compact('alumni', 'kelas', 'tahun_ajaran',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idAlumni)
    {
        $alumni = Alumni::findOrFail($idAlumni);
        $alumni->nama_alumni = $request->get('nama_alumni');
        $alumni->idKelas = $request->get('idKelas');
        $alumni->idAjaran = $request->get('idAjaran');
        $alumni->save();
        return redirect('alumni');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAlumni)
    {
        $alumni = Alumni::find($idAlumni);
        if(!$alumni) {
            return redirect('alumni');
        }
        $alumni->delete();
        return redirect('alumni');
    }
}
