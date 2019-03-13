<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemanfaatan;
use App\asset;

class pemanfaatanController extends Controller
{
    public function index()
    {
        $pemanfaatans = pemanfaatan::all();
        // return view('backend.pemanfaatan.index',compact('pemanfaatans'));
    }

    public function create(Request $request)
    {
        $asset = asset::orderby('unit_pmk','asc')->pluck('unit_pmk','id');
        if($request->asset_id){
           $asset = asset::where('id',$request->asset_id)->orderby('unit_pmk','asc')->pluck('unit_pmk','id');
        }
        return view('backend.pemanfaatan.create',compact('asset'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'aset_id' => 'required',
          'tanggal' => 'required',
          'perihal' => 'required',
          'biaya' => 'required',
          'lama_sewa' => 'required',
          'penyewa' => 'required',
        ]);

        $pemanfaatan = new pemanfaatan;
        $pemanfaatan->aset_id = $request->aset_id;
        $pemanfaatan->tanggal = $request->tanggal;
        $pemanfaatan->perihal = $request->perihal;
        $pemanfaatan->biaya = $request->biaya;
        $pemanfaatan->lama_sewa = $request->lama_sewa;
        $pemanfaatan->penyewa = $request->penyewa;
        try {
          $pemanfaatan->save();
          return redirect()->route('aset.index',['data='.$pemanfaatan->asset->master_id]);
        } catch (\Exception $e) {
          dd($e);
          return redirect()->back();
        }

    }

    public function show($id)
    {
        return redirect()->back();;
    }

    public function edit($id)
    {
      $pemanfaatan = pemanfaatan::find($id);
      $asset = asset::orderby('unit_pmk','asc')->pluck('unit_pmk','id');
      return view('backend.pemanfaatan.edit',compact('pemanfaatan','asset'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'aset_id' => 'required',
          'tanggal' => 'required',
          'perihal' => 'required',
          'biaya' => 'required',
          'lama_sewa' => 'required',
          'penyewa' => 'required',
        ]);

        $pemanfaatan = pemanfaatan::find($id);
        $pemanfaatan->aset_id = $request->aset_id;
        $pemanfaatan->tanggal = $request->tanggal;
        $pemanfaatan->perihal = $request->perihal;
        $pemanfaatan->biaya = $request->biaya;
        $pemanfaatan->lama_sewa = $request->lama_sewa;
        $pemanfaatan->penyewa = $request->penyewa;
        try {
          $pemanfaatan->update();
          return redirect()->route('aset.index',['data='.$pemanfaatan->asset->master_id]);
        } catch (\Exception $e) {
          return redirect()->back();
        }

    }

    public function destroy($id)
    {
        $pemanfaatan = pemanfaatan::find($id);
        try {
          $pemanfaatan->delete();
          return redirect()->route('aset.index',['data='.$pemanfaatan->asset->master_id]);
        } catch (\Exception $e) {
          toast()->error($e);
          return redirect()->back();
        }
    }
}
