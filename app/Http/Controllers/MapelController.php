<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Guru;
use App\Nilai;
use App\Kelas;
use App\Siswa;
use App\Jadwal;
use App\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view("admin.mapel.index", compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function mapel($idMapel)
    {
        $mapel = Mapel::find($idMapel);

        return view("admin.mapel.index", compact('mapel'));
    }

    public function create()
    {
        return view("admin.mapel.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new Mapel();
        $mapel->nama_mapel = $request->get("nama_mapel");
        $mapel->save();
        $mapel = Mapel::all();
        return view("admin.mapel.index", ["mapel" => $mapel]);
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
    public function edit($idMapel)
    {
        $mapel = Mapel::findOrFail($idMapel);
        return view("admin.mapel.edit", compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMapel)
    {
        $mapel = Mapel::findOrFail($idMapel);
        $mapel->nama_mapel = $request->get("nama_mapel");
        $mapel->save();
        return redirect("mapel");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMapel)
    {
        $mapel = Mapel::find($idMapel);
        if(!$mapel) {
            return redirect()->back();
        }
        $mapel->delete();
        return redirect('mapel');
    }
}