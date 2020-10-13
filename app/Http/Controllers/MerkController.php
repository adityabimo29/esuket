<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merk = \App\Merk::paginate(10);

        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $merk = \App\Merk::where("nama", "LIKE",
            "%$filterKeyword%")->paginate(10);
        }
        
        return view('merk.index', ['data' => $merk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merk.create');
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
        $new_merk = new \App\Merk;
        $new_merk->nama = $nama;
        $new_merk->save();
        return redirect()->route('merk.create')->with('status', 'Merk berhasil ditambah');
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
        $data = \App\Merk::findOrFail($id);
        return view('merk.edit', ['data' => $data]);
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

        $merk = \App\Merk::findOrFail($id);
        $merk->nama = $nama;
        $merk->save();
        
        return redirect()->route('merk.edit', [$merk->id])->with('status','Merk berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = \App\Merk::findOrFail($id);
        $merk->forceDelete();
        return redirect()->route('merk.index')->with('status', 'Merk berhasil dihapus');
    }
}
