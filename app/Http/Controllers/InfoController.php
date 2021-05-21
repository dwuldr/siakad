<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Guru;
use App\Nilai;
use App\Kelas;
use App\Siswa;
use App\Jadwal;
use App\Mapel;
use App\Info;


class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Info::all();
        return view("admin.info.index", compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.info.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = new Info();
        $info->tgl = $request->get("tgl");
        $info->pengumuman = $request->get("pengumuman");
        $info->save();
        $info = Info::all();
        return view("admin.info.index", ["info" => $info]);
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
    public function edit($idInfo)
    {
        $info = Info::findOrFail($idInfo);
        return view("admin.info.edit", compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idInfo)
    {
        $info = Info::findOrFail($idInfo);
        $info->tgl = $request->get("tgl");
        $info->pengumuman = $request->get("pengumuman");
        $info->save();
        return redirect("info");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idInfo)
    {
        $info = Info::find($idInfo);
        if(!$info) {
            return redirect()->back();
        }
        $info->delete();
        return redirect('info');
    }
}
