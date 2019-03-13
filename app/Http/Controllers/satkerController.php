<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\satker;

class satkerController extends Controller
{
    public function index()
    {
        $satkers = satker::all();
        return view('backend.satker.index',compact('satkers'));
    }

    public function create()
    {
        return view('backend.satker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'nama_satker' => 'required',
          'kode_satker' => 'required|unique:satker'
        ]);

        $satker = new satker;
        $satker->nama_satker = $request->nama_satker;
        $satker->kode_satker = $request->kode_satker;
        try {
          $satker->save();
          return redirect()->route('satker.index');
        } catch (\Exception $e) {
          return redirect()->back();
        }

    }

    public function show($id)
    {
        return redirect()->back();;
    }

    public function edit($id)
    {
      $satker = satker::find($id);
      return view('backend.satker.edit',compact('satker'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'nama_satker' => 'required',
          'kode_satker' => 'required'
        ]);

        $satker = satker::find($id);
        $satker->nama_satker = $request->nama_satker;
        $satker->kode_satker = $request->kode_satker;
        try {
          $satker->update();
          return redirect()->route('satker.index');
        } catch (\Exception $e) {
          return redirect()->back();
        }

    }

    public function destroy($id)
    {
        $satker = satker::find($id);
        try {
          $satker->delete();
          return redirect()->route('satker.index');
        } catch (\Exception $e) {
          toast()->error($e);
          return redirect()->back();
        }
    }
}
