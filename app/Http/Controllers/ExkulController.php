<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Requests;
use App\Exkul;

class ExkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exkul = Exkul::all();
        return view("admin.exkul.index", compact('exkul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.exkul.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exkul = new Exkul();
        $exkul->nama_exkul = $request->get("nama_exkul");
        $exkul->hari = $request->get("hari");
        $exkul->waktu = $request->get("waktu");
        $exkul->save();
        $exkul = Exkul::all();
        return view("admin.exkul.index", ["exkul" => $exkul]);
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
    public function edit($idExkul)
    {
        $exkul = Exkul::findOrFail($idExkul);
        return view("admin.exkul.edit", compact('exkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idExkul)
    {
        $exkul = Exkul::findOrFail($idExkul);
        $exkul->nama_exkul = $request->get("nama_exkul");
        $exkul->hari = $request->get("hari");
        $exkul->waktu = $request->get("waktu");
        $exkul->save();
        return redirect("exkul");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idExkul)
    {
        $exkul = Exkul::find($idExkul);
        if(!$exkul) {
            return redirect()->back();
        }
        $exkul->delete();
        return redirect('exkul');
    }
}
