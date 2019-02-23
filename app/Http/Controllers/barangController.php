<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;

class barangController extends Controller
{
    public function index()
    {
        $barangs = barang::all();
        return view('backend.barang.index',compact('barangs'));
    }


    public function create()
    {
        return view('backend.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'nama_barang' => 'required',
          'kode_barang' => 'required|unique:barang'
        ]);

        $barang = new barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        if($barang->save()){
          return redirect()->route('barang.index');
        }else{

        }
    }

    public function show($id)
    {
        return redirect()->back();;
    }

    public function edit($id)
    {
      $barang = barang::find($id);
      return view('backend.barang.edit',compact('barang'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'nama_barang' => 'required',
        'kode_barang' => 'required'
      ]);

      $barang = barang::find($id);
      $barang->nama_barang = $request->nama_barang;
      $barang->kode_barang = $request->kode_barang;
      if($barang->update()){
        return redirect()->route('barang.index');
      }else{

      }
    }

    public function destroy($id)
    {
        $barang = barang::find($id);
        try {
          $barang->delete();
          return redirect()->route('barang.index');
        } catch (\Exception $e) {
          toast()->error($e);
          return redirect()->back();
        }

    }
}
