<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Auth;
use App\Nilai;
use App\Alumni;
use App\TahunAjaran;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_ajaran = TahunAjaran::all();
        return view("admin.tahun_ajaran.index", compact('tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tahun_ajaran.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tahun_ajaran = new TahunAjaran();
        $tahun_ajaran->tahun_akademik = $request->get("tahun_akademik");
        $tahun_ajaran->semester = $request->get("semester");
        $tahun_ajaran->status = $request->get("status");
        $tahun_ajaran->save();
        $tahun_ajaran = TahunAjaran::all();
        return view("admin.tahun_ajaran.index", ["tahun_ajaran" => $tahun_ajaran]);
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
    public function edit($idAjaran)
    {
        $tahun_ajaran = TahunAjaran::findOrFail($idAjaran);
        return view("admin.tahun_ajaran.edit", compact('tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idAjaran)
    {
        $tahun_ajaran = TahunAjaran::findOrFail($idAjaran);
        $tahun_ajaran->tahun_akademik = $request->get("tahun_akademik");
        $tahun_ajaran->semester = $request->get("semester");
        $tahun_ajaran->status = $request->get("status");
        $tahun_ajaran->save();
        return redirect("tahun_ajaran");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAjaran)
    {
        $tahun_ajaran = TahunAjaran::find($idAjaran);
        if(!$tahun_ajaran) {
            return redirect()->back();
        }
        $tahun_ajaran->delete();
        return redirect('tahun_ajaran');
    }
}
