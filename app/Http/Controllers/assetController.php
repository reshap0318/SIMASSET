<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset;
use App\data_master;
use App\tanah;
use App\bangunan_gedung;
use DB;

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
            $noReg = asset::pluck('no_registrasi_aset', 'no_registrasi_aset');

           return view('backend.asset.create',compact('data_master','noReg'));
        }else{
          return view('frontend.404');
        }
    }

    public function store(Request $req){

    }

    public function show($id)
    {
      $aset = asset::find($id);
      if($aset){
        //1 tanah
        if($aset->master_id == 1){
          $tanah = tanah::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          if(!$tanah){

            return redirect()->back();
          }
          return view('backend.asset.detail',compact('aset','tanah'));
        }
        //2 bangunan_gedung
        else if($aset->master_id == 2){
          // dd($aset->no_registrasi_aset);
          $bangunan = bangunan_gedung::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          return view('backend.asset.detail',compact('aset','bangunan'));
        }
        //3 belum tau
        else if($aset->master_id == 3){

        }
      }
      else{
        return view('frontend.404');
      }
    }



}
