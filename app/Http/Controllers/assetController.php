<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset;
use App\data_master;
use App\tanah;
use App\bangunan_gedung;
use DB;
use App\barang;
use App\satker;

class assetController extends Controller
{
    public function index(Request $request)
    {
        if($request->data){
          $data_master = data_master::where('nama_asset',$request->data)->orderby('id','asc')->first();
          // dd($data_master->rumpun->rumpun->rumpun->rumpun->nama_asset);
          /*
          list tanah didapatkan dari kode barang, atau dari menu aset, bagian yang diseleksi dan table databasenya data_master fungsinya disini
          untuk create, cuman disini dimasukan kedalam session agar bisa di pakai di create nantinya
          */
          $list =[];
          /*
            data merupakan array yang berisikan asset berdasarkan tanah table nya disini adalah table asset + tanah
          */
          $data = [];
          if($data_master->rumpun){
            foreach ($data_master->rumpun as $masters) {
              if($masters->rumpun){
                foreach ($masters->rumpun as $master) {
                  if($master->rumpun){
                    foreach ($master->rumpun as $mast) {
                      if($mast->rumpun){
                        foreach ($mast->rumpun as $mas) {
                          $list = $list+[$mas->id => $mas->nama_asset];
                          if($mas->aset){
                            foreach ($mas->aset as $aset) {
                              array_push($data,$aset);
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
          $request->session()->put('list', collect($list));
          return view('backend.asset.index',compact('data','data_master'));
        }else{
          return view('frontend.404');
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
            //  $c = $request->all();
            // dd($c);
    }

    public function show($id)
    {
      $aset = asset::find($id);
      if($aset->master->kepala->kepala->kepala->kepala){
        //1 tanah
        if($aset->master->kepala->kepala->kepala->kepala->id == 1){
          $tanah = tanah::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          if(!$tanah){

            return redirect()->back();
          }
          return view('backend.asset.detail',compact('aset','tanah'));
        }
        //2 bangunan_gedung
        else if($aset->master->kepala->kepala->kepala->kepala->id == 2){
          // dd($aset->no_registrasi_aset);
          $bangunan = bangunan_gedung::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          return view('backend.asset.detail',compact('aset','bangunan'));
        }
        //3 belum tau
        else if($aset->master->kepala->kepala->kepala->kepala->id == 3){

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
          return redirect()->route('aset.index',['data=Tanah']);
      } catch (\Exception $e) {
          return redirect()->back();
      }

    }



}
