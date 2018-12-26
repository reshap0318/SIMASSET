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

    public function layertanah($id){
        if ($id != 'all'){
            $store = tanah::where('id',$id)->get();
        }else{
            $store = tanah::all();
        }
        $ret = config('value.t1');
        $i = 0;
        foreach ($store as $l){
            $ret['features'][$i] = config('value.t2');
            $ret['features'][$i]['geometry'] = $l->geom;
            $i++;
        }
        return response()->json($ret);
    }

    public function tanahcenter($id)
    {
      $centers = null;
        $center = DB::SELECT(DB::RAW('select st_x(st_centroid(geom)) as x, st_y(st_centroid(geom)) as y from tanah where id='.$id));
        foreach ($center as $s) {
            $centers = $s->y.','.$s->x;
        }

        return response()->json($centers);
    }

    public function gedunglayer($id)
    {
      if ($id != 'all'){
          $store = bangunan_gedung::where('id',$id)->get();
      }else{
          $store = bangunan_gedung::all();
      }
      $ret = config('value.t1');
      $i = 0;
      foreach ($store as $l){
          $ret['features'][$i] = config('value.t2');
          $ret['features'][$i]['geometry'] = $l->geom;
          $i++;
      }
      return response()->json($ret);
    }
}
