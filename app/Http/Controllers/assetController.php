<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset;
use App\data_master;
use App\tanah;
use App\bangunan_gedung;

class assetController extends Controller
{
    public function index(Request $request)
    {
        if($request->data){
          $data_master = data_master::find($request->data);
          $asets = asset::where('master_id',$request->data)->get();
          return view('backend.asset.index',compact('data_master','asets'));
        }else{
          return view('frontend.404');
        }
    }

    public function create(Request $request)
    {
        if($request->data){
          $data_master = data_master::find($request->data);
          // return view('backend.asset.create',compact('data_master'));
        }else{
          return view('frontend.404');
        }
    }

    public function show($id)
    {
      $aset = asset::find($id);
      if($aset){
        //1 tanah
        if($aset->id == 1){
          $tanah = tanah::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          return view('backend.asset.detail',compact('aset','tanah'));
        }
        //2 bangunan_gedung
        else if($aset->id == 2){
          $bangunan_gedung = bangunan_gedung::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
        }
        //3 belum tau
        else if($aset->id == 3){

        }
      }
      else{
        return view('frontend.404');
      }
    }
}
