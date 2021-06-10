<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

use Illumninate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();
        return view("admin/semester/index", compact('semester'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        return view('admin/semester/create', compact('semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester = new Semester();
        $semester->tahun_ajaran = $request->get("tahun_ajaran");
        $semester->tgl_efektif = $request->get("tgl_efektif");
        $semester->keterangan = $request->get("keterangan");
        $semester->save();
        $semester = Semester::all();
        return redirect('admin/semester/index');
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
        $semester = Semester::where('idSemester', $id)->first();
        return view('admin/semester/edit', compact('semester', 'id'));
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
        Semester::where('idSemester', $id)
        ->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'tgl_efektif' => $request->tgl_efektif,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('admin/semester/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect('admin/semester/index');
    }
}
