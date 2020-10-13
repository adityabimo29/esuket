<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DealerController extends Controller
{

    public function index(Request $request)
    {
        $dealer = \App\Dealer::paginate(10);

        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $dealer = \App\Dealer::where("nama", "LIKE",
            "%$filterKeyword%")->paginate(10);
        }
        
        return view('dealer.index', ['data' => $dealer]);
    }


    public function create()
    {
        return view('dealer.create');
    }


    public function store(Request $request)
    {
        $nama = $request->get('nama');
        $new_Dealer = new \App\Dealer;
        $new_Dealer->nama = $nama;
        $new_Dealer->save();
        return redirect()->route('dealer.create')->with('status', 'Dealer berhasil ditambah');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = \App\Dealer::findOrFail($id);
        return view('dealer.edit', ['data' => $data]);
    }


    public function update(Request $request, $id)
    {
        $nama = $request->get('nama');

        $dealer = \App\Dealer::findOrFail($id);
        $dealer->nama = $nama;
        $dealer->save();
        
        return redirect()->route('dealer.edit', [$dealer->id])->with('status','Dealer berhasil diedit');
    }


    public function destroy($id)
    {
        $dealer = \App\Dealer::findOrFail($id);
        $dealer->forceDelete();
        return redirect()->route('dealer.index')->with('status', 'Dealer berhasil dihapus');
    }
}
