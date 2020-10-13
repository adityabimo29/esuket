<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Model_KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modelKendaraan = \App\Model_Kendaraan::paginate(10);

        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $modelKendaraan = \App\Model_Kendaraan::where("nama", "LIKE",
            "%$filterKeyword%")->paginate(10);
        }
        
        return view('model_kendaraan.index', ['data' => $modelKendaraan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('model_kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->get('nama');
        $new_model_kendaraan = new \App\Model_Kendaraan;
        $new_model_kendaraan->nama = $nama;
        $new_model_kendaraan->save();
        return redirect()->route('model_kendaraan.create')->with('status', 'data berhasil ditambah');
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
        $data = \App\Model_Kendaraan::findOrFail($id);
        return view('model_kendaraan.edit', ['data' => $data]);
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
        $nama = $request->get('nama');

        $modelKendaraan = \App\Model_Kendaraan::findOrFail($id);
        $modelKendaraan->nama = $nama;
        $modelKendaraan->save();
        
        return redirect()->route('model_kendaraan.edit', [$modelKendaraan->id])->with('status','data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelKendaraan = \App\Model_Kendaraan::findOrFail($id);
        $modelKendaraan->forceDelete();
        return redirect()->route('model_kendaraan.index')->with('status', 'Data berhasil dihapus');
    }
}
