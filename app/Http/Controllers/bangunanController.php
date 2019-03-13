<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\bangunan_gedung;

class bangunanController extends Controller
{
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

  public function bangunan($id)
  {
      $bangunan = DB::SELECT(DB::RAW("select id, no_registrasi_aset, ST_asgeojson(geom) AS geometry, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat from bangunan_gedung where id=$id"));
      foreach ($bangunan as $row) {
        $id=$row->id;
        $no_registrasi_aset=$row->no_registrasi_aset;
        $longitude=$row->lng;
        $latitude=$row->lat;
        $dataarray[]=array('id'=>$id,'no_registrasi_aset'=>$no_registrasi_aset,'longitude'=>$longitude,'latitude'=>$latitude);
      }
      return response()->json($dataarray);
  }
}
