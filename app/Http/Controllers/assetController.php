<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset;
use App\data_master;
use App\tanah_old as tanah;
use App\bangunan_gedung;
use DB;
use App\barang;
use App\satker;

class assetController extends Controller
{




    public function index(Request $request)
    {
      
        if($request->data=='Tanah'){
              $data_master = data_master::where('nama_asset',$request->data)->orderby('id','asc')->first();
           return view('backend.asset.tanah.index',compact('data_master'));
        }

       
       
    }

    public function create(Request $request)
    {
        $barang = barang::pluck('nama_barang','kode_barang');
        $satker = satker::pluck('nama_satker','kode_satker');
        if($request->data){
          $data_master = data_master::where('nama_asset',$request->data)->first();
            $noReg = $request->session()->get('list');
         
            return view('backend.asset.create',compact('data_master','noReg','barang','satker'));
        }else{
          return view('frontend.404');
        }
    }

    public function store(Request $req){
     
    }

    public function show($id)
    {
      $aset = asset::find($id);
      if($aset->master->kepala->kepala->kepala->kepala){
        //1 tanah

        if($aset->master->kepala->kepala->kepala->kepala->nama_asset == 'Tanah'){
           
          $tanah = tanah::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
        
          return view('backend.asset.detail',compact('aset','tanah'));
        }
        //2 bangunan_gedung
        else if(strtolower($aset->master->kepala->kepala->kepala->kepala->nama_asset) == strtolower('bangunan')){
          // dd($aset->no_registrasi_aset);
          $bangunan = bangunan_gedung::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          return view('backend.asset.detail',compact('aset','bangunan'));
        }
        //3 belum tau
        else if(strtolower($aset->master->kepala->kepala->kepala->kepala->nama_asset) == strtolower('dll')){

        }
      }
      else{
        return view('frontend.404');
      }
    }

    public function destroy($id)
    {
      $asset = asset::find($id);
      try {
          $asset->delete();
          return redirect()->route('aset.index',['data='.$asset->nama_asset]);
      } catch (\Exception $e) {
          return redirect()->back();
      }

    }



}
