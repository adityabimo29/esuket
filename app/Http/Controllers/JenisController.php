<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisController extends Controller
{

    public function index(Request $request)
    {
        $jenis = \App\Jenis::paginate(10);

        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $jenis = \App\Jenis::where("nama", "LIKE",
            "%$filterKeyword%")->paginate(10);
        }
        
        return view('jenis.index', ['data' => $jenis]);
    }


    public function create()
    {
        return view('jenis.create');
    }


    public function store(Request $request)
    {
        $nama = $request->get('nama');
        $new_Jenis = new \App\Jenis;
        $new_Jenis->nama = $nama;
        $new_Jenis->save();
        return redirect()->route('jenis.create')->with('status', 'Jenis berhasil ditambah');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = \App\Jenis::findOrFail($id);
        return view('jenis.edit', ['data' => $data]);
    }


    public function update(Request $request, $id)
    {
        $nama = $request->get('nama');

        $jenis = \App\Jenis::findOrFail($id);
        $jenis->nama = $nama;
        $jenis->save();
        
        return redirect()->route('jenis.edit', [$jenis->id])->with('status','Jenis berhasil diedit');
    }


    public function destroy($id)
    {
        $jenis = \App\Jenis::findOrFail($id);
        $jenis->forceDelete();
        return redirect()->route('jenis.index')->with('status', 'Jenis berhasil dihapus');
    }
}
