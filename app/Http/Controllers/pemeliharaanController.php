<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aset_pemeliharaan as pemeliharaan;
use Illuminate\Support\Facades\File;
use App\asset;

class pemeliharaanController extends Controller
{
    public function index()
    {
        $pemeliharaans = pemeliharaan::all();
        // return view('backend.pemeliharaan.index',compact('pemeliharaans'));
    }

    public function create(Request $request)
    {
        $asset = asset::orderby('unit_pmk','asc')->pluck('unit_pmk','id');
        if($request->asset_id){
           $asset = asset::where('id',$request->asset_id)->orderby('unit_pmk','asc')->pluck('unit_pmk','id');
        }
        return view('backend.pemeliharaan.create',compact('asset'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'aset_id' => 'required',
          'tanggal' => 'required',
          'perihal' => 'required',
          'biaya' => 'required',
        ]);

        $pemeliharaan = new pemeliharaan;
        $pemeliharaan->aset_id = $request->aset_id;
        $pemeliharaan->tanggal = $request->tanggal;
        $pemeliharaan->perihal = $request->perihal;
        $pemeliharaan->biaya = $request->biaya;
        $pemeliharaan->keterangan = $request->keterangan;
        if ($request->hasFile('dokumen_path') && $request->dokumen_path->isValid()) {
            $path = 'img/pemeliharaan';
            $oldfile = $pemeliharaan->dokumen_path;

            $fileext = $request->dokumen_path->extension();
            $filename = uniqid("pemeliharaan-").'.'.$fileext;

            //Real File
            $filepath = $request->file('dokumen_path')->storeAs($path, $filename, 'local');
            //Avatar File
            $realpath = storage_path('app/'.$filepath);
            $pemeliharaan->dokumen_path = $filename;
        }
        try {
          if($pemeliharaan->save()){
            //hapus foto lama
            if ($request->hasFile('dokumen_path') && $request->dokumen_path->isValid()) {
              File::delete(storage_path('app'.'/'. $path . '/' . $oldfile));
              File::delete(public_path($path . '/' . $oldfile));
            }
          }
          return redirect()->route('aset.index',['data='.$pemeliharaan->asset->master_id]);
        } catch (\Exception $e) {
          // dd($e);
          return redirect()->back();
        }

    }

    public function show($id)
    {
        return redirect()->back();;
    }

    public function edit($id)
    {
      $pemeliharaan = pemeliharaan::find($id);
      $asset = asset::orderby('unit_pmk','asc')->pluck('unit_pmk','id');
      return view('backend.pemeliharaan.edit',compact('pemeliharaan','asset'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'aset_id' => 'required',
          'tanggal' => 'required',
          'perihal' => 'required',
          'biaya' => 'required',
        ]);

        $pemeliharaan = pemeliharaan::find($id);
        $pemeliharaan->aset_id = $request->aset_id;
        $pemeliharaan->tanggal = $request->tanggal;
        $pemeliharaan->perihal = $request->perihal;
        $pemeliharaan->biaya = $request->biaya;
        $pemeliharaan->keterangan = $request->keterangan;

        if ($request->hasFile('dokumen_path') && $request->dokumen_path->isValid()) {
            $path = 'img/pemeliharaan';
            $oldfile = $pemeliharaan->dokumen_path;

            $fileext = $request->dokumen_path->extension();
            $filename = uniqid("pemeliharaan-").'.'.$fileext;

            //Real File
            $filepath = $request->file('dokumen_path')->storeAs($path, $filename, 'local');
            //Avatar File
            $realpath = storage_path('app/'.$filepath);
            $pemeliharaan->dokumen_path = $filename;
            File::delete(storage_path('app'.'/'. $path . '/' . $oldfile));
            File::delete(public_path($path . '/' . $oldfile));
        }
        try {
          $pemeliharaan->update();
          return redirect()->route('aset.index',['data='.$pemeliharaan->asset->master_id]);
        } catch (\Exception $e) {
          return redirect()->back();
        }

    }

    public function destroy($id)
    {
        $pemeliharaan = pemeliharaan::find($id);
        // dd($pemeliharaan);
        try {
          $pemeliharaan->delete();
          return redirect()->route('aset.index',['data='.$pemeliharaan->asset->master_id]);
        } catch (\Exception $e) {
          toast()->error($e);
          return redirect()->back();
        }
    }
}
