<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\tanah;

class tanahController extends Controller
{
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

    public function tanah($id)
    {
        $tanah = DB::SELECT(DB::RAW("select id, no_registrasi_aset, ST_asgeojson(geom) AS geometry, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat from tanah where id=$id"));
        foreach ($tanah as $row) {
          $id=$row->id;
          $no_registrasi_aset=$row->no_registrasi_aset;
          $longitude=$row->lng;
          $latitude=$row->lat;
          $dataarray[]=array('id'=>$id,'no_registrasi_aset'=>$no_registrasi_aset,'longitude'=>$longitude,'latitude'=>$latitude);
        }
        return response()->json($dataarray);
    }

}
